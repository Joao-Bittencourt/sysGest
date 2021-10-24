<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\InstallmentsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class InstallmentsControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Parcelas'
    ];
 
    public function setUp(): void {
        $this->session([
            'Auth' => ['id' => 1]
        ]);
    }
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
        $this->get('/parcelas/listar');
        $this->assertResponseOk();
    }
    
    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testGetAdd(): void {
        $this->get('/parcelas/cadastrar');
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
        
        $this->post('/parcelas/cadastrar', $data);
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
        $this->get('/parcelas/detalhar/1');
        $this->assertResponseOk();
    }

    /**
     * Test deletar method
     *
     * @return void
     */
    public function testDelet(): void {
        $this->get('/parcelas/deletar/1');
        $this->assertResponseFailure();
    }

}
