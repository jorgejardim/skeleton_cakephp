<?php
namespace App\Model\Entity;

use App\Auth\LegacyPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'username' => true,
        'password' => true,
        'oauth_provider' => true,
        'oauth_uid' => true,
        'locale' => true,
        'role' => true,
        'status' => true,
        'activation' => true,
        'auth_token' => true
    ];

    protected function _setPassword($password)
    {
        return (new LegacyPasswordHasher)->hash($password);
    }

    protected function _setLocale($locale)
    {
        return empty($locale)?'pt_BR':$locale;
    }
}