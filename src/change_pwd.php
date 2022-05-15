<?php
    require '../dao/functions.php';

    $pwd = $_POST['pwd'];
    $npwd = $_POST['npwd'];
    $cnpwd = $_POST['cnpwd'];

    if ($npwd != $cnpwd) {
        alert('两次密码不一致，请重输');
        href('../user.php');
    }

    require '../dao/connect_db.php';

    $sql = "SELECT * FROM user where id={$_COOKIE['id']} and pwd=$pwd";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $sql = "update user set pwd='$npwd' where pwd='$pwd' and id= {$_COOKIE['id']}";
    
        if ($conn->query($sql) === TRUE) {
            alert('修改成功');
            href("../user.php");
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {
        alert('原密码不正确。');
        href("../user.php");
    }

    $conn->close();

?>