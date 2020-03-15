<?php
    unset($_COOKIE['admin']);
    setcookie('admin', 'login', time() - 3600, '/');
require_once 'app/views/layouts/main/index.php'
?>