<?php

declare(strict_types=1);

namespace App\Controller;

class PersonsController extends AppController {

    public function index() {
        parent::index();
    }
    public function list() {
        parent::index();
    }

    public function view($id = null) {
        throw new Exception('Not implemented yet');
    }
    
    public function add($id = null) {
       $pessoas = $this->Persons->newEmptyEntity();
       $tipoPessoas = $this->Persons->PersonCategories->find('list', [
                'keyField' => 'id',
                'valueField' => 'tipo'
           ])
            ->toArray();
     
        if (!empty($id)) {
            $pessoas = $this->Persons->get($id, [            
                'contain' => [],
            ]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoasFullEntity = $this->Persons->patchEntity($pessoas, $this->request->getData());
            if ($this->Persons->save($pessoasFullEntity)) {
                $this->Flash->success(__('Dados salvos com sucesso!'));
                return $this->redirect(['action' => 'listar']);
            }
            $this->Flash->error(__('Não foi possivel realizar a operaçao.'));
        }

        $this->set(compact('pessoas'));
        $this->set(compact('tipoPessoas'));
    }
    
//    public function teste() {
//        $this->viewBuilder()->setLayout('vue');
//        $pessoas = $this->paginate($this->Pessoas);
//
//        $this->set(compact('pessoas'));
//        $this->layout = 'vue';
//    }

}
