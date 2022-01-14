<?php

use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class UserSeeder extends AbstractSeed {

    public function run() {
        $faker = Factory::create('pt_BR');

        $qtd = 0;
        while ($qtd < 10) {
            $data[] = [
                'login' => $faker->userName(),
                'password' => '$2y$10$PxpuB8DFkTK8MmI1jlvfseaH2mGF5VtEDENsFwc8E0ZBj8LGNCV/S',
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ];
            $qtd++;
        }
        $posts = $this->table('users');
        $posts->insert($data)
                ->saveData();
    }

}
