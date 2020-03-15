<?php require 'app/views/default.php'; ?>

    <div class="card w-75">
        <div class="card-body">
            <h5 class="card-title">Внимание</h5>
            <p class="card-text"><?php echo $vars['label']; ?></p>
            <a href="admin" class="btn btn-primary"><?php echo $vars['button']; ?></a>
        </div>
    </div>

<?php require 'app/views/footer.php'; ?>