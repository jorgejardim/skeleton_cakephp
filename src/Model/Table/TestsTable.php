<?php
namespace App\Model\Table;

use App\Model\Entity\Test;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tests Model
 *
 */
class TestsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('tests');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
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
            ->requirePresence('name', 'create', __('This field {0} is required', __('Name')))
            ->notEmpty('name', __('This field {0} is required', __('Name')));

        $validator
            ->requirePresence('slug', 'create', __('This field {0} is required', __('Slug')))
            ->notEmpty('slug', __('This field {0} is required', __('Slug')));

        $validator
            ->requirePresence('text', 'create', __('This field {0} is required', __('Text')))
            ->notEmpty('text', __('This field {0} is required', __('Text')));

        $validator
            ->requirePresence('locale', 'create', __('This field {0} is required', __('Locale')))
            ->notEmpty('locale', __('This field {0} is required', __('Locale')));

        $validator
            ->add('date', 'valid', ['rule' => ['date', 'dmy'], 'message' => __('The provided value for the {0} field is invalid', __('Date'))])
            ->requirePresence('date', 'create', __('This field {0} is required', __('Date')))
            ->notEmpty('date', __('This field {0} is required', __('Date')));

        $validator
            ->add('calendar', 'valid', ['rule' => ['datetime', 'dmy'], 'message' => __('The provided value for the {0} field is invalid', __('Calendar'))])
            ->requirePresence('calendar', 'create', __('This field {0} is required', __('Calendar')))
            ->notEmpty('calendar', __('This field {0} is required', __('Calendar')));

        $validator
            ->add('hour', 'valid', ['rule' => 'time', 'message' => __('The provided value for the {0} field is invalid', __('Hour'))])
            ->requirePresence('hour', 'create', __('This field {0} is required', __('Hour')))
            ->notEmpty('hour', __('This field {0} is required', __('Hour')));

        $validator
            ->add('currency', 'valid', ['rule' => 'decimal', 'message' => __('The provided value for the {0} field is invalid', __('Currency'))])
            ->requirePresence('currency', 'create', __('This field {0} is required', __('Currency')))
            ->notEmpty('currency', __('This field {0} is required', __('Currency')));

        $validator
            ->add('numeral', 'valid', ['rule' => 'numeric', 'message' => __('The provided value for the {0} field is invalid', __('Numeral'))])
            ->requirePresence('numeral', 'create', __('This field {0} is required', __('Numeral')))
            ->notEmpty('numeral', __('This field {0} is required', __('Numeral')));

        $validator
            ->add('status', 'valid', ['rule' => 'boolean', 'message' => __('The provided value for the {0} field is invalid', __('Status'))])
            ->requirePresence('status', 'create', __('This field {0} is required', __('Status')))
            ->notEmpty('status', __('This field {0} is required', __('Status')));

        return $validator;
    }
}