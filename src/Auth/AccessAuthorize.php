<?php
namespace App\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Network\Request;

class AccessAuthorize extends BaseAuthorize
{
    private function _setAuthorize() {

        $this->authorize['Users']['index']['admin'] = true;
        $this->authorize['Users']['view']['admin'] = true;
        $this->authorize['Users']['edit']['admin'] = true;
        $this->authorize['Users']['add']['admin'] = true;
        $this->authorize['Users']['delete']['admin'] = true;
    }

    private $authorize = array();

    public function authorize($user, Request $request) {

        $role = $user['role'];
        if ($role === 'master' || $role === 'root') {
            return true;
        }

        $controller = $request->controller;
        $action = $request->action;

        if (in_array($action, ['login', 'logout', 'register', 'reminder', 'activation', 'me']) && $controller == 'Users') {
            return true;
        }

        if ($controller === 'Pages' && $action === 'display') {
            return true;
        }

        $this->_setAuthorize();
        if(isset($this->authorize[$controller][$action][$role]) && $this->authorize[$controller][$action][$role] == true) {
            return true;
        }
        return false;
    }
}