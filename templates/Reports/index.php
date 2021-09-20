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

