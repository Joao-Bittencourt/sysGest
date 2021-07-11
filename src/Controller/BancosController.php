<?php

declare(strict_types=1);

namespace App\Controller;

class BancosController extends AppController {

    
    public function list() {
        parent::index();
    }

    public function view($id = null) {
        parent::view($id);
    }

    public function add($id = null) {
          parent::add($id);
    }

    public function delet($id = null) {
        throw new Exception('Not implemented yet');
    }

}
