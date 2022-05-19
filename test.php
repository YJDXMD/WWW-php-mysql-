<?php
    require './dao/functions.php';

    if (isset($_COOKIE['id'])) {
        href('./home.php');
    }

require './dao/connect_db.php';
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$sql = "select id from user where uname='$uname' and pwd='$pwd'";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $id = $row['id'];
    setcookie("id", $id, time() + 86400);
    href('./home.php');
  
}else{  
    echo'<h1 align="center"> </h1><br>';
    echo'<h1 align="center"> </h1><br>';
    echo'<h1 align="center"> </h1><br>';
    echo'<h1 align="center"> </h1><br>';
    echo'<h1 align="center"> </h1><br>';
    echo'<h1 align="center">登录失败</h1>';
    //echo"$sql";
}

$conn->close();

?>