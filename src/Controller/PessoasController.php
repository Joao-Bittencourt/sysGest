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
       $pessoas = $this->Pessoas->newEmptyEntity();
//       $tipoPessoas = $this->Pessoas->TipoPessoas->find()->select(['id', 'tipo']);
       $tipoPessoas = $this
            ->Pessoas
            ->TipoPessoas
            ->find('list', [
                'keyField' => 'id',
                'valueField' => 'tipo'
           ])
            ->toArray();
     
       
        if (!empty($id)) {
            $pessoas = $this->Pessoas->get($id, [
                'contain' => [],
            ]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $bancos = $this->Pessoas->patchEntity($pessoas, $this->request->getData());
            if ($this->Pessoas->save($bancos)) {
                $this->Flash->success(__('Dados salvos com sucesso!'));

                return $this->redirect(['action' => 'listar']);
            }
            $this->Flash->error(__('Não foi possivel realizar a operaçao.'));
        }

        $this->set(compact('pessoas'));
        $this->set(compact('tipoPessoas'));
    }
    
    public function teste() {
        $this->viewBuilder()->setLayout('vue');
        $pessoas = $this->paginate($this->Pessoas);

        $this->set(compact('pessoas'));
        $this->layout = 'vue';
    }

}
