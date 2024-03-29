<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AccountsTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('accounts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Banks', [
            'foreignKey' => 'banco_id',
        ]);
        $this->belongsTo('Persons', [
            'foreignKey' => 'pessoa_id',
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
                ->notBlank('id', null, 'create');

        $validator
                ->integer('pessoa_id')
                ->notBlank('pessoa_id', 'Selecione a Pessoa');
        $validator
                ->integer('banco_id')
                ->notBlank('banco_id', 'Selecione o Banco');
        $validator
                ->integer('agencia')
                ->notBlank('agencia', 'Selecione a Agencia');
        $validator
                ->integer('conta')
                ->notBlank('conta', 'Selecione a Conta');
        $validator
                ->integer('status')
                 ->maxLength('status', 1)
                ->notEmptyString('status');

        return $validator;
    }

    public function findListAccount(): array {

        $query = $this
            ->find('list', [
                'keyField' => 'id',
                'valueField' => 'conta'
            ])
            ->contain(['Persons']);

        $query
            ->select([
                'id',
                'conta' => $query->func()->concat([
                    'conta' => 'identifier',
                    ' - ',
                    'nome' => 'identifier'
                ])
        ]);

        return $query->toArray();
    }
}
