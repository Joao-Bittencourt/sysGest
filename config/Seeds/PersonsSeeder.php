<?php

use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class PersonsSeeder extends AbstractSeed {

    public function run() {

        $faker = Factory::create('pt_BR');
        $qtd = 0;
        while ($qtd < 10) {
            $data[] = [
                'tipo_pessoa_id' => '1',
                'nome' => $faker->name(),
                'email' => $faker->email(),
                'cpf' => $faker->cpf(false),
                'dt_nascimento' => '1947-03-01',
                'cep' => $faker->postcode(false),
                'uf' => $faker->stateAbbr(),
                'pais' => 'BRASIL',
                'endereco' => $faker->address(),
                'numero' => $faker->buildingNumber(),
                'cidade' => $faker->city(),
                'ddd' => $faker->areaCode(),
                'telefone' => $faker->cellphone(false),
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ];
            $qtd++;
        }

        $posts = $this->table('persons');
        $posts->insert($data)
                ->saveData();
    }

}
