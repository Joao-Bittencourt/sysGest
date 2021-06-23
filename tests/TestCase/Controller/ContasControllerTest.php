<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ContasController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class ContasControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.contas'
    ];

    /**
     * Test listar method
     *
     * @return void
     */
    public function testListar(): void {
        $this->get('/contas/listar');
        $this->assertResponseOk();
    }
    
    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testCadastrar(): void {
        $this->get('/contas/cadastrar');
        $this->assertResponseOk();
    }

    /**
     * Test detalhar method
     *
     * @return void
     */
    public function testDetalhar(): void {
        $this->get('/contas/detalhar/1');
        $this->assertResponseFailure();
       
    }

    /**
     * Test deletar method
     *
     * @return void
     */
    public function testDeletar(): void {
        $this->get('/contas/deletar/1');
        $this->assertResponseFailure();
    }

}
