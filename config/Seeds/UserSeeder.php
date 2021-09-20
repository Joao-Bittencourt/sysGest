<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed {

    public function run() {
        $data = [
            [
                'login' => 'login',
                'password' => '$2y$10$PxpuB8DFkTK8MmI1jlvfseaH2mGF5VtEDENsFwc8E0ZBj8LGNCV/S',
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ],
            [
                'login' => 'login2',
                'password' => '$2y$10$PxpuB8DFkTK8MmI1jlvfseaH2mGF5VtEDENsFwc8E0ZBj8LGNCV/S',
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ],
            [
                'login' => '123456',
                'password' => '$2y$10$PxpuB8DFkTK8MmI1jlvfseaH2mGF5VtEDENsFwc8E0ZBj8LGNCV/S',
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
