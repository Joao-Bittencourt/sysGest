<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ParcelasController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class ParcelasControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Parcelas'
    ];

    /**
     * Test listar method
     *
     * @return void
     */
    public function testIndex(): void {
        $this->get('/parcelas/');
        $this->assertResponseOk();
    }
    
    /**
     * Test listar method
     *
     * @return void
     */
    public function testList(): void {
        $this->get('/parcelas/list');
        $this->assertResponseOk();
    }
    
    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testGetAdd(): void {
        $this->get('/parcelas/add');
        $this->assertResponseOk();
    }
    
    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testAdd(): void {
        $data = [
            'pagamento_id' => 1,
            'dt_vencimento' => '2021-01-16 22:20:29',
            'dt_pagamento' => '2021-01-17 22:20:29',
            'status' => '1',
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s')
            ];
        
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        
        $this->post('/parcelas/add', $data);
        $this->assertResponseSuccess();
//        $parcelas = $this->getTableLocator()->get('Parcelas');
//        $query = $parcelas->find()->where(['pagamento_id' => $data['pagamento_id'], 'dt_vencimento' => $data['dt_vencimento']]);
//        $this->assertEquals(1, $query->count()); 
     }
    
      /**
     * Test editar method
     *
     * @return void
     */
    public function testGetEdit(): void {
        $this->get('/parcelas/editar/1');
        $this->assertResponseOk();
    }
    
    /**
     * Test detalhar method
     *
     * @return void
     */
    public function testView(): void {
        $this->get('/parcelas/view/1');
        $this->assertResponseFailure();
    }

    /**
     * Test deletar method
     *
     * @return void
     */
    public function testDelet(): void {
        $this->get('/parcelas/delet/1');
        $this->assertResponseFailure();
    }

}
