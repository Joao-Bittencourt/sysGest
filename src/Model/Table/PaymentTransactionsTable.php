<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PaymentTransactionsTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('pagamento_movimentacoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
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
                ->allowEmptyString('id', null, 'create');

        $validator
                ->integer('status')
                ->maxLength('status', 1)
                ->notEmptyString('status');

        return $validator;
    }

}
