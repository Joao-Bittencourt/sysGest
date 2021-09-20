<?php

declare(strict_types=1);

namespace App\Controller;

class PersonCategoriesController extends AppController {

    public function index() {
        parent::index();
    }

    public function list() {
        parent::index();
    }

    public function add($id = null) {
        parent::add($id);
    }

    public function delete($id = null) {
        throw new Exception('Not implemented yet');
    }

    public function view($id = null) {

        $tipoPessoa = $this->PersonCategories->get($id, [
            'contain' => ['Persons'],
        ]);

        $this->set(compact('tipoPessoa'));
    }

}
