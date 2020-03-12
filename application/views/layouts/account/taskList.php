<?php
    echo "<div class='blockTask'>";
    if($_GET['activePage']) {
        $page = $_GET['activePage'];
    } else {
        $page = 1;
    }
    for ($i = 0, $task = $vars['taskList'][$page]; $i < 3; $i++):
        if(!$task[$i]) continue; ?>

    <div class="list-group">
        <a href="edit?id=<?php echo $task[$i]['id'] ?>" class="list-group-item list-group-item-action flex-column align-items-start <?php echo $task[$i]['status']; ?>">
            <!--<a href="" class="list-group-item list-group-item-action flex-column align-items-start ?>">//ТУТ ССЫЛКА НА ФОРМУ РЕДАКТИРОВАНИЯ ТЕКСТА..или ФОРМА ПОЯВЛЯЕТСЯ //тут текст редактировать-->
            <div class="form-check">

                <?php if($task[$i]['status'] == 'active') {
                    echo " 
                        <input class='form-check-input' type='checkbox' id='checkbox1'>
                        <label class='form-check-label' for='defaultCheck1'>Выполнить</label>";
                } else {
                    echo "
                        <input class='form-check-input' type='checkbox' id='checkbox2' disabled>
                        <label class='form-check-label' for='defaultCheck2'>Выполнено</label>";
                } ?>

            </div>
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?php echo $task[$i]['name']; ?></h5>
                <small><?php echo $task[$i]['status']; ?></small>
            </div>
            <p class="mb-1"><?php echo $task[$i]['text']; ?></p>

            <small><?php echo $task[$i]['email']; ?></small>
        </a>
    </div>

    <?php endfor; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
    jQuery(function($) {
        if ($('#checkbox1').prop('checked')) {
            alert('Включен');
        }
    });
</script>