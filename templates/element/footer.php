<?php
echo $this->Html->script([
//    'jquery.3.2.1.min',
    'bootstrap.min',
    'popper.min',
    'solid',
    'fontawesome'
    
]);
?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>