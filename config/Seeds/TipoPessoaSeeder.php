<?php

use Phinx\Seed\AbstractSeed;

class TipoPessoaSeeder extends AbstractSeed {

    public function run() {
        $data = [
            [
                'tipo' => 'Fornecedor',
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ],
            [
                'tipo' => 'Consumidor',
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ],
        ];

        $posts = $this->table('users');
        $posts->insert($data)
                ->saveData();
    }

}
