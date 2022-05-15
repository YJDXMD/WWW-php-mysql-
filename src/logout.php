<?php
    require '../dao/functions.php';

    setcookie("id", "", time() - 1, '/');
    alert('退出成功');
    href('../index.php')
?>