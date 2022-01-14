<?php

use Phinx\Seed\AbstractSeed;
use Cake\ORM\TableRegistry;
use Faker\Factory;

class AccountsSeeder extends AbstractSeed {

    public function run() {
        $faker = Factory::create('pt_BR');

        $banks = TableRegistry::getTableLocator()->get('banks');
        $arBanksid = $banks->find('list')->toArray();
        $arPersonsid = $banks->Accounts->Persons->find('list')->toArray();
        $qtd = 0;
        while ($qtd < 10) {
            $data[] = [
                'banco_id' => array_rand($arBanksid),
                'pessoa_id' => array_rand($arPersonsid),
                'agencia' => $faker->randomNumber(4, true),
                'agencia_dv' => $faker->randomNumber(1, true),
                'conta' => $faker->randomNumber(5, true),
                'conta_dv' => $faker->randomNumber(1, true),
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ];
            $qtd++;
        }
       
        $posts = $this->table('accounts');
        $posts->insert($data)
                ->saveData();
    }

}
