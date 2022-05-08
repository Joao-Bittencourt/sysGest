<div class="card">
    <div class="card-header">
        <?php echo 'TIPO DE PESSOA'; ?>
        <a class="btn btn-info btn-sm float-right" href="cadastrar">
            <i class="bi bi-clipboard-minus"></i>
        </a>
    </div>
    <div class="card-body">
        <?php echo $this->Field->elementPaginator($this->Paginator); ?>
        <table class="table table-striped">
            <?php
                $tableHeaders = [];
                $tableHeaders[] = [$this->Paginator->sort('id', ['title' => 'COD']) , ["scope" => "col"]];
                $tableHeaders[] = [$this->Paginator->sort('tipo', ['title' => 'TIPO']), ["scope" => "col"]];
                $tableHeaders[] = [$this->Paginator->sort('created', ['title' => 'CADASTRADO']), ["scope" => "col"]];
                $tableHeaders[] = [$this->Paginator->sort('status', ['title' => 'SITUAÇÃO']), ["scope" => "col"]];
                $tableHeaders[] = ['' => ["scope" => "col"]];

                $tableCells = [];
                foreach ($person_categories as $personCategory) {

                    $dado = [];
                    $dado[] = $personCategory->id;
                    $dado[] = $personCategory->tipo;
                    $dado[] = $personCategory->created;
                    $dado[] = $personCategory->status == '1' ? 'ativo' : 'inativo';

                    $editarButton = $this->Html->link(__('Editar'),
                            [
                                'action' => 'edit',
                                $personCategory->id
                            ],
                            [
                                'class' => 'btn btn-outline-warning btn-sm m-1',
                                'update' => '#content'
                            ]
                    );
                    $detalharButton = $this->Html->link(__('Detalhar'),
                            [
                                'action' => 'view',
                                $personCategory->id
                            ],
                            [
                                'class' => 'btn btn-outline-success btn-sm',
                                'update' => '#content'
                            ]
                    );

                    $dado[] = $editarButton . $detalharButton;

                    $tableCells[] = $dado;
                }

                echo $this->Html->tableHeaders($tableHeaders);
                echo $this->Html->tableCells($tableCells);
            ?>
        </table>         
    </div>
</div>
