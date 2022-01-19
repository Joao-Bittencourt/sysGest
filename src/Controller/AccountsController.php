<?php

declare(strict_types=1);

namespace App\Controller;

class AccountsController extends AppController {

    public function list() {
        parent::index();
    }

    public function view($id = null) {
        parent::view($id);
    }
    
    public function add($id = null) {
        parent::add($id);

        $persons = $this->Accounts->Persons->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'nome'
                ])
                ->toArray();

        $banks = $this->Accounts->Banks->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'nome'
                ])
                ->toArray();

        $this->set('pessoas',$persons);
        $this->set('bancos', $banks);
    }

    public function delete($id = null) {
        parent::delete($id);
    }

}
