<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Transports', [
            'foreignKey' => 'transports_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('JobPositions', [
            'foreignKey' => 'job_positions_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MaritalStatuses', [
            'foreignKey' => 'marital_statuses_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Educations', [
            'foreignKey' => 'educations_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Allowances', [
            'foreignKey' => 'id',
            'dependent' => true,
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->date('tmt')
            ->requirePresence('tmt', 'create')
            ->notEmpty('tmt');

        $validator
            ->numeric('basic_salary')
            ->requirePresence('basic_salary', 'create')
            ->notEmpty('basic_salary');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['transports_id'], 'Transports'));
        $rules->add($rules->existsIn(['job_positions_id'], 'JobPositions'));
        $rules->add($rules->existsIn(['marital_statuses_id'], 'MaritalStatuses'));
        $rules->add($rules->existsIn(['educations_id'], 'Educations'));

        return $rules;
    }
}
