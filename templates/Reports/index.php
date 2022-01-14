<?php $this->assign('title', 'Home'); ?>
<div class='row'>

    <div class="col-md-6">
        <div class="card border-left-primary shadow">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Entradas
                        </div>
                        <div>
                            <?php
                            $value = number_format($entrys['sum'], 2, ',', '.');

                            echo $entrys['count'];
                            echo 'R$ ' . $value;
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-left-sucess shadow">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Saidas
                        </div>
                        <?php
                            $value = number_format($outputs['sum'], 2, ',', '.');

                            echo $outputs['count'];
                            echo 'R$ ' . $value;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        <?php echo 'EXTRATO';?>
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
            $tableHeaders[] = ['' => ["scope" => "col"]];

            $tableCells = [];
            foreach ($payments as $payment) {
                
                $class = $payment->tipo_pagamento_tipo == 'C' ? 'text-success' : 'text-danger';
                $editarButton = $this->Html->link(__('Editar'), 
                        [
                            'controller' => 'payments',
                            'action' => 'edit',
                            $payment->id
                        ],
                        [
                            'class' => 'btn btn-outline-warning btn-sm m-1', 
                            'update' => '#content'
                        ]
                  );
                $detalharButton = $this->Html->link(__('Detalhar'), 
                        [
                            'controller' => 'payments',
                            'action' => 'view',
                            $payment->id
                        ],
                        [
                            'class' => 'btn btn-outline-success btn-sm', 
                            'update' => '#content'
                        ]
                  );
                
                $dadoCell = [];
                $dadoCell[] = $payment->id;
                $dadoCell[] = $payment->person->nome;
                $dadoCell[] = $payment->person->person_category->tipo;
                $dadoCell[] = [number_format($payment->vl_total, 2, ',', '.'), ['class' => $class]];
                $dadoCell[] = $payment->account->agencia;
                $dadoCell[] = $payment->account->conta;
                $dadoCell[] = $editarButton . $detalharButton;

                $tableCells[] = $dadoCell;
            }
            echo $this->Field->elementPaginator($this->Paginator);
            echo $this->Html->tableHeaders($tableHeaders);
            echo $this->Html->tableCells($tableCells);
            ?>
        </table>
    </div>
</div>


