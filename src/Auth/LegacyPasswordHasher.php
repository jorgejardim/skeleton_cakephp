<?php
namespace App\Auth;

use Cake\Auth\AbstractPasswordHasher;

class LegacyPasswordHasher extends AbstractPasswordHasher
{

    private $_hash_prefix = 'Hs@|';

    public function hash($password)
    {
        if(!$this->_isHash($password)) {
            return $this->_hash_prefix.base64_encode($password);
        }
        return $password;
    }

    public function check($password, $hashedPassword)
    {
        return $this->hash($password) === $hashedPassword;
    }

    public function decode($password)
    {
        if($this->_isHash($password)) {
            $password = str_replace($this->_hash_prefix, '', $password);
            return base64_decode( $password );
        } else {
            return $password;
        }
    }

    private function _isHash($password) {
        $pos = strpos($password, $this->_hash_prefix);
        if ($pos === false)
            return false;
        return true;
    }
}