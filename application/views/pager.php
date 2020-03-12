<?php
    $path = Router::getURI();
    $page = Router::getpage();

    echo $path; ?>

<nav aria-label="...">
    <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link" tabindex="-1" aria-disabled="true">Всего : <?php echo $vars['taskList'][1]['countTask']; ?></a>
        </li>
        <?php
        foreach ($vars['taskList'] as $value) {
                if($page['page'] == $value['label']) {
                    echo "<li class='page-item active'><a class='page-link' href='/".$path."/activePage=".$page['page']."'>".$value['label']."</a></li>";
                    continue;
                } else echo "<li class='page-item'><a class='page-link' href='/".$path."/activePage=".$page['page']."'>".$value['label']."</a></li>";
        }
        ?>
    </ul>
</nav>