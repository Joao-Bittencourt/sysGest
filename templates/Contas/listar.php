<?php
use Cake\Routing\Router;
?>

<div class="card">
    <div class="card-header">
        <?php echo 'CONTAS ';?>
        <a class="btn btn-info btn-sm float-right" href="<?= Router::url(['controller' => 'Contas', 'action' => 'cadastrar']); ?>">
            <i class="bi bi-clipboard-minus"></i>
        </a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <?php

            $tableHeaders = [];
            $tableHeaders[] = ['COD' => ["scope" => "col"]];
            $tableHeaders[] = ['AGENCIA' => ["scope" => "col"]];
            $tableHeaders[] = ['CONTA' => ["scope" => "col"]];

            $tableCells = [];
            foreach ($dados as $dado) {

                $dadoCell = [];
                $dadoCell[] = $dado->id;
                $dadoCell[] = $dado->agencia;
                $dadoCell[] = $dado->conta;

                $tableCells[] = $dadoCell;
            }

            echo $this->Html->tableHeaders($tableHeaders);
            echo $this->Html->tableCells($tableCells);
            ?>


        </table>

    </div>
</div>