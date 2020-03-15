<?php
    echo "<div class='blockTask'>";
    if($_GET['activePage']) {
        $page = $_GET['activePage'];
    } else {
        $page = 1;
    }
    for ($i = 0, $task = $vars['taskList'][$page]; $i < 3; $i++):
        if(!$task[$i]) {
            continue;
        } ?>

    <div class="list-group">
        <a href="" class="list-group-item list-group-item-action flex-column align-items-start <?php echo $task[$i]['status']; ?>">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?php echo $task[$i]['name']; ?></h5>
                <small><?php echo $task[$i]['status']; ?></small>
            </div>
            <p class="mb-1"><?php echo $task[$i]['text']; ?></p>
            <small><?php echo $task[$i]['email']; ?></small>
        </a>
    </div>

<?php endfor; ?>
</div>
