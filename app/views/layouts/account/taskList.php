<?php
    echo "<div class='blockTask'>";
    for ($i = 0, $task = $vars['taskList'][$page]; $i < 3; $i++):
        if(!$task[$i]) continue; ?>



    <?php endfor; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
    jQuery(function($) {
        if ($('#checkbox1').prop('checked')) {
            alert('Включен');
        }
    });
</script>