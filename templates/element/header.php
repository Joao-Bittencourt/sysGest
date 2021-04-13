<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title> 

    <?php
        echo $this->Html->css([
            'atlantis.min',
            'bootstrap.min',
            'fonts.min'
        ]);
    ?>
</head>