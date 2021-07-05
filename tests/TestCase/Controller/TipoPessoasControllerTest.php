<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\TipoPessoasController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\TipoPessoasController Test Case
 *
 * @uses \App\Controller\TipoPessoasController
 */
class TipoPessoasControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TipoPessoas',
        'app.Pessoas',
    ];

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
     * Test view method
     *
     * @return void
     */
    public function testView(): void {
        $this->get('/tipo-pessoas/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void {
        $this->get('/tipo-pessoas/add');
        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void {
        $this->get('/tipo-pessoas/edit/1');
        $this->assertResponseOk();
    }
    
    /**
     * Test edit method
     *
     * @return void
     */
    public function testEditWhitoutId(): void {
        $this->get('/tipo-pessoas/edit/');
        $this->assertResponseFailure();
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
        
        $this->post('/tipo-pessoas/delete/1', $data);
        $this->assertResponseSuccess();
 
    }
    /**
     * Test get delete method
     *
     * @return void
     */
    public function testGetDelete(): void {
        $this->get('/tipo-pessoas/delete/1');
        $this->assertResponseError();
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
        
        $this->post('/tipo-pessoas/delete/', $data);
        $this->assertResponseFailure();
    }

}
