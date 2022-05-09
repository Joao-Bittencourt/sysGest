<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BanksTable;
use Cake\TestSuite\TestCase;

class BanksTableTest extends TestCase {

    protected $Accounts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Banks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Banks') ? [] : ['className' => BanksTable::class];
        $this->Banks = $this->getTableLocator()->get('Banks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void {
        unset($this->Banks);

        parent::tearDown();
    }

    public function testValidationNome(): void {
        $data = ['nome' => null];
        $banks = $this->Banks->newEntity($data);
        $this->assertNotEmpty($banks->getErrors()['nome']);

        $data = ['nome' => ''];
        $banks = $this->Banks->newEntity($data);
        $this->assertNotEmpty($banks->getErrors()['nome']);       
    }

    public function testValidationStatus(): void {

        $data = ['status' => 'a'];
        $banks = $this->Banks->newEntity($data);
        $this->assertNotEmpty($banks->getErrors()['status']);

        $data = ['status' => '123']; // tamanho 3
        $banks = $this->Banks->newEntity($data);
        $this->assertNotEmpty($banks->getErrors()['status']);
    }
    
   

}
