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
            debug($dados);
            $tableHeaders = [];
            $tableHeaders[] = ['COD' => ["scope" => "col"]];
            $tableHeaders[] = ['BANCO' => ["scope" => "col"]];
            $tableHeaders[] = ['COD BANCO' => ["scope" => "col"]];

            $tableCells = [];
            foreach ($bancos as $banco) {

                $dado = [];
                $dado[] = $banco->id;
                $dado[] = $banco->nome;
                $dado[] = $banco->codigo_banco;

                $tableCells[] = $dado;
            }

            echo $this->Html->tableHeaders($tableHeaders);
            echo $this->Html->tableCells($tableCells);
            ?>


        </table>

    </div>
</div>