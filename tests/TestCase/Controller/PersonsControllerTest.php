<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\PersonsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class PessoasControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Pessoas',
        'app.TipoPessoas'
    ];
  
    public function setUp(): void {
        $this->session([
            'Auth' => ['id' => 1]
        ]);
    }
     /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void {
        $this->get('/pessoas/');
        $this->assertResponseOk();
    }
    
    /**
     * Test listar method
     *
     * @return void
     */
    public function testListar(): void {
        $this->get('/pessoas/listar');
        $this->assertResponseOk();
    }

    /**
     * Test detalhar method
     *
     * @return void
     */
    public function testDetalhar(): void {
        $this->get('/pessoas/detalhar/1');
        $this->assertResponseOk();
    }

    /**
     * Test cadastrar method
     *
     * @return void
     */
    public function testCadastrar(): void {
        $data = [
            'nome' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'cpf' => 'Lorem ipsu',
            'dt_nascimento' => date('Y-m-d H:i:s'),
            'cep' => 'Lorem ipsu',
            'uf' => 'Lo',
            'pais' => 'Lorem ipsum dolor sit amet',
            'endereco' => 'Lorem ipsum dolor sit amet',
            'numero' => 'Lorem ipsum dolor sit a',
            'cidade' => 'Lorem ipsum dolor sit amet',
            'ddd' => 1,
            'telefone' => 1,
            'created' => '2021-01-17 22:20:29',
            'modified' => '2021-01-17 22:20:29',
            'user_id' => 1,
            'status' => 1,
            'tipo_pessoa_id' => 1,
        ];

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post('/pessoas/cadastrar', $data);
        $this->assertResponseSuccess();
        $pessoas = $this->getTableLocator()->get('pessoas');
        $query = $pessoas->find()->where(['nome' => $data['nome'], 'email' => $data['email']]);
        $this->assertEquals(1, $query->count());
    }
    
     /**
     * Test get cadastrar method
     *
     * @return void
     */
    public function testGetCadastrar(): void {
        $this->get('/pessoas/cadastrar');
        $this->assertResponseOk();
    }
        
     /**
     * Test get cadastrar method
     *
     * @return void
     */
    public function testGetEditar(): void {
        $this->get('/pessoas/editar/1');
        $this->assertResponseOk();
    }
    

}
