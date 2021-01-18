<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * TipoPessoas Controller
 *
 * @property \App\Model\Table\TipoPessoasTable $TipoPessoas
 * @method \App\Model\Entity\TipoPessoa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoPessoasController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $tipoPessoas = $this->paginate($this->TipoPessoas);

        $this->set(compact('tipoPessoas'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Pessoa id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $tipoPessoa = $this->TipoPessoas->get($id, [
            'contain' => ['Pessoas'],
        ]);

        $this->set(compact('tipoPessoa'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
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

    /**
     * Edit method
     *
     * @param string|null $id Tipo Pessoa id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

    /**
     * Delete method
     *
     * @param string|null $id Tipo Pessoa id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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
