<?php

declare(strict_types=1);

namespace App\Controller;

class PaymentsController extends AppController {

    public function list() {
        parent::index();
    }

    public function view($id = null) {
        throw new Exception('Not implemented yet');
    }

    public function add($id = null) {
        parent::add($id);

        $persons = $this->Payments->Persons->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'nome'
                ])
                ->toArray();

        $accounts = $this->Payments->Accounts->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'agencia'
                ])
                ->toArray();

        $tipo_pagamento_tipos = [
            'D' => 'D - debita',
            'C' => 'C - credita'
        ];

        $this->set('recebedorPessoas', $persons);
        $this->set('contas', $accounts);
        $this->set('tipoPagamentoTipos', $tipo_pagamento_tipos);
    }

    public function delete($id = null) {
        throw new Exception('Not implemented yet');
    }

}
