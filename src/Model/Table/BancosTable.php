<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BancosTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('bancos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator {
        $validator
                ->integer('id')
                ->allowEmptyString('id', null, 'create');

        $validator
                ->scalar('nome')
                ->maxLength('nome', 255)
                ->requirePresence('nome', 'create')
                ->notEmptyString('nome');

        $validator
                ->integer('status')
                ->notEmptyString('status');

        return $validator;
    }

}