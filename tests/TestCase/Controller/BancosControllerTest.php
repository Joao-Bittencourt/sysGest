<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\BancosController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;


class BancosControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Bancos'
    ];

    /**
     * Test listar method
     *
     * @return void
     */
    public function testListar(): void {
        $this->get('/bancos/listar');
        $this->assertResponseOk();
    }
    
    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testGetCadastrar(): void {
        $this->get('/bancos/cadastrar');
        $this->assertResponseOk();
    }
    
    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testCadastrar(): void {
        $data = [
            'nome' => 'lala',
            'codigo_banco' => '999',
            'status' => '1',
            'created' => date('Y-m-d H:i:s'),
            'created_by' => '1',
            'modified' => date('Y-m-d H:i:s')
            ];
        
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        
        $this->post('/Bancos/cadastrar', $data);
        $this->assertResponseSuccess();
        $bancos = $this->getTableLocator()->get('Bancos');
        $query = $bancos->find()->where(['nome' => $data['nome'], 'codigo_banco' => $data['codigo_banco']]);
        $this->assertEquals(1, $query->count());
    }
    
      /**
     * Test editar method
     *
     * @return void
     */
    public function testGetEditar(): void {
        $this->get('/Bancos/editar/1');
        $this->assertResponseOk();
    }
    
    /**
     * Test detalhar method
     *
     * @return void
     */
    public function testDetalhar(): void {
        $this->get('/bancos/detalhar/1');
        $this->assertResponseFailure();
//        $this->assertResponseOk();
    }

    /**
     * Test deletar method
     *
     * @return void
     */
    public function testDeletar(): void {
        $this->get('/bancos/deletar/1');
        $this->assertResponseFailure();
    }

}
