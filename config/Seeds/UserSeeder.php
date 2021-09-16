<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed {

    public function run() {
        $data = [
            [
                'login' => 'login',
                'password' => 'password',
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ],
            [
                'login' => 'login2',
                'password' => 'password2',
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ],
            [
                'login' => '123456',
                'password' => '123456',
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
