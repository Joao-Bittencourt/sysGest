<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase {

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    protected $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = $this->getTableLocator()->get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void {
        unset($this->Users);

        parent::tearDown();
    }

     /**
     * Test validation login
     *
     * @return void
     */
    public function testValidationLogin(): void {
        $data = ['login' => null];
        $user = $this->Users->newEntity($data);
        $this->assertNotEmpty($user->getErrors()['login']);

        $data = ['login' => ''];
        $user = $this->Users->newEntity($data);
        $this->assertNotEmpty($user->getErrors()['login']);
    }
    
     /**
     * Test validation password
     *
     * @return void
     */
    public function testValidationPassword(): void {
        $data = ['password' => null];
        $user = $this->Users->newEntity($data);
        $this->assertNotEmpty($user->getErrors()['password']);

        $data = ['password' => ''];
        $this->Users = $this->Users->newEntity($data);
        $this->assertNotEmpty($user->getErrors()['password']);
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
        $user = $this->Users->newEntity($data);
        $this->assertNotEmpty($user->getErrors()['status']);

        $data = ['status' => '123']; // tamanho 3
        $user = $this->Users->newEntity($data);
        $this->assertNotEmpty($user->getErrors()['status']);
    }

    public function testNotUniqueLogin() {
      
        $usuario = $this->Users->newEntity(['login' => 'jose']);
        $this->Users->save($usuario);
        $saved = $this->Users->save($usuario);
        $this->assertNotEmpty($usuario->getErrors());
    }

}
