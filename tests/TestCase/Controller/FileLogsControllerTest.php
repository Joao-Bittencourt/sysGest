<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\FileLogsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class FileLogsControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [];

    public function setUp(): void {
        $this->session([
            'Auth' => ['id' => 1]
        ]);
    }

    /**
     * Test error method
     *
     * @return void
     */
    public function testError() {
        $this->markTestIncomplete();
    }
    
    /**
     * Test debug method
     *
     * @return void
     */
    public function testDebug() {
        $this->markTestIncomplete();
    }
    
    /**
     * Test seeder method
     *
     * @return void
     */
    public function testSeeder() {
        $this->get('/file-logs/seeder/abcd/1');
//        $this->expectException(\Cake\Http\Exception\NotFoundException::class);
        $this->assertResponseError();
    }

}
