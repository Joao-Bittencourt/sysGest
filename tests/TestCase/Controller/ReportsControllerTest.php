<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ReportsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class ReportsControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Payments'
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
        $this->get('/relatorios/');
        $this->assertResponseOk();
    }

}
