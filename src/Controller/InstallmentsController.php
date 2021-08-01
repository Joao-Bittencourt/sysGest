<?php

declare(strict_types=1);

namespace App\Controller;

class InstallmentsController extends AppController {

    public function index() {
        parent::index();
    }
    public function list() {
        parent::index();
    }

    public function view($id = null) {
        throw new Exception('Not implemented yet');
    }

    public function add($id = null) {
          parent::add($id);
    }

    public function delete($id = null) {
        throw new Exception('Not implemented yet');
    }

}
