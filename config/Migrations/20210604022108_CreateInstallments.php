<?php

//declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateInstallments extends AbstractMigration {

    public function change() {
        $table = $this->table('installments');
        $table->addColumn('pagamento_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('n_parcela', 'integer', [
            'default' => 1,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('vl_bruto', 'decimal', [
            'default' => 0,
            'precision' => '15',
            'scale' => '2',
//            'limit' => '15,2',
            'null' => false,
        ]);
        $table->addColumn('vl_liquido', 'decimal', [
            'default' => 0,
            'precision' => '15',
            'scale' => '2',
//            'limit' => '15,2',
            'null' => false,
        ]);
        $table->addColumn('vl_desc', 'decimal', [
            'default' => 0,
            'precision' => '15',
            'scale' => '2',
//            'limit' => '15,2',
            'null' => true,
        ]);
        $table->addColumn('p_desc', 'decimal', [
            'default' => 0,
            'precision' => '15',
            'scale' => '2',
//            'limit' => '15,2',
            'null' => true,
        ]);
        $table->addColumn('vl_acrescimo', 'decimal', [
            'default' => 0,
            'precision' => '15',
            'scale' => '2',
//            'limit' => '15,2',
            'null' => true,
        ]);
        $table->addColumn('p_acrescimo', 'decimal', [
            'default' => 0,
            'precision' => '15',
            'scale' => '2',
//            'limit' => '15,2',
            'null' => true,
        ]);
        $table->addColumn('dt_vencimento', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('dt_pagamento', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created_by', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified_by', 'datetime', [
            'default' => null,
            'null' => true,
        ]);

        $table->addColumn('status', 'integer', [
            'default' => 1,
            'limit' => 1,
            'null' => false,
        ]);

        $table->create();
    }

}
