<?php


declare(strict_types=1);

namespace App\Controller;

class PessoasController extends AppController {
    
       public function index() {
        $pessoas = $this->paginate($this->Pessoas);

        $this->set(compact('pessoas'));
    }
}