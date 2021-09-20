<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PaymentsTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('pagamentos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Persons', [
            'className' => 'Persons',
            'foreignKey' => 'recebedor_pessoa_id'
        ]);
        $this->hasOne('Accounts', [
            'className' => 'Accounts',
            'foreignKey' => 'contas_id'
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
                ->notBlank('vl_total', 'Informe um valor');
        $validator
                ->notBlank('tipo_pagamento_tipo', 'Informe o tipo de pagamento');


        $validator
                ->integer('status')
                ->notEmptyString('status');

        return $validator;
    }

    public function findDataEntrys($params = []) {

        $payment = $this->find();
        $payment->select(['sum_values' => $payment->func()->sum('vl_total')]);


        $query = $this->find();
        $query
                ->select(['sum' => $query->func()->sum('Payments.vl_total')])
                ->where([
                    'Payments.tipo_pagamento_tipo' => 'C',
                    'Payments.status' => 1
                ])
                ->toArray();


        $coutn = $this->find('all')
                ->where([
            'Payments.tipo_pagamento_tipo' => 'C',
            'Payments.status' => 1
        ]);


        $total = $query->toArray();
        $results['sum'] = $total[0]->sum;
        $results['count'] = $coutn->count();

        return $results;
    }

    public function findDataOutputs($params = []) {
        $payment = $this->find();
        $payment->select(['sum_values' => $payment->func()->sum('vl_total')]);


        $query = $this->find();
        $query
                ->select(['sum' => $query->func()->sum('Payments.vl_total')])
                ->where([
                    'Payments.tipo_pagamento_tipo' => 'D',
                    'Payments.status' => 1
                ])
                ->toArray();


        $coutn = $this->find('all')
                ->where([
            'Payments.tipo_pagamento_tipo' => 'D',
            'Payments.status' => 1
        ]);


        $total = $query->toArray();
        $results['sum'] = $total[0]->sum;
        $results['count'] = $coutn->count();

        return $results;
    }

}
