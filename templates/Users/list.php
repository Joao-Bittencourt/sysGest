<?php
use Cake\Routing\Router;
?>

<div class="card">
    <div class="card-header">
        <?php echo 'USUARIOS ';?>
        <a class="btn btn-info btn-sm float-right" href="cadastrar">
            <i class="bi bi-clipboard-minus"></i>
        </a>
    </div>
    <div class="card-body">
        <?php echo $this->Field->elementPaginator($this->Paginator); ?>
        <table class="table table-striped">
            <?php
            $tableHeaders = [];
            $tableHeaders[] = ['COD' => ["scope" => "col"]];
            $tableHeaders[] = ['LOGIN' => ["scope" => "col"]];
            $tableHeaders[] = ['STATUS' => ["scope" => "col"]];

            $tableCells = [];
            foreach ($users as $user) {

                $dado = [];
                $dado[] = $user->id;
                $dado[] = $user->login;
                $dado[] = $user->status;

                $tableCells[] = $dado;
            }

            echo $this->Html->tableHeaders($tableHeaders);
            echo $this->Html->tableCells($tableCells);
            ?>


        </table>

    </div>
</div>