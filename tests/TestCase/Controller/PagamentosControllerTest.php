<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\PagamentosController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class PagamentosControllerTest extends TestCase {

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
        $this->get('/pagamentos/list');
        $this->assertResponseOk();
    }
    
    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testGetAdd(): void {
        $this->get('/pagamentos/add');
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
            'created_by' => '1',
            'modified' => date('Y-m-d H:i:s'),
            'modified_by' => null,
            'status' => 1,
            ];
        
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        
        $this->post('/pagamentos/add', $data);
        $this->assertResponseSuccess();
        $pagamentos = $this->getTableLocator()->get('Pagamentos');
        $query = $pagamentos->find()->where(['id' => 2, 'status' => 1]);
        $this->assertEquals(1, $query->count());
    }
    
    
    
    /**
     * Test detalhar method
     *
     * @return void
     */
    public function testView(): void {
        $this->get('/pagamentos/view/1');
        $this->assertResponseFailure();
    }

    /**
     * Test deletar method
     *
     * @return void
     */
    public function testDelet(): void {
        $this->get('/pagamentos/delet/1');
        $this->assertResponseFailure();
    }
}
