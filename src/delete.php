<?php
    $id = $_GET['id'];

    require '../dao/connect_db.php';

    $conn->query("DELETE FROM member WHERE id=$id");
    
    $conn->close();

    require '../dao/functions.php';

    href('../home.php');
?>