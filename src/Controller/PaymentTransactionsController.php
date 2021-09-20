<?php

declare(strict_types=1);

namespace App\Controller;

class PaymentTransactionsController extends AppController {

    public function add($id = null) {
        parent::add($id);

        $persons = $this->PaymentTransactions->Accounts->Persons->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'nome'
                ])
                ->toArray();

        $banks = $this->PaymentTransactions->Accounts->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'nome'
                ])
                ->toArray();

        $this->set('pessoas', $persons);
        $this->set('contas', $banks);
    }

    public function listEntries() {
        throw new Exception('Not implemented yet');
    }

    public function listOutputs() {
        throw new Exception('Not implemented yet');
    }

    public function view($id = null) {
        throw new Exception('Not implemented yet');
    }

    public function cancel($id = null) {
        throw new Exception('Not implemented yet');
    }

}
