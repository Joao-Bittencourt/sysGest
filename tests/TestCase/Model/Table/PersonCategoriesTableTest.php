<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoPessoasTable Test Case
 */
class PersonCategoriesTableTest extends TestCase {

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
        'app.PersonCategories',
        'app.Persons',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PersonCategories') ? [] : ['className' => PersonCategoriesTable::class];
        $this->TipoPessoas = $this->getTableLocator()->get('PersonCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void {
        unset($this->TipoPessoas);

        parent::tearDown();
    }

    /**
     * Test validation status
     *
     * @return void
     */
    public function testValidationStatus(): void {
//        $data = [ 'status' => null ];
//        $pessoa = $this->Pessoas->newEntity($data);
//        $this->assertNotEmpty($pessoa->getErrors()['status']);

        $data = ['status' => 'a'];
        $tipoPessoa = $this->TipoPessoas->newEntity($data);
        $this->assertNotEmpty($tipoPessoa->getErrors()['status']);

        $data = ['status' => '123']; // tamanho 3
        $tipoPessoa = $this->TipoPessoas->newEntity($data);
        $this->assertNotEmpty($tipoPessoa->getErrors()['status']);
    }

}
