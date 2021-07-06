<?php

declare(strict_types=1);

namespace App\Controller;

class TipoPessoasController extends AppController {

    public function index() {
        parent::index();
    }

    public function list() {
        parent::index();
    }

    public function add($id = null) {
          parent::add($id);
    }

    public function delete($id = null) {
        throw new Exception('Not implemented yet');
    }
    
    public function view($id = null) {
        $tipoPessoa = $this->TipoPessoas->get($id, [
            'contain' => ['Pessoas'],
        ]);

        $this->set(compact('tipoPessoa'));
    }

}
