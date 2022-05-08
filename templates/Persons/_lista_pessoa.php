
<table class="table table-bordered">
    <?php
        $tableHeaders = [];
        $tableHeaders[] = [$this->Paginator->sort('id', ['title' => 'COD']), ["scope" => "col"]];
        $tableHeaders[] = [$this->Paginator->sort('nome', ['title' => 'NOME']), ["scope" => "col"]];
        $tableHeaders[] = [$this->Paginator->sort('email', ['title' => 'EMAIL']), ["scope" => "col"]];
        $tableHeaders[] = [$this->Paginator->sort('dt_nascimento', ['title' => 'DATA NASCIMENTO']), ["scope" => "col"]];

        $tableCells = [];
        foreach ($persons as $pessoa) {
                
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

