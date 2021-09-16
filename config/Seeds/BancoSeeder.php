<?php

use Phinx\Seed\AbstractSeed;

class BancoSeeder extends AbstractSeed {

    public function run() {
        $data = [
            [
                'nome' => 'Banco do Brasil',
                'codigo_banco' => 001,
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'modified_by' => null,
                'status' => 1,
            ],
            [
                'nome' => 'Banco do Estado do Rio Grande do Sul',
                'codigo_banco' => 041,
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'modified_by' => null,
                'status' => 1,
            ],
            [
                'nome' => 'Banco Inter',
                'codigo_banco' => 077,
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'modified_by' => null,
                'status' => 1,
            ],
            [
                'nome' => 'Banco Santander',
                'codigo_banco' => 033,
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'modified_by' => null,
                'status' => 1,
            ],
            [
                'nome' => 'Caixa Econômica Federal',
                'codigo_banco' => 104,
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'modified_by' => null,
                'status' => 1,
            ],
            [
                'nome' => 'Itaú Unibanco',
                'codigo_banco' => 341,
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'modified_by' => null,
                'status' => 1,
            ],
        ];
        $posts = $this->table('bancos');
        $posts->insert($data)
                ->saveData();
    }

}
