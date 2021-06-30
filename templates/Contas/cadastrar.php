<?php
use Cake\Routing\Router;

$controllerName = $this->request->getParam('controller');
$actionName = $this->request->getParam('action');
?>

<div class="card">
    <div class="card-header">
        <?php echo $controllerName;?>
        <a class="btn btn-info btn-sm float-right" href="<?= Router::url(['controller' => $controllerName, 'action' => 'listar']); ?>">
            <i class="bi bi-clipboard-minus"></i>
        </a>
    </div>
    <div class="card-body">
        
        <?php
        echo $this->Form->create($contas);?>
        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->control('banco_id', ['label' => 'Banco', 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('pessoa_id', ['label' => 'Pessoa', 'class' => 'form-control']); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <?= $this->Form->control('agencia', ['label' => 'Agencia', 'class' => 'form-control']); ?> 
            </div>
            <div class="col-md-1">
                <?= $this->Form->control('agencia_dv', ['label' => 'DV', 'class' => 'form-control']); ?> 
            </div>
            <div class="col-md-5">
                <?= $this->Form->control('conta', ['label' => 'Conta', 'class' => 'form-control']); ?> 
            </div>
            <div class="col-md-1">
                <?= $this->Form->control('conta_dv', ['label' => 'DV', 'class' => 'form-control']); ?> 
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