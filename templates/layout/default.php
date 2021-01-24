<!doctype html>

<html class="no-js" lang="en">
    <?php echo $this->element('header'); ?>
    <body>
        <?php echo $this->element('menu'); ?>

        <?php
            echo $this->Flash->render();
            echo $this->fetch('content');
        ?>

        <?php echo $this->element('footer'); ?>
        </div>
    </body>
</html>