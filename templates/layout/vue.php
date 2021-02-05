<?php
$this->layout = 'vue';
?>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<div id="app">
  {{ message }}
</div>

<?= $this->fetch('content'); ?>