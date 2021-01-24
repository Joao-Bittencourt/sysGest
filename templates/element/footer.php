<?php
echo $this->Html->script([
    'jquery.min',
    'popper.min',
    'bootstrap.min',
    'main',
//    'Chart.bundle.min',
    'dashboard',
//    'widgets',
//    'jquery.vmap.min',
    'jquery.vmap.sampledata',
    'jquery.vmap.world'
]);
?>

<script>
    (function ($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>

