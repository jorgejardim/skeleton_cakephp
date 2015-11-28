<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use App\Auth\LegacyPasswordHasher;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    private $user;
    private $no_redirect = false;
    private $default_role_id = 4; // user

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'logout', 'register', 'reminder', 'activation']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->_authExtras();
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Invalid username or password, try again.'), ['key' => 'auth']);
            }
        }
    }

    public function logout()
    {
        $this->request->session()->destroy();
        $this->Cookie->delete('Auth.token');
        return $this->redirect($this->Auth->logout());
    }

    public function register()
    {
        if ($this->request->is('post')) {
            $this->no_redirect = true;
            $this->request->data['activation'] = \Cake\Utility\Text::uuid();
            if($user = $this->add()) {
                $email = new Email('default');
                $email->template('activate', 'default')
                    ->to($user->email)
                    ->subject(__('Account Activation'))
                    ->viewVars(['name' => $user->name,
                                'activation' => $user->activation])
                    ->send();
                unset($this->request->data);
                $this->Flash->success(__('We sent an email to you. Open your inbox to activate your account.'));
                $this->set('check_mail', true);
            }
        }
    }

    public function reminder()
    {
        if ($this->request->is('post')) {
            $user = $this->Users->findByEmail($this->request->data['email'])->first();
            if ($user) {
                $email = new Email('default');
                $email->template('reminder', 'default')
                    ->to($user->email)
                    ->subject(__('Password Recovery'))
                    ->viewVars(['name' => $user->name,
                                'email' => $user->email,
                                'username' => $user->username,
                                'password' => (new LegacyPasswordHasher)->decode($user->password)])
                    ->send();
                unset($this->request->data['email']);
                $this->Flash->success(__('We sent an email to you. Open your inbox to check your password.'), ['key' => 'auth']);
            } else {
                $this->Flash->error(__('E-mail does not exist.'), ['key' => 'auth']);
            }
        }
    }

    public function activation($activation)
    {
        $user = $this->Users->findByActivation($activation)->first();
        if ($user) {
            $user = $this->Users->patchEntity($user, ['status'=>1, 'activation'=>null]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Enabled access. Please login.'), ['key' => 'auth']);
            } else {
                $this->Flash->error(__('The access has not been activated. Please, try again.'), ['key' => 'auth']);
            }
        } else {
            $this->Flash->error(__('Link invalid activation.'), ['key' => 'auth']);
        }
        return $this->redirect(['action' => 'login']);
    }

    public function me()
    {
        $this->no_redirect = true;
        $this->edit($this->Auth->user('id'));
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        if(!empty($this->request->query['search'])) {
            $this->paginate['conditions'] = ['Users.'.$this->Users->displayField().' LIKE' => '%'.$this->request->query['search'].'%'];
        }
        $this->paginate['order'] = [$this->Users->displayField() => 'ASC'];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $db = ConnectionManager::get('default');
            $db->begin();

                if (!isset($this->request->data['role_id'])) {
                    $this->request->data['role_id'] = $this->default_role_id;
                } if (!isset($this->request->data['locale'])) {
                    $this->request->data['locale'] = \Locale::getDefault();
                }  if (!isset($this->request->data['status'])) {
                    $this->request->data['status'] = false;
                }
                $this->request->data['avatar'] = false;
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($save = $this->Users->save($user)) {
                    $upload = $this->_upload($user->id);
                    if($upload==='ok') {
                        $db->commit();
                        $this->Flash->success(__('The {0} has been saved.', [__('User')]));
                        if(!$this->no_redirect) {
                            return $this->redirect(['action' => 'index']);
                        } else {
                            return $save;
                        }
                    } else {
                        $this->Flash->error(__('Upload Error').':<br>'.$upload);
                    }
                } else {
                    $this->Flash->error(__('The {0} could not be saved. Please, try again.', [__('User')]).$this->Common->getEntityErrors($user));
                }

            $db->rollback();
        }
        if($this->no_redirect) return;
        $roles = $this->Users->Roles->find('list', ['limit' => 200, 'order' => [$this->Users->Roles->displayField() => 'ASC']]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(!empty($this->request->data['new_password'])) {
                $this->request->data['password'] = $this->request->data['new_password'];
            }
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $upload = $this->_upload($id);
                if($upload==='ok') {
                    $this->Flash->success(__('The {0} has been saved.', [__('User')]));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Upload Error').':<br>'.$upload);
                }
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', [__('User')]).$this->Common->getEntityErrors($user));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200, 'order' => [$this->Users->Roles->displayField() => 'ASC']]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
        if($this->no_redirect) return;
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            @unlink(UPLOAD.'avatar/'.$id.'.jpg');
            $this->Flash->success(__('The {0} has been deleted.', [__('User')]));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', [__('User')]).$this->Common->getEntityErrors($user));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Upload method
     *
     * @param string|null $id Space id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    private function _upload($user_id)
    {
        if(empty($this->request->data['image']['name']))
            return 'ok';

        if(USE_AWS_S3) {
            define('awsAccessKey', Configure::read('S3.awsAccessKey'));
            define('awsSecretKey', Configure::read('S3.awsSecretKey'));
            $handle = new \Upload\uploadS3($this->request->data['image'], \Locale::getDefault());
        } else {
            $handle = new \Upload\upload($this->request->data['image'], \Locale::getDefault());
        }
        if($handle->uploaded) {
            $handle->bucket               = Configure::read('S3.bucket');
            $handle->bucket_uri           = 'avatar';
            $handle->file_new_name_body   = $user_id;
            $handle->file_safe_name       = true;
            $handle->file_overwrite       = false;
            $handle->allowed              = array('image/*');
            $handle->image_convert        = 'jpg';
            $handle->jpeg_quality         = 90;
            $handle->image_resize         = true;
            $handle->image_x              = 200;
            $handle->image_y              = 200;
            $handle->image_ratio_crop     = true;

            $handle->process(USE_AWS_S3 ? TMP : UPLOAD.'avatar' );

            if ($handle->processed) {
                $user = $this->Users->get($user_id);
                $user = $this->Users->patchEntity($user, ['avatar' => 1]);
                $this->Users->save($user);
                $handle->clean();
                return 'ok';
            } else {
                return $handle->error;
            }
        } else {
            return $handle->error;
        }
    }
}