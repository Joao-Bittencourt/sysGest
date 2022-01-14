<?php

$controllerName = $this->request->getParam('controller');
?>
<div class="card">
    <div class="card-header">
<?php echo $controllerName; ?>
    </div>
    <div class="card-body">
        <?php
        echo $this->Field->formCreate($entity);
        ?>
    </div>
    <div class="card-footer">

        <?php
        echo $this->Form->button('Salvar', ['class' => "btn btn-primary"]);
        echo $this->Form->end();
        ?>
    </div>
</div>
