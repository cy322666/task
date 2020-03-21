<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="create">Создать задачу</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Сортировать</a>
        <div class="dropdown-menu">
            <a class="nav-link disabled" tabindex="-1" aria-disabled="true">По возрастанию</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php $path ?>sort?value=name&sort=up">Имя</a>
            <a class="dropdown-item" href="<?php $path ?>sort?value=email&sort=up">Почта</a>
            <a class="dropdown-item" href="<?php $path ?>sort?value=status&sort=up">Статус</a>
            <a class="nav-link disabled" tabindex="-1" aria-disabled="true">По убыванию</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php $path ?>sort?value=name&sort=down">Имя</a>
            <a class="dropdown-item" href="<?php $path ?>sort?value=email&sort=down">Почта</a>
            <a class="dropdown-item" href="<?php $path ?>sort?value=status&sort=down">Статус</a>
        </div>
    </li>
    <li class="nav-item">
        <?php
            if($_SESSION['admin']) {
                echo "<a class='nav-link' href='account/'>Вход</a>";
            } else echo "<a class='nav-link' href='account/'>Выход</a>";
        ?>
    </li>
</ul>