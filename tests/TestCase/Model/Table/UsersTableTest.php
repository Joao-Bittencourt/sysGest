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
    
      /**
     * Test validation created_by
     *
     * @return void
     * @todo Description revisar
     */
    public function testBeforeSaveCreatedBy(): void {
        $data = [
            'login' => 'login1',
            'password' => 'password',
            'created' => '2021-01-17 22:21:01',
            'modified' => '2021-01-17 22:21:01',
            'status' => 1,
        ];

        $user = $this->Users->newEmptyEntity();
        $userFullEntity = $this->Users->patchEntity($user, $data);
        $saved = $this->Users->save($userFullEntity);

        $this->assertEmpty($userFullEntity->getErrors());
        
//        $pessoas = $this->Pessoas->find()->all()->toArray();
//        foreach ($pessoas as $pessoaDado){
//            debug($pessoaDado->created_by);
//        }

    }

    public function testNotUniqueLogin() {

        $data = [
            'login' => 'login',
            'password' => 'password'
        ];
        $user = $this->Users->newEntity($data);
        $saved = $this->Users->save($user);
        $this->assertFalse($saved);
        $this->assertNotEmpty($user->getErrors());
    }

}
