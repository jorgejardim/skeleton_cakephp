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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->requirePresence('locale', 'create')
            ->notEmpty('locale');

        $validator
            ->add('date', 'valid', ['rule' => ['date', 'dmy']])
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->add('calendar', 'valid', ['rule' => ['datetime', 'dmy']])
            ->requirePresence('calendar', 'create')
            ->notEmpty('calendar');

        $validator
            ->add('hour', 'valid', ['rule' => 'time'])
            ->requirePresence('hour', 'create')
            ->notEmpty('hour');

        $validator
            ->add('currency', 'valid', ['rule' => 'decimal'])
            ->requirePresence('currency', 'create')
            ->notEmpty('currency');

        $validator
            ->add('numeral', 'valid', ['rule' => 'numeric'])
            ->requirePresence('numeral', 'create')
            ->notEmpty('numeral');

        $validator
            ->add('status', 'valid', ['rule' => 'boolean'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}