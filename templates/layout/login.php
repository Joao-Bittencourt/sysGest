<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php ?></title>
        <?= $this->element('header'); ?>
    </head>
    <style>
        body{
            padding-top:20px;
            background-color: #95999c;
            opacity: 85%
        }
    </style>
    <body>

        <div class="container">
            <?php echo $this->fetch('content'); ?>
        </div>

    </body>
</html>

