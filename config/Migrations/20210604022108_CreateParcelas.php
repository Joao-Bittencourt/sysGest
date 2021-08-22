<?php

//declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateParcelas extends AbstractMigration {
    
    public function change() {
        $table = $this->table('parcelas');
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
        $table->addColumn('vl_bruto', 'number', [
            'default' => 0,
            'limit' => '15,2',
            'null' => false,
        ]);
        $table->addColumn('vl_liquido', 'number', [
            'default' => 0,
            'limit' => '15,2',
            'null' => false,
        ]);
        $table->addColumn('vl_desc', 'number', [
            'default' => 0,
            'limit' => '15,2',
            'null' => true,
        ]);
        $table->addColumn('p_desc', 'number', [
            'default' => 0,
            'limit' => '15,2',
            'null' => true,
        ]);
        $table->addColumn('vl_acrescimo', 'number', [
            'default' => 0,
            'limit' => '15,2',
            'null' => true,
        ]);
        $table->addColumn('p_acrescimo', 'number', [
            'default' => 0,
            'limit' => '15,2',
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
