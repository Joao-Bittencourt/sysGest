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
        echo $this->Form->create($pessoas);?>
        <div class="row">
            <div class="col-md-8">
                <?= $this->Form->control('nome', ['label' => 'Nome', 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-8">
                <?= $this->Form->control('email', ['label' => 'Email', 'class' => 'form-control']); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $this->Form->control('tipo_pessoa_id', ['label' => 'TIPO PESSOA','empty' =>'a', 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-4">
                <?= $this->Form->control('cpf', ['label' => 'CPF', 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-4">
                <?= $this->Form->control('dt_nascimento', ['label' => 'DT. Nascimento', 'class' => 'form-control']); ?>
            </div>
        </div>
        <?php if (false) { ?>
        <div class="row">
            <div class="col-md-5">
                <?= $this->Form->control('endereco', ['label' => 'ENDEREÇO', 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-3">
                <?= $this->Form->control('cep', ['label' => 'CEP', 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-2">
                <?= $this->Form->control('uf', ['label' => 'UF', 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-2">
                <?= $this->Form->control('pais', ['label' => 'PAIS', 'class' => 'form-control']); ?>
            </div>
        </div>
        <?php } ?>
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