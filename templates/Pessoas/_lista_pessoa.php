
<table class="table table-bordered">
    <?php
        $tableHeaders = [];
        $tableHeaders[] = ['COD' => ["scope" => "col"]];
        $tableHeaders[] = ['NOME' => ["scope" => "col"]];
        $tableHeaders[] = ['EMAIL' => ["scope" => "col"]];
        $tableHeaders[] = ['DATA NASCIMENTO' => ["scope" => "col"]];

        $tableCells = [];
        foreach ($pessoas as $pessoa) {
                
            $dadoCell = [];
            $dadoCell[] = $pessoa->id;
            $dadoCell[] = $pessoa->nome;
            $dadoCell[] = $pessoa->email;
            $dadoCell[] = $pessoa->dt_nascimento;

            $tableCells[] = $dadoCell;
        }

        echo $this->Html->tableHeaders($tableHeaders);
        echo $this->Html->tableCells($tableCells);
    ?>
</table>

