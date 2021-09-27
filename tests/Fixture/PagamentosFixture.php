<?php

declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class PagamentosFixture extends TestFixture {

//    public $import = ['table' => 'pagamentos'];;    
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'conta_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => ''],
        'recebedor_pessoa_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false,'default' => '1', 'comment' => ''],
        'tipo_pagamento_tipo' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'default' => '1', 'comment' => ''],
        'n_total_parcelas' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => ''],
        'vl_total' => ['type' => 'decimal', 'length' => '15,2', 'null' => false, 'default' => 0],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'status' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    

    /**
     * Init method
     *
     * @return void
     */
    public function init(): void {
        $this->records = [
            [
                'id' => 1,
                'conta_id' => 1,
                'recebedor_pessoa_id' => 1,
                'tipo_pagamento_tipo' => 'C',
                'n_total_parcelas' => 1,
                'vl_total' => '1.25',
                'created' => '2021-01-17 22:20:29',
                'created_by' => 1,
                'modified' => '2021-01-17 22:20:29',
                'modified_by' => null,
                'status' => 1,
                
            ],
            [
                'id' => 2,
                'conta_id' => 1,
                'recebedor_pessoa_id' => 1,
                'tipo_pagamento_tipo' => 'D',
                'n_total_parcelas' => 1,
                'vl_total' => '1.20',
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
