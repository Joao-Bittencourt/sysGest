<?php

declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class InstallmentsFixture extends TestFixture {

//    public $import = ['table' => 'installments'];
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pagamento_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => 1],
        'n_parcela' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => 1],
        'vl_bruto' => ['type' => 'decimal', 'length' => '15,2', 'null' => false, 'default' => 0],
        'vl_liquido' => ['type' => 'decimal', 'length' => '15,2', 'null' => false, 'default' => 0],
        'vl_desc' => ['type' => 'decimal', 'length' => '15,2', 'null' => false, 'default' => 0],
        'p_desc' => ['type' => 'decimal', 'length' => '15,2', 'null' => false, 'default' => 0],
        'vl_acrescimo' => ['type' => 'decimal', 'length' => '15,2', 'null' => false, 'default' => 0],
        'p_acrescimo' => ['type' => 'decimal', 'length' => '15,2', 'null' => false, 'default' => 0],
        'dt_vencimento' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => '2021-01-17 22:20:29', 'comment' => ''],
        'dt_pagamento' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => '2021-01-17 22:20:29', 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'created_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'modified_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null],
        'status' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
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
                'pagamento_id' => 1,
                'dt_vencimento' => '2021-01-17 22:20:29',
                'dt_pagamento' => '2021-01-17 22:20:29',
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
