<?php

declare(strict_types=1);

namespace App\Controller;

class PagamentosController extends AppController {

    public function listar() {
        $pagamentos = $this->paginate($this->Pagamentos);
        $this->set('submenu', 'pagamentos');
        $this->set('pagamentos', $pagamentos);
    }

    public function detalhar($id = null) {
        throw new Exception('Not implemented yet');
        return;
    }

    public function cadastrar($id = null) {

        $pagamentos = $this->Pagamentos->newEmptyEntity();
        if (!empty($id)) {
            $pagamentos = $this->Pagamentos->get($id, [
                'contain' => [],
            ]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagamentos = $this->Pagamentos->patchEntity($pagamentos, $this->request->getData());
            if ($this->Pagamentos->save($pagamentos)) {
                $this->Flash->success(__('Dados salvos com sucesso!'));

                return $this->redirect(['action' => 'listar']);
            }
            $this->Flash->error(__('Não foi possivel realizar a operaçao.'));
        }

        $this->set(compact('pagamentos'));
    }

    public function delete($id = null) {
        throw new Exception('Not implemented yet');
    }

}
