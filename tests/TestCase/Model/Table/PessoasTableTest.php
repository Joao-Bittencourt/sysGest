<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PessoasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PessoasTable Test Case
 */
class PessoasTableTest extends TestCase {

    /**
     * Test subject
     *
     * @var \App\Model\Table\PessoasTable
     */
    protected $Pessoas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Pessoas',
        'app.Users',
        'app.TipoPessoas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pessoas') ? [] : ['className' => PessoasTable::class];
        $this->Pessoas = $this->getTableLocator()->get('Pessoas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void {
        unset($this->Pessoas);

        parent::tearDown();
    }

    /**
     * Test validation name
     *
     * @return void
     */
    public function testValidationName(): void {
        $data = ['nome' => null];
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['nome']);

        $data = ['nome' => ''];
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['nome']);
    }

    /**
     * Test validation email
     *
     * @return void
     */
    public function testValidationEmail(): void {
        $data = ['email' => null];
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['email']);

        $data = ['email' => ''];
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['email']);
    }

    /**
     * Test validation cpf
     *
     * @return void
     */
    public function testValidationCpf(): void {
        $data = ['cpf' => null];
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['cpf']);

        $data = ['cpf' => ''];
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['cpf']);

        $data = ['cpf' => '123456789101245']; // tamanho 15
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['cpf']);
    }

    /**
     * Test validation cep
     *
     * @return void
     */
    public function testValidationCep(): void {
//        $data = [ 'cep' => null ];
//        $pessoa = $this->Pessoas->newEntity($data);
//        $this->assertNotEmpty($pessoa->getErrors()['cep']);
//        
//        $data = [ 'cep' => ''];
//        $pessoa = $this->Pessoas->newEntity($data);
//        $this->assertNotEmpty($pessoa->getErrors()['cep']);

        $data = ['cep' => '123456789101245']; // tamanho 15
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['cep']);
    }

    /**
     * Test validation uf
     *
     * @return void
     */
    public function testValidationUf(): void {
//        $data = [ 'uf' => null ];
//        $pessoa = $this->Pessoas->newEntity($data);
//        $this->assertNotEmpty($pessoa->getErrors()['uf']);
//        
//        $data = [ 'uf' => ''];
//        $pessoa = $this->Pessoas->newEntity($data);
//        $this->assertNotEmpty($pessoa->getErrors()['uf']);

        $data = ['uf' => '123']; // tamanho 3
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['uf']);
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
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['status']);

        $data = ['status' => '123']; // tamanho 3
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['status']);
    }

    /**
     * Test validation tipo_pessoa_id
     *
     * @return void
     */
    public function testValidationTipoPessoa(): void {
        $data = ['tipo_pessoa_id' => null];
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['tipo_pessoa_id']);

        $data = ['tipo_pessoa_id' => ''];
        $pessoa = $this->Pessoas->newEntity($data);
        $this->assertNotEmpty($pessoa->getErrors()['tipo_pessoa_id']);
    }

    /**
     * Test validation created_by
     *
     * @return void
     * @todo Description revisar
     */
    public function testBeforeSaveCreatedBy(): void {
        $data = [
            'nome' => 'Lorem ipsum dolor sit amet',
            'email' => 'Loremipsumdolorsitamet',
            'cpf' => 'Lorem ips1',
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

        $pessoa = $this->Pessoas->newEmptyEntity();
        $pessoasFullEntity = $this->Pessoas->patchEntity($pessoa, $data);
        $saved = $this->Pessoas->save($pessoa);

        $this->assertEmpty($pessoasFullEntity->getErrors());
        
//        $pessoas = $this->Pessoas->find()->all()->toArray();
//        foreach ($pessoas as $pessoaDado){
//            debug($pessoaDado->created_by);
//        }

    }

    public function testNotUniqueCpf() {
        $data = [
            'nome' => 'Lorem ipsu',
            'cpf' => 'Lorem ipsu',
            'tipo_pessoa_id' => 1,
        ];

        $pessoa = $this->Pessoas->newEntity($data);
        $this->Pessoas->save($pessoa);
        $saved = $this->Pessoas->save($pessoa);
        $this->assertNotEmpty($pessoa->getErrors()['cpf']);
    }

}
