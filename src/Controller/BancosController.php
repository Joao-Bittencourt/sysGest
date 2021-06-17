<?php

declare(strict_types=1);

namespace App\Controller;

class BancosController extends AppController {

    public function listar() {
        $bancos = $this->paginate($this->Bancos);
        $this->set('submenu', 'bancos');
        $this->set('bancos', $bancos);
    }

    public function detalhar($id = null) {
        throw new Exception('Not implemented yet');
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
            if ($this->Bancos->save($bancos)) {
                $this->Flash->success(__('Dados salvos com sucesso!'));

                return $this->redirect(['action' => 'listar']);
            }
            $this->Flash->error(__('Não foi possivel realizar a operaçao.'));
        }

        $this->set(compact('bancos'));
    }

    public function deletar($id = null) {
        throw new Exception('Not implemented yet');
    }

}
