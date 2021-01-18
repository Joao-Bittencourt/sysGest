<?php 
use Cake\Routing\Router;
?>
<html>
    <head>
        <?= $this->Html->charset() ?>
    <!--<title>Painel Administrativo - Sys Gest</title>-->
        <title>
            <?= $this->fetch('title') ?>
        </title> 
<link href='css/main.css' rel='stylesheet'	type='text/css' />
	<link href='css/boxy.css' rel='stylesheet'	type='text/css' />
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script type='text/javascript'	src='js/plugins/spinner/ui.spinner.js'></script>
	<script type='text/javascript'	src='js/plugins/spinner/jquery.mousewheel.js'></script>
	<script type='text/javascript' src='js/jquery.min.js'></script>

	<script src="js/jquery-ui.js"></script>

	<script type='text/javascript'	src='js/plugins/charts/excanvas.min.js'></script>
	<script type='text/javascript'	src='js/plugins/charts/jquery.sparkline.min.js'></script>


	<script type='text/javascript'	src='js/jquery.boxy.js'></script>
	<script type='text/javascript'	src='js/jquery.maskedinput.js'></script>

	<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBxgco6MaSuPBazG4aDlDoz9QSHvFBqSU&sensor=true"></script>-->

	<script type='text/javascript'	src='js/plugins/forms/uniform.js'></script>
	<script type='text/javascript'	src='js/plugins/forms/jquery.cleditor.js'></script>
	<script type='text/javascript'	src='js/plugins/forms/jquery.validationEngine-en.js'></script>
	<script type='text/javascript'	src='js/plugins/forms/jquery.validationEngine.js'></script>
	<script type='text/javascript'	src='js/plugins/forms/jquery.tagsinput.min.js'></script>
	<script type='text/javascript'	src='js/plugins/forms/autogrowtextarea.js'></script>
	<script type='text/javascript'	src='js/plugins/forms/jquery.maskedinput.min.js'></script>
	<script type='text/javascript'	src='js/plugins/forms/jquery.dualListBox.js'></script>
	<script type='text/javascript'	src='js/plugins/forms/jquery.inputlimiter.min.js'></script>
	<script type='text/javascript'	src='js/plugins/forms/chosen.jquery.min.js'></script>

	<script type='text/javascript'	src='js/plugins/wizard/jquery.form.js'></script>
	<script type='text/javascript'	src='js/plugins/wizard/jquery.validate.min.js'></script>
	<script type='text/javascript'	src='js/plugins/wizard/jquery.form.wizard.js'></script>

	<script type='text/javascript'	src='js/plugins/uploader/plupload.js'></script>
	<script type='text/javascript'	src='js/plugins/uploader/plupload.html5.js'></script>
	<script type='text/javascript'	src='js/plugins/uploader/plupload.html4.js'></script>
	<script type='text/javascript'	src='js/plugins/uploader/jquery.plupload.queue.js'></script>

	<script type='text/javascript'	src='js/plugins/tables/datatable.js'></script>
	<script type='text/javascript'	src='js/plugins/tables/tablesort.min.js'></script>
	<script type='text/javascript'	src='js/plugins/tables/resizable.min.js'></script>

	<script type='text/javascript'	src='js/plugins/ui/jquery.tipsy.js'></script>
	<script type='text/javascript'	src='js/plugins/ui/jquery.collapsible.min.js'></script>
	<script type='text/javascript'	src='js/plugins/ui/jquery.prettyPhoto.js'></script>
	<script type='text/javascript'	src='js/plugins/ui/jquery.progress.js'></script>
	<script type='text/javascript'	src='js/plugins/ui/jquery.timeentry.min.js'></script>
	<script type='text/javascript'	src='js/plugins/ui/jquery.colorpicker.js'></script>
	<script type='text/javascript'	src='js/plugins/ui/jquery.jgrowl.js'></script>
	<script type='text/javascript'	src='js/plugins/ui/jquery.breadcrumbs.js'></script>
	<script type='text/javascript'	src='js/plugins/ui/jquery.sourcerer.js'></script>

	<script type='text/javascript'	src='js/plugins/calendar.min.js'></script>
	<script type='text/javascript'	src='js/plugins/elfinder.min.js'></script>



	<script type='text/javascript' src='js/custom.js'></script>

	<script type='text/javascript' src='js/plugins/redactor/redactor.js'></script>
        <?php
        echo $this->Html->css('main');
        echo $this->Html->css('boxy');
        echo $this->Html->css('jquery-ui');
//        echo $this->Html->script(array(
//            'jquery.min',
//            'jquery-ui',
//            'jquery-ui.min',
//            'jquery.boxy',
//            'jquery.form',
//            'jquery.maskedinput',
//            'pekeUpload',
//            'custom'
//        ));
//        echo $this->Html->css(array(
//            'boletos',
//            'cake',
//            'datatable',
//            'elfinder',
//            'fullcalendar',
//            'home',
//            'milligram.min',
//            'normalize.min',
//            'prettyPhoto',
//            'redactor',
//            'reset',
//            'ui_custom'
//        ));
        ?>
    </head>