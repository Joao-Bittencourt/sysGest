<!DOCTYPE html>
<html lang="pt_BR">
    <div class="wrapper">
        <?= $this->element('header'); ?>
        <?= $this->element('menu'); ?>
        <div class="main-panel">
            <div class="content">
            <?php
                echo $this->Flash->render();
                echo $this->fetch('content');
            ?>
            </div>
        </div>
        
        <?= $this->element('footer'); ?>
    </div>
</html>