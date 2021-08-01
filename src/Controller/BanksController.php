<?php

declare(strict_types=1);

namespace App\Controller;

class BanksController extends AppController {

    
    public function index() {
        parent::index();
    }
    
    public function list() {
        parent::index();
    }

    public function view($id = null) {
        parent::view($id);
    }

    public function add($id = null) {
          parent::add($id);
    }
    
    public function delete($id = null) {
          parent::delete($id);
    }

}
