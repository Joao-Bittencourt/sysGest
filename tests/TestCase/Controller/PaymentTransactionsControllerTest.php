<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\PaymentTransactionsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class PaymentTransactionsControllerTest extends TestCase {

    use IntegrationTestTrait;

    protected $fixtures = [
//        'app.paymentTransactions'
        'app.pagamentoMovimentacoes'
    ];

    public function testcadastrar(): void {
        $this->get('/pagamento-movimentacoes/cadastrar');
        $this->assertResponseFailure();
    }
    
    public function testlistarEntradas(): void {
        $this->get('/pagamento-movimentacoes/listar-entradas');
        $this->assertResponseFailure();
    }
    
    public function testlistarSaidas(): void {
        $this->get('/pagamento-movimentacoes/listar-saidas');
        $this->assertResponseFailure();

    }

    public function testDetalhar(): void {
        $this->get('/pagamento-movimentacoes/detalhar');
        $this->assertResponseFailure();
    }
      
    public function testCancelar(): void {
        $this->get('/pagamento-movimentacoes/cancelar');
        $this->assertResponseFailure();
    }
      
}
