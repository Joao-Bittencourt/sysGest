<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentTransactionsTable;
use Cake\TestSuite\TestCase;

class PaymentTransactionsTableTest extends TestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.pagamentoMovimentacoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PaymentTransactions') ? [] : ['className' => PaymentTransactionsTable::class];
        $this->PaymentTransactions = $this->getTableLocator()->get('PaymentTransactions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void {
        unset($this->PaymentTransactions);

        parent::tearDown();
    }
    
    public function testValidationStatus(): void {
//        $data = [ 'status' => null ];
//        $pessoa = $this->Pessoas->newEntity($data);
//        $this->assertNotEmpty($pessoa->getErrors()['status']);

//        $data = ['status' => 'a'];
//        $tipoPessoa = $this->PaymentTransactions->newEntity($data);
//        $this->assertNotEmpty($tipoPessoa->getErrors()['status']);

        $data = ['status' => '123']; // tamanho 3
        $tipoPessoa = $this->PaymentTransactions->newEntity($data);
        $this->assertNotEmpty($tipoPessoa->getErrors()['status']);
    }

    /**
     * Test validation created_by
     *
     * @return void
     * @todo Description revisar
     */
    public function testBeforeSaveCreatedBy(): void {
        $data = [
            'created' => '2021-01-17 22:20:29',
            'modified' => '2021-01-17 22:20:29',
            'status' => 1,
        ];

        $pagamentoMovimentacoes = $this->PaymentTransactions->newEmptyEntity();
        $pagamentoMovimentacoesFullEntity = $this->PaymentTransactions->patchEntity($pagamentoMovimentacoes, $data);
        $saved = $this->PaymentTransactions->save($pagamentoMovimentacoesFullEntity);

        $this->assertEmpty($pagamentoMovimentacoesFullEntity->getErrors());
    }
}
