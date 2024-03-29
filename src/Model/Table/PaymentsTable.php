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

        $this->setTable('payments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Installments', [
                    'className' => 'Installments'
                ])
                ->setForeignKey('pagamento_id');

        $this->belongsTo('Persons', [
            'className' => 'Persons',
            'foreignKey' => 'recebedor_pessoa_id'
        ]);
        $this->belongsTo('Accounts', [
            'className' => 'Accounts',
            'foreignKey' => 'conta_id'
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
                ->integer('conta_id')
                ->notBlank('conta_id', 'Informe a conta');
        $validator
                ->integer('recebedor_pessoa_id')
                ->notBlank('recebedor_pessoa_id', 'Informe o recebedor');
        $validator
                ->notBlank('vl_total', 'Informe um valor');
        $validator
                ->notBlank('tipo_pagamento_tipo', 'Informe o tipo de pagamento');
        $validator
                ->integer('status')
                ->maxLength('status', 1)
                ->notBlank('status');

        return $validator;
    }

    public function findDataEntrys($params = []) {

//        $payment = $this->find();
//        $payment->select(['sum_values' => $payment->func()->sum('vl_total')]);


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

    public function findListEntrys($params = []) {
        $coutn = $this->find('all')
            ->where([
                'Payments.tipo_pagamento_tipo' => 'C',
                'Payments.status' => 1
            ])
             ->contain([
                 'Persons' => [
                     'PersonCategories'
                 ],
                 'Accounts'
            ]);
        $results = $coutn->toArray();
        return $results;
    }

    public function findListOutputs($params = []) {

        $coutn = $this->find('all')
            ->where([
                'Payments.tipo_pagamento_tipo' => 'D',
                'Payments.status' => 1
            ])
             ->contain([
                 'Persons' => [
                     'PersonCategories'
                 ],
                 'Accounts'
            ]);

        $results = $coutn->toArray();
        return $results;
    }

}
