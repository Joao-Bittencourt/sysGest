<?php


declare(strict_types=1);

namespace App\Controller;

class PessoasController extends AppController {
    
       public function index() {
        $dados = $this->paginate($this->Pessoas);
        
//        $this->set(compact('dados'));
        $this->set('dados', $dados);
        $this->viewBuilder()->setOption('serialize', ['dados']);
    }
    
    public function teste(){
          $this->viewBuilder()->setLayout('vue');
          $pessoas = $this->paginate($this->Pessoas);
          
        $this->set(compact('pessoas'));
//       $this->layout = 'vue';
    }
}