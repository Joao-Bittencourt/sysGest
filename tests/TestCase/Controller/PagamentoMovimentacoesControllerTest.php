<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\PagamentoMovimentacoesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class PagamentoMovimentacoesControllerTest extends TestCase {

    use IntegrationTestTrait;

    protected $fixtures = [];

    public function testlistarEntradas(): void {
        $this->get('/pagamento-movimentacoes/list-entries');
        $this->assertResponseFailure();
    }
    
    public function testlistarSaidas(): void {
        $this->get('/pagamento-movimentacoes/list-outputs');
        $this->assertResponseFailure();

    }

    public function testDetalhar(): void {
        $this->get('/pagamento-movimentacoes/detail');
        $this->assertResponseFailure();
    }
      
    public function testCancelar(): void {
        $this->get('/pagamento-movimentacoes/cancel');
        $this->assertResponseFailure();
    }
      
}
