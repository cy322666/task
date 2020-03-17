<?php var_dump($view); ?>
<nav aria-label="...">
    <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link" tabindex="-1" aria-disabled="true">Всего : <?php echo $vars['countTask']; ?></a>
        </li>
        <?php
        for ($i = 0, $j = 1; $i < $vars['countPage']; $i++, $j++) {
                if($j == $vars['page']) {
                    echo "<li class='page-item active'><a class='page-link' href=".$view->path."/?page=".$j."'>".$j."</a></li>";
                    continue;
                } else echo "<li class='page-item'><a class='page-link' href=".$view->path."/?page=".$j."'>".$j."</a></li>";
        }
        ?>
    </ul>
</nav>