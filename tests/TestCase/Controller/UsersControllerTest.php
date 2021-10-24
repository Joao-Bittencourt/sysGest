<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class UsersControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Users'
    ];

    public function setUp(): void {
        $this->cleanup();
        $this->session([
            'Auth' => [
                'id' => 1
            ]
        ]);
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void {
        $this->get('/usuarios/');
        $this->assertResponseOk();
    }

    /**
     * Test listar method
     *
     * @return void
     */
    public function testList(): void {
        $this->get('/usuarios/listar');
        $this->assertResponseOk();
    }

    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testGetAdd(): void {
        $this->get('/usuarios/cadastrar');
        $this->assertResponseOk();
    }

    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testAdd(): void {
        $data = [
            'login' => '123',
            'password' => '999',
            'status' => '1',
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s')
        ];

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post('/usuarios/cadastrar', $data);
        $this->assertResponseSuccess();
        $users = $this->getTableLocator()->get('Users');
        $query = $users->find()->where(['login' => $data['login'], 'status' => 1]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test editar method
     *
     * @return void
     */
    public function testGetEdit(): void {
        $this->get('/usuarios/editar/1');
        $this->assertResponseOk();
    }

    /**
     * Test detalhar method
     *
     * @return void
     */
    public function testView(): void {
        $this->get('/usuarios/detalhar/1');
        $this->assertResponseOk();
    }

    /**
     * Test deletar method
     *
     * @return void
     */
    public function testDelete(): void {
        $this->get('/usuarios/deletar/1');
        $this->assertResponseFailure();
    }

    public function testLoginOk(): void {
        // @todo revisar este teste pois ha a forma correta de destruir a sessão.
        unset($_SESSION);
        $data = [
            'login' => 'login2',
            'password' => 'password2',
        ];

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post('/users/login', $data);
        $expected = [
            'controller' => 'reports',
            'action' => 'index'
        ];
        $this->assertRedirect($expected);
    }

    public function testLoginFailure() {
        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post('/users/login', [
            'login' => 'wrong-username',
            'password' => 'wrong-password'
        ]);
        $this->assertNull($this->_requestSession->read('Auth'));
    }

    public function testLogout() {

        $this->get('/users/logout');
        $expected = [
            'controller' => 'users',
            'action' => 'login',
        ];
        $this->assertRedirect($expected);
    }

}
