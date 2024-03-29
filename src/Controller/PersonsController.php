<?php

declare(strict_types=1);

namespace App\Controller;

class PersonsController extends AppController {

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
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel realizar a operaçao.'));
        }

        $this->set(compact('pessoas'));
        $this->set(compact('tipoPessoas'));
    }

}
