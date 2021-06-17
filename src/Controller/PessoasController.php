<?php

declare(strict_types=1);

namespace App\Controller;

class PessoasController extends AppController {

    public function listar() {

        $dados = $this->paginate($this->Pessoas);
        $this->set('dados', $dados);
    }

    public function detalhar($id = null) {
        throw new Exception('Not implemented yet');
        return;
    }
    
    public function cadastrar($id = null) {
        throw new Exception('Not implemented yet');
        return;
    }
    
    public function teste() {
        $this->viewBuilder()->setLayout('vue');
        $pessoas = $this->paginate($this->Pessoas);

        $this->set(compact('pessoas'));
        $this->layout = 'vue';
    }

}
