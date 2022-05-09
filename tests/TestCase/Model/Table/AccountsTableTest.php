<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountsTable;
use Cake\TestSuite\TestCase;

class AccountsTableTest extends TestCase {

    protected $Accounts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Accounts',
        'app.Persons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Accounts') ? [] : ['className' => AccountsTable::class];
        $this->Accounts = $this->getTableLocator()->get('Accounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void {
        unset($this->Accounts);

        parent::tearDown();
    }

    public function testValidationPessoaId(): void {
        $data = ['pessoa_id' => null];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['pessoa_id']);

        $data = ['pessoa_id' => ''];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['pessoa_id']);

        $data = ['pessoa_id' => 'a'];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['pessoa_id']);
    }

    public function testValidationBancoId(): void {
        $data = ['banco_id' => null];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['banco_id']);

        $data = ['banco_id' => ''];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['banco_id']);

        $data = ['banco_id' => 'a'];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['banco_id']);
    }

    public function testValidationAgencia(): void {
        $data = ['agencia' => null];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['agencia']);

        $data = ['agencia' => ''];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['agencia']);

        $data = ['agencia' => 'a'];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['agencia']);
    }

    public function testValidationConta(): void {
        $data = ['conta' => null];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['conta']);

        $data = ['conta' => ''];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['conta']);

        $data = ['conta' => 'a'];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['conta']);
    }

    public function testValidationStatus(): void {

        $data = ['status' => 'a'];
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['status']);

        $data = ['status' => '123']; // tamanho 3
        $accounts = $this->Accounts->newEntity($data);
        $this->assertNotEmpty($accounts->getErrors()['status']);
    }
    
    public function testFindListAccount(): void {
        $result = $this->Accounts->findListAccount();
                
        $this->assertNotEmpty($result);
        $this->assertArrayHasKey('1', $result);
        $this->assertCount(1, $result);
        $this->assertEquals('12345 - Lorem ipsum dolor sit amet', $result[1]);
    }

}
