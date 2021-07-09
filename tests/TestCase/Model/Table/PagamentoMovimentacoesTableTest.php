<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PagamentoMovimentacoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Pagamento Test Case
 */
class PagamentoMovimentacoesTableTest extends TestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PagamentoMovimentacoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PagamentoMovimentacoes') ? [] : ['className' => PagamentoMovimentacoesTable::class];
        $this->PagamentoMovimentacoes = $this->getTableLocator()->get('PagamentoMovimentacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void {
        unset($this->PagamentoMovimentacoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void {
        $data = ['status' => 'a'];
        $pagamentoMovimentacoes = $this->PagamentoMovimentacoes->newEntity($data);
        $this->assertNotEmpty($pagamentoMovimentacoes->getErrors()['status']);

        $data = ['status' => '123']; // tamanho 3
        $pagamentoMovimentacoes = $this->PagamentoMovimentacoes->newEntity($data);
        $this->assertNotEmpty($pagamentoMovimentacoes->getErrors()['status']);
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

        $pagamentoMovimentacoes = $this->PagamentoMovimentacoes->newEmptyEntity();
        $pagamentoMovimentacoesFullEntity = $this->PagamentoMovimentacoes->patchEntity($pagamentoMovimentacoes, $data);
        $saved = $this->PagamentoMovimentacoes->save($pagamentoMovimentacoesFullEntity);

        $this->assertEmpty($pagamentoMovimentacoesFullEntity->getErrors());
    }
}
