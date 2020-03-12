<?php
    unset($_COOKIE['admin']);
    setcookie('admin', 'login', time() - 3600, '/');
    require_once 'application/views/layouts/main/index.php'
?>