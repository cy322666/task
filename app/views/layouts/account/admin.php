<?php
    include_once 'app/views/navbar.php';
        echo "<class='blockTask'>";
        for ($i = 0, $task = $vars['task']; $i != 3; $i++):
            if(!$task[$i]) continue; ?>
            <div class="list-group">
                <a href="edit?id=<?php echo $task[$i]['id'] ?>" class="list-group-item list-group-item-action flex-column align-items-start <?php echo $task[$i]['status']; ?>">
                    <!--<a href="" class="list-group-item list-group-item-action flex-column align-items-start ?>">//ТУТ ССЫЛКА НА ФОРМУ РЕДАКТИРОВАНИЯ ТЕКСТА..или ФОРМА ПОЯВЛЯЕТСЯ //тут текст редактировать-->
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $task[$i]['name']; ?></h5>
                        <small><?php echo $task[$i]['status']; ?></small>
                    </div>
                    <p class="mb-1"><?php echo $task[$i]['text']; ?></p>

                    <small><?php echo $task[$i]['email']; ?></small>
                </a>
            </div>
<?php endfor; ?>
<?php include_once 'app/views/pager.php'; ?>