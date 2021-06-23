<?php

declare(strict_types=1);

namespace App\Controller;

class ContasController extends AppController {

    public function listar() {
        $contas = $this->paginate($this->Contas);
        $this->set('submenu', 'contas');
        $this->set('dados', $contas);
    }

    public function detalhar($id = null) {
        throw new Exception('Not implemented yet');
        return;
    }

    public function cadastrar($id = null) {

        $contas = $this->Contas->newEmptyEntity();
        if (!empty($id)) {
            $contas = $this->Contas->get($id, [
                'contain' => [],
            ]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $contas = $this->Contas->patchEntity($contas, $this->request->getData());
            if ($this->Contas->save($contas)) {
                $this->Flash->success(__('Dados salvos com sucesso!'));

                return $this->redirect(['action' => 'listar']);
            }
            $this->Flash->error(__('Não foi possivel realizar a operaçao.'));
        }

        $this->set(compact('contas'));
    }

    public function deletar($id = null) {
        throw new Exception('Not implemented yet');
    }

}
