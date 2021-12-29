<?php

use Cake\Routing\Router;
?>

<div class="card">
    <div class="card-header">
        <?php echo 'SAIDAS';?>
        <a class="btn btn-info btn-sm float-right" href="<?= Router::url(['controller' => 'Contas', 'action' => 'cadastrar']); ?>">
            <i class="bi bi-clipboard-minus"></i>
        </a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <?php
            $tableHeaders = [];
            $tableHeaders[] = ['COD' => ["scope" => "col"]];
            $tableHeaders[] = ['PESSOA' => ["scope" => "col"]];
            $tableHeaders[] = ['TIPO' => ["scope" => "col"]];
            $tableHeaders[] = ['VALOR' => ["scope" => "col"]];
            $tableHeaders[] = ['AGENCIA' => ["scope" => "col"]];
            $tableHeaders[] = ['CONTA' => ["scope" => "col"]];

            $tableCells = [];
            foreach ($outputs as $output) {
                
                $class = $output->tipo_pagamento_tipo == 'C' ? 'text-success' : 'text-danger';

                $dadoCell = [];
                $dadoCell[] = $output->id;
                $dadoCell[] = $output->person->nome;
                $dadoCell[] = $output->person->person_category->tipo;
                $dadoCell[] = [number_format($output->vl_total, 2, ',', '.'), ['class' => $class]];
                $dadoCell[] = $output->account->agencia;
                $dadoCell[] = $output->account->conta;
//
                $tableCells[] = $dadoCell;
            }
//
            echo $this->Html->tableHeaders($tableHeaders);
            echo $this->Html->tableCells($tableCells);;
            ?>


        </table>

    </div>
</div>
