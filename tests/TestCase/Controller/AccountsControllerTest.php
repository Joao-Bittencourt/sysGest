<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\AccountsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class AccountsControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Accounts',
        'app.Banks',
        'app.Persons'
    ];

    /**
     * Test listar method
     *
     * @return void
     */
    public function setUp(): void {
        $this->session([
            'Auth' => ['id' => 1]
        ]);
    }

    public function testList(): void {
        $this->get('/contas/listar');
        $this->assertResponseOk();
    }

    /**
     * Test editar method
     *
     * @return void
     */
    public function testGetEdit(): void {
        $this->get('/contas/editar/1');
        $this->assertResponseOk();
    }

    /**
     * Test GET cadastrar method
     *
     * @return void
     */
    public function testGetAdd(): void {
        $this->get('/contas/cadastrar');
        $this->assertResponseOk();
    }

    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testAdd(): void {
        $data = [
            'pessoa_id' => '1',
            'banco_id' => '2',
            'agencia' => '12346',
            'agencia_dv' => '2',
            'conta' => '12346',
            'conta_dv' => '2',
            'status' => '1',
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s')
        ];

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post('/contas/cadastrar', $data);
        $this->assertResponseSuccess();
        $contas = $this->getTableLocator()->get('Accounts');
        $query = $contas->find()->where([
            'banco_id' => $data['banco_id'],
            'agencia' => $data['agencia'],
            'conta' => $data['conta']
        ]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test detalhar method
     *
     * @return void
     */
    public function testView(): void {
        $this->get('/contas/detalhar/1');
        $this->assertResponseOk();
    }

    /**
     * Test deletar method
     *
     * @return void
     */
    public function testDeletar(): void {
        $this->get('/contas/deletar/1');
        $this->assertResponseFailure();
    }

}
