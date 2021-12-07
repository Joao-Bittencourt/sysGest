<?php

declare(strict_types=1);

namespace App\Controller;

class PaymentsController extends AppController {

    public function list() {
        parent::index();
    }

    public function view($id = null) {
        parent::view($id);
    }

    public function add($id = null) {
//        parent::add($id);


        $entity = $this->{$this->getModelName()}->newEntity($this->request->getData(), [
            'associated' => [
                'Installments'
            ],
            'validate' => false
        ]);
//        if ($this->request->is('ajax')) {
//            $this->render('/element/common/imstallments_panel');
//        }
        if ($this->request->is('get')) {

            if (!empty($id)) {
                $entity = $this->{$this->getModelName()}->get($id, []);
            }
        }
        $this->set(compact('entity'));

        if ($this->request->is('post') && !$this->request->is('ajax')) {

            $entity = $this->{$this->getModelName()}->patchEntity($entity, $this->request->getData(), [
                'associated' => [
                    'Installments'
                ]
            ]);
            debug( $this->request->getData());
            debug($entity);
            return ;

            $paramsToSave = [
                'associated' => [
                    'Installments'
                ]
            ];

            if ($this->{$this->getModelName()}->save($entity, $paramsToSave)) {
                $this->Flash->success(__('Dados salvos com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel realizar a operaçao.'));
        }

//        if ($this->request->is('get') && empty($this->request->getData())) {
        $persons = $this->Payments->Persons->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'nome'
                ])
                ->toArray();

        $accounts = $this->Payments->Accounts->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'conta'
                ])
                ->toArray();

        $tipo_pagamento_tipos = [
            'D' => 'D - debita',
            'C' => 'C - credita'
        ];
        $nTotalParcelas = [
            '1' => '1 parcela',
            '2' => '2 parcelas',
        ];

        $this->set('nTotalParcelas', $nTotalParcelas);
        $this->set('recebedorPessoas', $persons);
        $this->set('contas', $accounts);
        $this->set('tipoPagamentoTipos', $tipo_pagamento_tipos);
//        };
    }

    public function delete($id = null) {
        throw new Exception('Not implemented yet');
    }

    public function listEntries() {
        $entrys = $this->Payments->findListEntrys();

        $this->set('data', $entrys);
    }

    public function listOutputs() {
        throw new Exception('Not implemented yet');
    }

}
