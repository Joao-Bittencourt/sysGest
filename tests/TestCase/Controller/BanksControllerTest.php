<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\BanksController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;


class BanksControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Bancos'
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
        $this->get('/bancos/');
        $this->assertResponseOk();
    }
    
    /**
     * Test listar method
     *
     * @return void
     */
    public function testList(): void {
        $this->get('/bancos/listar');
        $this->assertResponseOk();
    }
    
    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testGetAdd(): void {
        $this->get('/bancos/cadastrar');
        $this->assertResponseOk();
    }
    
    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testAdd(): void {
        $data = [
            'nome' => 'lala',
            'codigo_banco' => '999',
            'status' => '1',
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s')
            ];
        
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        
        $this->post('/bancos/cadastrar', $data);
        $this->assertResponseSuccess();
        $bancos = $this->getTableLocator()->get('Banks');
        $query = $bancos->find()->where(['nome' => $data['nome'], 'codigo_banco' => $data['codigo_banco']]);
        $this->assertEquals(1, $query->count());
    }
    
      /**
     * Test editar method
     *
     * @return void
     */
    public function testGetEdit(): void {
        $this->get('/bancos/editar/1');
        $this->assertResponseOk();
    }
    
    /**
     * Test detalhar method
     *
     * @return void
     */
    public function testView(): void {
        $this->get('/bancos/detalhar/1');
        $this->assertResponseOk();
    }

    /**
     * Test deletar method
     *
     * @return void
     */
    public function testDelete(): void {
        $this->get('/bancos/deletar/1');
        $this->assertResponseFailure();
    }

}
