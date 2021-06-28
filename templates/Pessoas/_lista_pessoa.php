
<table class="table table-bordered">
    <?php
        $tableHeaders = [];
        $tableHeaders[] = ['COD' => ["scope" => "col"]];
        $tableHeaders[] = ['NOME' => ["scope" => "col"]];
        $tableHeaders[] = ['EMAIL' => ["scope" => "col"]];
        $tableHeaders[] = ['DATA NASCIMENTO' => ["scope" => "col"]];

        $tableCells = [];
        foreach ($dados as $dado) {
                
            $dadoCell = [];
            $dadoCell[] = $dado->id;
            $dadoCell[] = $dado->nome;
            $dadoCell[] = $dado->email;
            $dadoCell[] = $dado->dt_nascimento;

            $tableCells[] = $dadoCell;
        }

        echo $this->Html->tableHeaders($tableHeaders);
        echo $this->Html->tableCells($tableCells);
    ?>
</table>

