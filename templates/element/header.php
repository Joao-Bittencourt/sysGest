<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title> 

    <?php
        echo $this->Html->css([
            'style4',
            'bootstrap.min'
        ]);
    ?>

</head>
