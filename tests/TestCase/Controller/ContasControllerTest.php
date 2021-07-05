<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ContasController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class ContasControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Contas'
    ];

    /**
     * Test listar method
     *
     * @return void
     */
    public function testList(): void {
        $this->get('/contas/list');
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
     * Test cadastrar method
     *
     * @return void
     */
    public function testGetAdd(): void {
        $this->get('/contas/add');
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
            'created_by' => '1',
            'modified' => date('Y-m-d H:i:s')
        ];
        
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        
        $this->post('/contas/add', $data);
        $this->assertResponseSuccess();
        $contas = $this->getTableLocator()->get('Contas');
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
        $this->get('/contas/view/1');
        $this->assertResponseFailure();
       
    }

    /**
     * Test deletar method
     *
     * @return void
     */
    public function testDeletar(): void {
        $this->get('/contas/delet/1');
        $this->assertResponseFailure();
    }

}
