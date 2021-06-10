<?php
use Cake\Routing\Router;
?>

<div class="card">
    <div class="card-header">
        <?php echo 'PESSOAS ';?>
        <a class="btn btn-info btn-sm float-right" href="<?= Router::url(['controller' => 'Pessoas', 'action' => 'cadastrar']); ?>">
            <i class="bi bi-clipboard-minus"></i>
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <?php
            $tableHeaders = [];
            $tableHeaders[] = ['COD' => ["scope" => "col"]];
            $tableHeaders[] = ['NOME' => ["scope" => "col"]];
            $tableHeaders[] = ['EMAIL' => ["scope" => "col"]];
            $tableHeaders[] = ['DATA NASCIMENTO' => ["scope" => "col"]];

            $tableCells = [];
            foreach ($dados as $key => $dado) {
                
                $dadoCell = [];
                $dadoCell[] = $dado->id;
                $dadoCell[] = $dado->nome;
                $dadoCell[] = $dado->email;
                $dadoCell[] = $dado->datanascimento;

                $tableCells[] = $dadoCell;
            }

            echo $this->Html->tableHeaders($tableHeaders);
            echo $this->Html->tableCells($tableCells);
            ?>


        </table>

    </div>
</div>