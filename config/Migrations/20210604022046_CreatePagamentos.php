<?php

//declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePagamentos extends AbstractMigration {

    public function change() {
        $table = $this->table('pagamentos');
        $table->addColumn('recebedor_pessoa_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('conta_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('tipo_pagamento_tipo', 'string', [
            'default' => null,
            'limit' => 2,
            'null' => false,
        ]);
        $table->addColumn('n_total_parcelas', 'integer', [
            'default' => 1,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('vl_total', 'decimal', [
            'default' => 0,
            'precision' => '15',
            'scale' => '2',
//            'limit' => '15,2',
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
