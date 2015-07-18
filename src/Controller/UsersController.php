<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use App\Auth\LegacyPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    private $user;
    private $no_redirect = false;

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'logout', 'register', 'reminder', 'activation', 'login_facebook']);
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
            $this->request->data['status'] = false;
            $this->request->data['role'] = 'user';
            $this->request->data['activation'] = \Cake\Utility\Text::uuid();
            $this->request->data['username'] = $this->request->data['email'];
            if($user = $this->add()) {
                $email = new Email('default');
                $email->template('activate', 'default')
                    ->to($user->email)
                    ->subject('Ativação de Conta')
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
                    ->subject('Recuperação de Senha')
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
        $this->Auth->allow();
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
            'contain' => []
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
            if (empty($this->request->data['oauth_uid'])) {
                unset($this->request->data['oauth_uid']);
            } if (empty($this->request->data['email'])) {
                unset($this->request->data['email']);
            }
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($save = $this->Users->save($user)) {
                $this->Flash->success(__('The {0} has been saved.', [__('User')]));
                if(!$this->no_redirect) {
                    return $this->redirect(['action' => 'index']);
                } else {
                    return $save;
                }
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', [__('User')]));
            }
        }
        if($this->no_redirect) return;
        $this->set(compact('user'));
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
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The {0} has been saved.', [__('User')]));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', [__('User')]));
            }
        }
        $this->set(compact('user'));
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
            $this->Flash->success(__('The {0} has been deleted.', [__('User')]));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', [__('User')]));
        }
        return $this->redirect(['action' => 'index']);
    }
}