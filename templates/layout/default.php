<!DOCTYPE html>
<html lang="pt_BR">
    <?= $this->element('header'); ?>
    <body>
        <div class="wrapper">
            <?= $this->element('menu'); ?>
                <div id="content">
                    <?php
                        echo $this->Flash->render();
                        echo $this->fetch('content');
                    ?>

            </div>
            <?= $this->element('footer'); ?>
        </div>
    </body>
</html>
