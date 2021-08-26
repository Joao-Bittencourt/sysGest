<?php
use Cake\Routing\Router;
?>

<div class="card">
    <div class="card-header">
        <?php echo 'Pessoas ';?>
        <a class="btn btn-info btn-sm float-right" href="<?= Router::url(['controller' => 'Pessoas', 'action' => 'listar']); ?>">
            <i class="bi bi-clipboard-minus"></i>
        </a>
    </div>
    <div class="card-body">
        
        <?php
        echo $this->Form->create($entity);?>
        <div class="row">
            <div class="col-md-8">
                <?= $this->Form->control('login', ['label' => 'Login', 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-8">
                <?= $this->Form->control('password', ['label' => 'Senha', 'class' => 'form-control']); ?>
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