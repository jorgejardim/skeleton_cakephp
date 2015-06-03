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
        'Commons'
    ];

    public $scripts_for_layout;

    //public $theme = 'TemplateModern';

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
        $this->loadComponent('Cookie');
        $this->loadComponent('Flash');
        $this->loadComponent('Bootstrap.Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
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
        $this->loadComponent('AkkaFacebook.Graph', [
            'app_id' => '1590476011239825',
            'app_secret' => '7d0c462a27f8a813e5aeb8c9ad728b46',
            'app_scope' => 'email',
            'enable_create' => false,
            'redirect_url' => Router::url(['controller' => 'Users', 'action' => 'login2'], TRUE),
            'post_login_redirect' => Router::url(['controller' => 'Users', 'action' => 'account'], TRUE),
            'user_columns' => ['long_name' => 'name', 'extra_columns' => ['active' => 1, 'locale' => 'pt_BR']] //not required
        ]);

        $this->_defaults();
    }

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);
        if (!$this->Auth->user() && $this->Cookie->read('Auth.token') && $this->request->action != 'login') {
            $this->loadModel('Users');
            $user = $this->Users->findByAuthToken($this->Cookie->read('Auth.token'))->toArray();
            if ($user) {
                $this->Auth->setUser($user);
            }
        }
    }

    public function isAuthorized($user)
    {
        if ($user['role'] === 'master' || $user['role'] === 'root') {
            return true;
        }

        if (in_array($this->request->action, ['login', 'logout', 'register', 'reminder', 'activation']) &&
            $this->request->controller == 'Users') {
            return true;
        }

        if (in_array($this->request->action, ['display']) &&
            $this->request->controller == 'Pages') {
            return true;
        }

        return false;
    }

    // protected function _requireFile($file)
    // {
    //     if (file_exists($file)) {
    //         require $file;
    //         return true;
    //     }
    //     return false;
    // }

    private function _defaults() {

        $this->layout = 'dashboard';

        $this->Cookie->configKey('Default', [
            'expires' => '+365 days',
            //'path' => '/',
            //'encryption' => false
        ]);
        $this->Cookie->configKey('Auth', [
            'expires' => '+14 days',
            //'path' => '/',
            'httpOnly' => 'true'
        ]);

        // Default Locate
        if($this->Cookie->read('Default.locale')) {
            \Locale::setDefault($this->Cookie->read('Default.locale'));
        }
    }
}
