<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
// use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Cache\Cache;
// use App\Pdf\Tcpdf;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $helpers = [
        'BootstrapUI.Form',
        'BootstrapUI.Html',
        'Paginator',
        'Commons',
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Common');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Cookie');
        $this->loadComponent('Flash');
        $this->loadComponent('Bootstrap.Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'scope' => ['Users.status' => '1'],
                    'passwordHasher' => ['className' => 'Legacy']
                ]
            ],
            'authError' => 'Você não está autorizado a acessar esse local',
            'loginRedirect' => '/',
            'logoutRedirect' => '/login',
            'unauthorizedRedirect' => '/'
        ]);

        $this->_defaults();
    }

    /**
     * Before Filter
     *
     * @return void
     */
    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);

        $this->_authRemember();
    }

    /**
     * After Filter
     *
     * @return void
     */
    public function afterFilter(Event $event) {

        parent::afterFilter($event);
    }

    /**
     * Defaults Values
     *
     * @return void
     */
    private function _defaults()
    {
        $this->Cookie->configKey('Default', [
            'expires' => '+365 days',
            //'path' => '/',
            'encryption' => false
        ]);
        $this->Cookie->configKey('Filter', [
            'expires' => '+365 days',
            //'path' => '/',
            'encryption' => false
        ]);
        $this->Cookie->configKey('Auth', [
            'expires' => '+14 days',
            //'path' => '/',
            'encryption' => false,
            'httpOnly' => 'true'
        ]);
        $this->Cookie->configKey('Session', [
            'expires' => 0,
            //'path' => '/',
            'encryption' => false,
            'httpOnly' => 'true'
        ]);

        // Default Locate
        if($this->Cookie->read('Default.locale')) {
            \Locale::setDefault($this->Cookie->read('Default.locale'));
        }
    }

    /**
     * Auth Extras
     *
     * @return void
     */
    protected function _authExtras()
    {
        $this->loadModel('Users');
        $user = $this->Auth->user();
        if($this->Auth->user('avatar')) {
            $this->request->session()->write('Auth.User.avatar', $this->Auth->user('id').'.jpg');
        }
        $this->request->session()->write('Auth.User.first_name', substr($this->Auth->user('name'), 0, strpos($this->Auth->user('name'), ' ')));
        $this->Cookie->write('Default.locale', $this->Auth->user('locale'));
        $role = $this->Users->Roles->get($this->Auth->user('role_id'))->toArray();
        $role['permissions'] = json_decode($role['permissions']);
        array_push($role['permissions'], 'Users/me', 'Pages/home', 'Pages/display');
        $this->request->session()->write('Auth.User.Role', $role);
        $user = $this->Users->get($this->Auth->user('id'));
        if (!empty($this->request->data['remember'])) {
            $token = \Cake\Utility\Text::uuid();
            $user = $this->Users->patchEntity($user, ['auth_token' => $token]);
            $this->Cookie->write('Auth.token', $token);
        } else {
            $user = $this->Users->patchEntity($user, ['auth_token' => null]);
        }
        $this->Users->save($user);
    }

    /**
     * Auth Remember
     *
     * @return void
     */
    private function _authRemember()
    {
        if (!$this->Auth->user() && $this->Cookie->read('Auth.token') && $this->request->action !== 'login') {
            $this->loadModel('Users');
            $user = $this->Users->findByAuthToken($this->Cookie->read('Auth.token'))->first();
            if ($user) {
                $this->Auth->setUser($user->toArray());
                $this->_authExtras();
            }
        }
    }

    /**
     * Authorized
     *
     * @return boolean
     */
    public function isAuthorized($user)
    {
        if(@in_array($this->request->params['controller'].'/'.$this->request->params['action'], $user['Role']['permissions'])) {
            return true;
        }
        return false;
    }

    /**
     * Is Created By Me ?
     *
     * @return boolean
     */
    public function isCreatedByMe($result)
    {
        if ($result->created_user_id == $this->Auth->user('id') || $this->Auth->user('Role.role') === 'administrador' || $this->Auth->user('Role.role') === 'master' || $this->Auth->user('Role.role') === 'root') {
            return true;
        }
        $name = empty($result->created_user->name) ? '' : $result->created_user->name;
        $this->Flash->error(__('You are not allowed. This action can only be performed by the creator of the record {0} or your system administrator.', [$name]));
        return false;
    }
}