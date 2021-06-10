<?php

declare(strict_types=1);

namespace App\Controller;

class PagamentosController extends AppController {

    public function listar() {
        $parcelas = $this->paginate($this->Parcelas);
        $this->set('submenu', 'parcelas');
        $this->set('parcelas', $parcelas);
    }

    public function detalhar($id = null) {
        throw new Exception('Not implemented yet');
        return;
    }

   public function delete($id = null) {
        throw new Exception('Not implemented yet');
    }

}
