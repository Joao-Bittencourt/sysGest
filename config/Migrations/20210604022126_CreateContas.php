<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateContas extends AbstractMigration {

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change() {
        $table = $this->table('contas');
        $table->addColumn('banco_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('pessoa_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('agencia', 'string', [
            'default' => null,
            'limit' => 5,
            'null' => false,
        ]);
        $table->addColumn('agencia_dv', 'string', [
            'default' => 0,
            'limit' => 2,
            'null' => true,
        ]);
        $table->addColumn('conta', 'string', [
            'default' => 0,
            'limit' => 12,
            'null' => false,
        ]);
        $table->addColumn('conta_dv', 'string', [
            'default' => 0,
            'limit' => 2,
            'null' => true,
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
