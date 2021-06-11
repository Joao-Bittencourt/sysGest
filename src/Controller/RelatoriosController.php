<?php

declare(strict_types=1);

namespace App\Controller;

class RelatoriosController extends AppController {

    public function index() {
       $dados = 'dashboard';
        $this->set('dados', $dados);
    }

}
