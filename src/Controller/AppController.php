<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller {


    public function initialize(): void {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function index() {
        $entity = $this->{$this->getModelName()}->newEmptyEntity();
        $this->set(compact('entity'));

        try {
            $this->set($this->getControllerName(), $this->paginate());
        } catch (NotFoundException $e) {
            $this->redirect('/' . $this->getControllerName());
        }
    }

    public function list() {
        $this->index();
    }
    
    public function add($id = null) {
        $entity = $this->{$this->getModelName()}->newEmptyEntity();

        if (!empty($id)) {
            $entity = $this->{$this->getModelName()}->get($id, []);
        }

        if ($this->request->is('post')) {
            $entity = $this->{$this->getModelName()}->patchEntity($entity, $this->request->getData());
            if ($this->{$this->getModelName()}->save($entity)) {
                $this->Flash->success(__('Dados salvos com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel realizar a operaçao.'));
        }
        $this->set(compact('entity'));
    }
    
    public function edit($id = null) {
        $this->add($id);
                
        $this->render('/element/common/edit');
    }

    public function view($id = null) {
        $entity = $this->getEditEntity($id);
        $this->set(compact('entity'));
        $this->render('../element/common/panel');
    }

    public function delete($id = null) {
        throw new Exception('Not implemented yet');
    }

    public function getControllerName() {
        return \Cake\Utility\Inflector::underscore($this->request->getParam('controller'));
    }

    public function getModelName() {
        return $this->request->getParam('controller');
    }

    public function getEditEntity($id) {
        $fields = [];
        $contain = [];

        return $this->{$this->getModelName()}->get($id, compact('fields', 'contain'));
    }

}
