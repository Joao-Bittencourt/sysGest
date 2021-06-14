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
            'status' => '1'
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
     * Test detalhar method
     *
     * @return void
     */
    public function testDetalhar(): void {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test deletar method
     *
     * @return void
     */
    public function testDeletar(): void {
        $this->markTestIncomplete('Not implemented yet.');
    }

}
