<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoPessoasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoPessoasTable Test Case
 */
class TipoPessoasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoPessoasTable
     */
    protected $TipoPessoas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TipoPessoas',
        'app.Pessoas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TipoPessoas') ? [] : ['className' => TipoPessoasTable::class];
        $this->TipoPessoas = $this->getTableLocator()->get('TipoPessoas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TipoPessoas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
