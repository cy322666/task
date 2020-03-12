<?php
    if($title == 'Ошибка') {
        require 'application/views/header.php';
        ?>

    <div class="card w-75">
        <div class="card-body">
            <h5 class="card-title">Внимание</h5>
            <p class="card-text"><?php echo $vars['label']; ?></p>
            <a href="login" class="btn btn-primary"><?php echo $vars['button']; ?></a>
        </div>
    </div>

<?php
    } else {
        setcookie('admin', 'login', 0, '/');
        require_once 'application/views/layouts/account/admin.php';
    }
?>
