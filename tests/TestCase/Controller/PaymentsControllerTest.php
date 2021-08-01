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
        'app.Pagamentos'
    ];

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
     * Test cadastrar method
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
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s'),
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
        $this->assertResponseFailure();
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
}
