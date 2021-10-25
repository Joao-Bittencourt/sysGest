<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\PersonCategoriesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;


class PersonCategoriesControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PersonCategories',
        'app.Persons',
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
        $this->get('/tipo-pessoas/');
        $this->assertResponseOk();
    }
    
    /**
     * Test list method
     *
     * @return void
     */
    public function testList(): void {
        $this->get('/tipo-pessoas/listar');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void {
        $this->get('/tipo-pessoas/detalhar/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void {
        $this->get('/tipo-pessoas/cadastrar');
        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void {
        $this->get('/tipo-pessoas/editar/1');
        $this->assertResponseOk();
    }
    
    
    /**
     * Test get delete method
     *
     * @return void
     */
    public function testDelete(): void {       
        $data = [];
        
        $this->enableCsrfToken();
        $this->enableSecurityToken();
//        
        $this->post('/tipo-pessoas/deletar/1', $data);
//        $this->assertResponseSuccess();
 
        $this->assertResponseFailure();
    }
    /**
     * Test get delete method
     *
     * @return void
     */
    public function testGetDelete(): void {
        $this->get('/tipo-pessoas/deletar/1');
        $this->assertResponseFailure();
    }
    
    /**
     * Test delete method
     *
     * @return void
     */
    public function testDeleteWhitoutId(): void {
        $data = [];
        
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        
        $this->post('/tipo-pessoas/deletar/', $data);
        $this->assertResponseFailure();
    }

}
