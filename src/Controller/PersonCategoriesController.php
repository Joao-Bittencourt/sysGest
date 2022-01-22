<?php

declare(strict_types=1);

namespace App\Controller;

class PersonCategoriesController extends AppController {

    public function view($id = null) {

        $tipoPessoa = $this->PersonCategories->get($id, [
            'contain' => ['Persons'],
        ]);

        $this->set(compact('tipoPessoa'));
    }

}
