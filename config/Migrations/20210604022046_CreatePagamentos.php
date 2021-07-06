 <?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePagamentos extends AbstractMigration {

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change() {
        $table = $this->table('pagamentos');
        $table->addColumn('tipo_pagamento_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('pagador_pessoa_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('conta_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('n_total_parcelas', 'integer', [
            'default' => 1,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('vl_total', 'decimal', [
            'default' => 0,
            'limit' => '15,2',
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
