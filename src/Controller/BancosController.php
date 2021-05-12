<?php

declare(strict_types=1);

namespace App\Controller;

class BancosController extends AppController {

    public function listar() {
        $bancos = $this->paginate($this->Bancos);

        $this->set('bancos', $bancos);
    }

    public function detalhar($id = null) {
        throw new Exception('Not implemented yet');
        return;
    }

    public function cadastrar($id = null) {

        $bancos = $this->Bancos->newEmptyEntity();
        if (!empty($id)) {
            $bancos = $this->Bancos->get($id, [
                'contain' => [],
            ]);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bancos = $this->Bancos->patchEntity($bancos, $this->request->getData());
            if ($this->TipoPessoas->save($bancos)) {
                $this->Flash->success(__('The Banco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Banco could not be saved. Please, try again.'));
        }
        
        $this->set(compact('bancos'));
    }

    public function delete($id = null) {
        throw new Exception('Not implemented yet');
    }

}
