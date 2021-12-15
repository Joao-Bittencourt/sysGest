<?php

use Phinx\Seed\AbstractSeed;

class PersonsSeeder extends AbstractSeed {

    public function run() {
        $data = [
            [
                'tipo_pessoa_id' => '1',
                'nome' => 'Alícia Maitê Simone da Rosa',
                'email' => 'aaliciamaitesimonedarosa@haldex.com',
                'cpf' => '26097942079',
                'dt_nascimento' => '1947-03-01',
                'cep' => '82515392',
                'uf' => 'PR',
                'pais' => 'BRASIL',
                'endereco' => 'Rua Eleanor Roosevelt',
                'numero' => '528',
                'cidade' => 'Curitiba',
                'ddd' => '41',
                'telefone' => '998247981',
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ],
            [
                'tipo_pessoa_id' => '2',
                'nome' => 'Sebastião Bryan Mendes',
                'email' => 'ssebastiaobryanmendes@paraisopolis.com.br',
                'cpf' => '23197418280',
                'dt_nascimento' => '1953-07-05',
                'cep' => '98804365',
                'uf' => 'RS',
                'pais' => 'BRASIL',
                'endereco' => 'Rua Padre Cícero',
                'numero' => '296',
                'cidade' => 'Santo Ângelo',
                'ddd' => '55',
                'telefone' => '997935333',
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'status' => 1,
            ],
           
        ];

        $posts = $this->table('persons');
        $posts->insert($data)
                ->saveData();
    }

}
