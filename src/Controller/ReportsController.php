<?php

declare(strict_types=1);

namespace App\Controller;

class ReportsController extends AppController {

    public function index() {

        $dados = 'dashboard';
        $this->set('dados', $dados);
    }

}
