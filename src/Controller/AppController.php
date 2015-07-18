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
use Cake\Routing\Router;
use Cake\Network\Email\Email;
use Cake\Event\Event;
use Cake\Core\Configure;

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
        'JorgeFacebook.Facebook',
        'Paginator',
        'Commons'
    ];

    public $scripts_for_layout;

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
            'authorize' => ['Access'],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'username', 'password' => 'password'],
                    'scope' => ['Users.status' => '1'],
                    'passwordHasher' => ['className' => 'Legacy']
                ]
            ],
            'authError' => 'Você não está autorizado a acessar esse local',
            'loginRedirect' => '/',
            'logoutRedirect' => '/login',
            'unauthorizedRedirect' => '/login'
        ]);
        // $this->loadComponent('AkkaFacebook.Graph', [
        //     'app_id' => Configure::read('Facebook.app_id'),
        //     'app_secret' => Configure::read('Facebook.app_secret'),
        //     'app_scope' => 'email',
        //     'enable_create' => false,
        //     'redirect_url' => Router::url(['controller' => 'Users', 'action' => 'login2'], TRUE),
        //     'post_login_redirect' => Router::url(['controller' => 'Users', 'action' => 'account'], TRUE),
        //     'user_columns' => ['long_name' => 'name', 'extra_columns' => ['active' => 1, 'locale' => 'pt_BR']] //not required
        // ]);

        $this->_defaults();
    }

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);
        if (!$this->Auth->user() && $this->Cookie->read('Auth.token') && $this->request->action != 'login') {
            $this->loadModel('Users');
            $user = $this->Users->findByAuthToken($this->Cookie->read('Auth.token'))->first();
            if ($user) {
                $this->Auth->setUser($user->toArray());
                $this->_authExtras();
            }
        }
    }

    private function _defaults() {

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

        // Default Locate
        if($this->Cookie->read('Default.locale')) {
            \Locale::setDefault($this->Cookie->read('Default.locale'));
        }
    }

    protected function _authExtras() {
        $this->loadModel('Users');
        $user = $this->Auth->user();
        if(is_array(@getimagesize(ASSETS_UPLOADS.'avatars/'.Configure::read('App.name_reference').'_'.$this->Auth->user('id').'.jpg'))) {
            $this->request->session()->write('Auth.User.avatar', Configure::read('App.name_reference').'_'.$this->Auth->user('id').'.jpg');
        }
        if($this->Auth->user('role')=='root' || $this->Auth->user('role')=='master') {
            $this->request->session()->write('Auth.User.internal', true);
        }
        $this->Cookie->write('Default.locale', $this->Auth->user('locale'));
        $user = $this->Users->get($this->Auth->user('id'));
        if (!empty($this->request->data['remember']) || $this->Auth->user('role')=='root') {
            $token = \Cake\Utility\Text::uuid();
            $user = $this->Users->patchEntity($user, ['auth_token' => $token]);
            $this->Cookie->write('Auth.token', $token);
        } else {
            $user = $this->Users->patchEntity($user, ['auth_token' => null]);
        }
        $this->Users->save($user);
    }
}