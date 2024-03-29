<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\PaymentsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class PaymentsControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Payments',
        'app.Persons',
        'app.PersonCategories'
    ];

    public function setUp(): void {
        $this->session([
            'Auth' => ['id' => 1]
        ]);
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void {
        $this->get('/pagamentos/');
        $this->assertResponseOk();
    }

    /**
     * Test listar method
     *
     * @return void
     */
    public function testList(): void {
        $this->get('/pagamentos/listar');
        $this->assertResponseOk();
    }

    /**
     * Test GET cadastrar method
     *
     * @return void
     */
    public function testGetAdd(): void {
        $this->get('/pagamentos/cadastrar');
        $this->assertResponseOk();
    }

    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testAdd(): void {
        $data = [
            'conta_id' => 1,
            'recebedor_pessoa_id' => 1,
            'tipo_pagamento_tipo' => 'C',
            'n_total_parcelas' => 1,
            'vl_total' => '1.25',
            'created' => '2021-01-17 22:20:29',
//            'created_by' => 1,
            'modified' => '2021-01-17 22:20:29',
            'modified_by' => null,
            'status' => 1,
            
        ];

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post('/pagamentos/cadastrar', $data);
        $this->assertResponseSuccess();
        $pagamentos = $this->getTableLocator()->get('Payments');
        $query = $pagamentos->find()->where(['id' => 2, 'status' => 1]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test detalhar method
     *
     * @return void
     */
    public function testView(): void {
        $this->get('/pagamentos/detalhar/1');
        $this->assertResponseOk();
    }
    
    /**
     * Test editar method
     *
     * @return void
     */
    public function testEdit(): void {
        $this->get('/pagamentos/editar/1');
        $this->assertResponseOk();
    }   
    
    /**
     * Test deletar method
     *
     * @return void
     */
    public function testDelet(): void {
        $this->get('/pagamentos/deletar/1');
        $this->assertResponseFailure();
    }

     /**
     * Test listar-entradas method
     *
     * @return void
     */
    public function testListEntries(): void {
        $this->get('/pagamentos/listar-entradas');
        $this->assertResponseOk();
    }
    
     /**
     * Test listar-saidas method
     *
     * @return void
     */
    public function testlistOutputs(): void {
        $this->get('/pagamentos/listar-saidas');
        $this->assertResponseOk();
    }
}
