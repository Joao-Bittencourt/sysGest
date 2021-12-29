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

        $paramsToEntity = [
            'Installments'
        ];

        $entity = $this->{$this->getModelName()}->newEntity($this->request->getData(), ['associated' => $paramsToEntity]);

        if ($this->request->is('get')) {

            if (!empty($id)) {
                $entity = $this->{$this->getModelName()}->get($id, $paramsToEntity);
            }
        }
        $this->set(compact('entity'));

        if ($this->request->is('post') && !$this->request->is('ajax')) {

            if ($this->{$this->getModelName()}->save($entity)) {
                $this->Flash->success(__('Dados salvos com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel realizar a operaçao.'));
        }

        if ($this->request->is('ajax')) {
            $this->render('/element/common/installments_panel');
        }

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
    }

    public function delete($id = null) {
        throw new Exception('Not implemented yet');
    }

    public function listEntries() {
        $entrys = $this->Payments->findListEntrys();
        
        $this->set('entrys', $entrys);
    }

    public function listOutputs() {
        $outputs = $this->Payments->findListOutputs();       
        $this->set('outputs', $outputs);
    }

}
