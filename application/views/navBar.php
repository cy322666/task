<?php
    $path = Router::getURI();
    $login = Model::checkAdmin();
    ?>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="<?php $path ?>create">Создать задачу</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Сортировать</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php $path ?>sort?value=name&sort=up">Имя ></a>
            <a class="dropdown-item" href="<?php $path ?>sort?value=email&sort=up">Почта > </a>
            <a class="dropdown-item" href="<?php $path ?>sort?value=status&sort=up">Статус > </a>
            <a class="dropdown-item" href="<?php $path ?>sort?value=name&sort=down">Имя < </a>
            <a class="dropdown-item" href="<?php $path ?>sort?value=email&sort=down">Почта < </a>
            <a class="dropdown-item" href="<?php $path ?>sort?value=status&sort=down">Статус < </a>
            <div class="dropdown-divider">dropdown-divider</div>
        </div>
    </li>
    <!-- если вошли, то кнопка выйти-->
    <li class="nav-item">
        <?php if($login != true) {
            echo "<a class='nav-link' href='account/login'>Войти</a>";
        } else {
            echo "<a class='nav-link' href='account/exit'>Выйти</a>";
        } ?>
    </li>
</ul>