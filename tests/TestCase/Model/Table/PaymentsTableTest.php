<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentsTable;
use Cake\TestSuite\TestCase;

class PaymentsTableTest extends TestCase {

    protected $Payments;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Accounts',
        'app.Payments',
        'app.Persons',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Payments') ? [] : ['className' => PaymentsTable::class];
        $this->Payments = $this->getTableLocator()->get('Payments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void {
        unset($this->Payments);

        parent::tearDown();
    }

    public function testValidationContaId(): void {
        $data = ['conta_id' => null];
        $payment = $this->Payments->newEntity($data);
        $this->assertNotEmpty($payment->getErrors()['conta_id']);

        $data = ['conta_id' => ''];
        $payment = $this->Payments->newEntity($data);
        $this->assertNotEmpty($payment->getErrors()['conta_id']);
    }
    
    public function testValidationRecebedorPessoaId(): void {
        $data = ['recebedor_pessoa_id' => null];
        $payment = $this->Payments->newEntity($data);
        $this->assertNotEmpty($payment->getErrors()['recebedor_pessoa_id']);

        $data = ['recebedor_pessoa_id' => ''];
        $payment = $this->Payments->newEntity($data);
        $this->assertNotEmpty($payment->getErrors()['recebedor_pessoa_id']);
    }
    
    public function testValidationValorTotal(): void {
        $data = ['vl_total' => null];
        $payment = $this->Payments->newEntity($data);
        $this->assertNotEmpty($payment->getErrors()['vl_total']);

        $data = ['vl_total' => ''];
        $payment = $this->Payments->newEntity($data);
        $this->assertNotEmpty($payment->getErrors()['vl_total']);
    }
    
    public function testValidationTipoPagamentoTipo(): void {
        $data = ['tipo_pagamento_tipo' => null];
        $payment = $this->Payments->newEntity($data);
        $this->assertNotEmpty($payment->getErrors()['tipo_pagamento_tipo']);

        $data = ['tipo_pagamento_tipo' => ''];
        $payment = $this->Payments->newEntity($data);
        $this->assertNotEmpty($payment->getErrors()['tipo_pagamento_tipo']);
    }

    public function testValidationStatus(): void {

        $data = ['status' => 'a'];
        $payment = $this->Payments->newEntity($data);
        $this->assertNotEmpty($payment->getErrors()['status']);

        $data = ['status' => '123']; // tamanho 3
        $payment = $this->Payments->newEntity($data);
        $this->assertNotEmpty($payment->getErrors()['status']);
    }
}
