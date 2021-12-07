<?php

use Phinx\Seed\AbstractSeed;

class AccountsSeeder extends AbstractSeed {

    public function run() {
        $data = [
            [
                'banco_id' => '1',
                'pessoa_id' => '1',
                'agencia' => '0940',
                'agencia_dv' => '0',
                'conta' => '1630621',
                'conta_dv' => '5',
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ],
            [
                'banco_id' => '2',
                'pessoa_id' => '2',
                'agencia' => '4738',
                'agencia_dv' => '0',
                'conta' => '35726627',
                'conta_dv' => '5',
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ],
            
           
        ];

        $posts = $this->table('accounts');
        $posts->insert($data)
                ->saveData();
    }

}
