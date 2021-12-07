<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <?php
    
    echo $this->Html->script([
        'jquery.3.2.1.min',
    ]);
    
        echo $this->Html->css([
            'style4',
            'bootstrap.min',
            'cake',
        ]);
    ?>

</head>
