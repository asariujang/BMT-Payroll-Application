<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PayrollsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('payrolls');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('salaryallowances', [
            'foreignKey' => 'payrolls_id'
        ]);
        $this->hasMany('salarydeductions', [
            'foreignKey' => 'payrolls_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('month')
            ->requirePresence('month', 'create')
            ->notEmpty('month');

        $validator
            ->integer('year')
            ->requirePresence('year', 'create')
            ->notEmpty('year');

        $validator
            ->numeric('basic_salary')
            ->requirePresence('basic_salary', 'create')
            ->notEmpty('basic_salary');

        $validator
            ->numeric('position_allowance')
            ->requirePresence('position_allowance', 'create')
            ->notEmpty('position_allowance');

        $validator
            ->numeric('communication_allowance')
            ->requirePresence('communication_allowance', 'create')
            ->notEmpty('communication_allowance');

        $validator
            ->numeric('rice_allowance')
            ->requirePresence('rice_allowance', 'create')
            ->notEmpty('rice_allowance');

        $validator
            ->numeric('education_allowance')
            ->requirePresence('education_allowance', 'create')
            ->notEmpty('education_allowance');

        $validator
            ->numeric('transport_allowance')
            ->requirePresence('transport_allowance', 'create')
            ->notEmpty('transport_allowance');

        return $validator;
    }


    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->isUnique(["month", "year", "status", 'users_id']),
            ['errorField' => 'users_id', 'message' => "User has paid for this month."]);
        return $rules;
    }
}
