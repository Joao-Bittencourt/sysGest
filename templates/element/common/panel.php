<?php
use Cake\Routing\Router;

$controllerName = $this->request->getParam('controller');
?>
<div class="card">
    <div class="card-header">
        <?php echo $controllerName; ?>
    </div>
    <div class="card-body">
        <?php       
            echo $this->Field->textFieldCreate($entity);
        ?>
    </div>
</div>

