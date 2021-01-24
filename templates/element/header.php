<head>
    <?= $this->Html->charset() ?>
    <!--<title>Painel Administrativo - Sys Gest</title>-->
        <title>
            <?= $this->fetch('title') ?>
        </title> 
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<?php
    echo $this->Html->css([
        'bootstrap.min',
        'cs-skin-elastic',
        'flag-icon.min',
        'font-awesome.min',
        'jqvmap.min',
        'style',
        'themify-icons'
        
    ]);
?>
</head>