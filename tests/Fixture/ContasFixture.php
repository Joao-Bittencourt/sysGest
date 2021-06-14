<?php

declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class ContasFixture extends TestFixture {

    public $import = ['table' => 'contas'];
    
    

    /**
     * Init method
     *
     * @return void
     */
    public function init(): void {
        $this->records = [
            [
                'id' => 1,
                'created' => '2021-01-17 22:20:29',
                'created_by' => 1,
                'modified' => '2021-01-17 22:20:29',
                'modified_by' => null,
                'status' => 1,
                
            ],
        ];
        parent::init();
    }

}
