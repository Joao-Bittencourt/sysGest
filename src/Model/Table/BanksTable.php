<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BanksTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('banks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        
         $this->hasMany('Accounts', [
            'foreignKey' => 'banco_id',
        ]);
    }

    public function beforeSave($event, $entity, $options) {
        if (empty($entity->created_by)) {
            $entity->created_by = 1;
        }
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
                 ->maxLength('status', 1)
                ->notEmptyString('status');

        return $validator;
    }

}
