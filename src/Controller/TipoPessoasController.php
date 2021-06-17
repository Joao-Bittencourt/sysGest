<?php

declare(strict_types=1);

namespace App\Controller;

class TipoPessoasController extends AppController {

    public function index() {
        $tipoPessoas = $this->paginate($this->TipoPessoas);

        $this->set(compact('tipoPessoas'));
    }

    public function view($id = null) {
        $tipoPessoa = $this->TipoPessoas->get($id, [
            'contain' => ['Pessoas'],
        ]);

        $this->set(compact('tipoPessoa'));
    }

    public function add() {
        $tipoPessoa = $this->TipoPessoas->newEmptyEntity();
        if ($this->request->is('post')) {
            $tipoPessoa = $this->TipoPessoas->patchEntity($tipoPessoa, $this->request->getData());
            if ($this->TipoPessoas->save($tipoPessoa)) {
                $this->Flash->success(__('The tipo pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo pessoa could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoPessoa'));
    }

    public function edit($id = null) {
        $tipoPessoa = $this->TipoPessoas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoPessoa = $this->TipoPessoas->patchEntity($tipoPessoa, $this->request->getData());
            if ($this->TipoPessoas->save($tipoPessoa)) {
                $this->Flash->success(__('The tipo pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo pessoa could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoPessoa'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $tipoPessoa = $this->TipoPessoas->get($id);
        if ($this->TipoPessoas->delete($tipoPessoa)) {
            $this->Flash->success(__('The tipo pessoa has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo pessoa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
