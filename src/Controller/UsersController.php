<?php

declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController {

    public function beforeFilter(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

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

    public function login() {
        
        $this->viewBuilder()->setLayout('login');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
          
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'reports',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
 
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout() {
        
        $this->Authentication->logout();
        return $this->redirect('/');
    }

}
