<?php
use Cake\Routing\Router;
?>

<div class="card">
    <div class="card-header">
        <?php echo 'BANCOS ';?>
        <a class="btn btn-info btn-sm float-right" href="listar">
            <i class="bi bi-clipboard-minus"></i>
        </a>
    </div>
    <div class="card-body">
        
        <?php
        echo $this->Form->create($entity);?>
        <div class="row">
            <div class="col-md-10">
                <?= $this->Form->control('nome', ['label' => 'Nome', 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-2">
                <?= $this->Form->control('codigo_banco', ['label' => 'Cod. Banco', 'class' => 'form-control']); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $this->Form->control('status', ['options' => ['1' => 'SIM', '0' => 'NÃO'], 'empy' => ' - selecione - ','label' => 'status', 'class' => 'form-control']); ?> 
            </div>
        </div>
    </div>
    <div class="card-footer">
   
        <?php
            echo $this->Form->button('Salvar',  [ 'class' =>"btn btn-primary"]); 
            echo $this->Form->end(); 
        ?>
    </div>
</div>