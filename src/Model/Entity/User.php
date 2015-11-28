<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Auth\LegacyPasswordHasher;

/**
 * User Entity.
 *
 * @property int $id
 * @property int $role_id
 * @property \App\Model\Entity\Role $role
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\Time $birth
 * @property string $locale
 * @property bool $avatar
 * @property string $oauth_provider
 * @property string $oauth_uid
 * @property string $oauth_token
 * @property string $oauth_secret
 * @property string $auth_token
 * @property string $activation
 * @property bool $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _setPassword($password)
    {
        return (new LegacyPasswordHasher)->hash($password);
    }
}