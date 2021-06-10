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

//        $table->addColumn('id', 'integer', [
//            'default' => null,
//            'limit' => 11,
//            'null' => false,
//        ]);

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
            'null' => false,
        ]);

        $table->addColumn('status', 'integer', [
            'default' => 1,
            'limit' => 1,
            'null' => false,
        ]);

        $table->create();
    }

}