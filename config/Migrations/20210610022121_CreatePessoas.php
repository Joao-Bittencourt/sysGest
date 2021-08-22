<?php

//declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePessoas extends AbstractMigration {

    public function change() {
        $table = $this->table('pessoas');
        $table->addColumn('tipo_pessoa_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('cpf', 'string', [
            'default' => null,
            'limit' => 14,
            'null' => false,
        ]);
        $table->addColumn('dt_nascimento', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('cep', 'string', [
            'default' => null,
            'limit' => 12,
            'null' => true,
        ]);
        $table->addColumn('uf', 'string', [
            'default' => null,
            'limit' => 2,
            'null' => true,
        ]);
        $table->addColumn('pais', 'string', [
            'default' => 'BRASIL',
            'limit' => 75,
            'null' => true,
        ]);
        $table->addColumn('endereco', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('numero', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('cidade', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('ddd', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => true,
        ]);
        $table->addColumn('telefone', 'integer', [
            'default' => null,
            'limit' => 11,
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
        $table->addColumn('modified_by', 'integer', [
            'default' => null,
            'limit' => 11,
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
