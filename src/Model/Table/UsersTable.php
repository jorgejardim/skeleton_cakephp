<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Roles
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric', 'message' => __('The provided value for the {0} field is invalid', __('Id'))])
            ->allowEmpty('id', 'create');

        $validator
            ->add('role_id', 'valid', ['rule' => 'numeric', 'message' => __('The provided value for the {0} field is invalid', __('Role Id'))])
            ->requirePresence('role_id', 'create', __('This field {0} is required', __('Role Id')))
            ->notEmpty('role_id', __('This field {0} is required', __('Role Id')));

        $validator
            ->requirePresence('name', 'create', __('This field {0} is required', __('Name')))
            ->notEmpty('name', __('This field {0} is required', __('Name')));

        $validator
            ->add('email', 'valid', ['rule' => 'email', 'message' => __('The provided value for the {0} field is invalid', __('Email'))])
            ->requirePresence('email', 'create', __('This field {0} is required', __('Email')))
            ->notEmpty('email', __('This field {0} is required', __('Email')))
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('The provided value for the {0} field is already in use', __('Email'))]);

        $validator
            ->requirePresence('password', 'create', __('This field {0} is required', __('Password')))
            ->notEmpty('password', __('This field {0} is required', __('Password')));

        $validator
            ->add('confirm_password', ['compare' => ['rule' => ['compareWith', 'password'], 'message' => __('The provided value for the {0} field is invalid. Must match the field {1}.', [__('Confirm password'), __('Password')])]])
            ->allowEmpty('confirm_password');

        $validator
            ->allowEmpty('new_password');

        $validator
            ->add('confirm_new_password', ['compare' => ['rule' => ['compareWith', 'new_password'], 'message' => __('The provided value for the {0} field is invalid. Must match the field {1}.', [__('Confirm new password'), __('New password')])]])
            ->allowEmpty('confirm_new_password');

        $validator
            ->add('birth', 'valid', ['rule' => ['date', 'dmy'], 'message' => __('The provided value for the {0} field is invalid', __('Birth'))])
            ->allowEmpty('birth');

        $validator
            ->requirePresence('locale', 'create', __('This field {0} is required', __('Locale')))
            ->notEmpty('locale', __('This field {0} is required', __('Locale')));

        $validator
            ->add('avatar', 'valid', ['rule' => 'boolean', 'message' => __('The provided value for the {0} field is invalid', __('Avatar'))])
            ->requirePresence('avatar', 'create', __('This field {0} is required', __('Avatar')))
            ->notEmpty('avatar', __('This field {0} is required', __('Avatar')));

        $validator
            ->allowEmpty('oauth_provider');

        $validator
            ->allowEmpty('oauth_uid');

        $validator
            ->allowEmpty('oauth_token');

        $validator
            ->allowEmpty('oauth_secret');

        $validator
            ->allowEmpty('auth_token');

        $validator
            ->allowEmpty('activation');

        $validator
            ->add('status', 'valid', ['rule' => 'boolean', 'message' => __('The provided value for the {0} field is invalid', __('Status'))])
            ->requirePresence('status', 'create', __('This field {0} is required', __('Status')))
            ->notEmpty('status', __('This field {0} is required', __('Status')));

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        return $rules;
    }
}