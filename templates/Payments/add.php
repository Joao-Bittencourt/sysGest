<?php

use Cake\Routing\Router;

$controllerName = $this->request->getParam('controller');
$actionName = $this->request->getParam('action');
?>

<div class="card">
    <div class="card-header">
        <?php echo $controllerName; ?>
        <a class="btn btn-info btn-sm float-right" href="<?= Router::url(['controller' => $controllerName, 'action' => 'listar']); ?>">
            <i class="bi bi-clipboard-minus"></i>
        </a>
    </div>
    <div class="card-body">

        <?php echo $this->Form->create($entity); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->control('conta_id', ['label' => 'Conta', 'class' => 'form-control', 'empty' => ' - ']); ?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('recebedor_pessoa_id', ['label' => 'Recebedor', 'class' => 'form-control', 'empty' => ' - ']); ?>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $this->Form->control('vl_total', ['label' => 'Valor', 'type' => 'text', 'class' => 'form-control']); ?> 
            </div>
            <div class="col-md-2">
                <?= $this->Form->control('n_total_parcela', ['label' => 'Num. parcelas', 'class' => 'form-control', 'empty' => ' - ']); ?> 
            </div>
            <div class="col-md-5">
                <?= $this->Form->control('tipo_pagamento_tipo', ['label' => 'Tipo pagemento', 'class' => 'form-control', 'empty' => ' - ']); ?> 
            </div>

        </div>
        <hr>
        <div id="installmentQtd">
            <?php
            echo $this->element('/common/installments_panel');
            ?>
        </div>

    </div>
    <div class="card-footer">

        <?php
        echo $this->Form->button('Salvar', ['class' => "btn btn-primary", 'id' => 'submitFormId']);
        echo $this->Form->end();
        ?>
    </div>
</div>

<script>
    $('#n-total-parcela').on('change', function () {
        var form = $('form').serialize();
        ajax(form);
    });

    function ajax(form) {
        $.ajax({
            method: 'post',
            url: "<?php echo $this->Url->build(['controller' => 'payments', 'action' => 'add']); ?>",
            data: form,

            success: function (response) {
                $('#installmentQtd').html(response);
            }
        });
    };
    
</script>