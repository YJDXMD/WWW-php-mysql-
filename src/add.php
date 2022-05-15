<?php
  require '../dao/functions.php';
  
  $uid = $_COOKIE['id'];
  $sid = $_POST['sid'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $sex = $_POST['sex'];
  
  if ($sid == '' || $name == '' || $age == '') {
    alert('数据不能为空');
    href('../home.php');
    return;
  }

  require '../dao/connect_db.php';

  $sql = "INSERT INTO member (sid, name, age, sex, uid) VALUES ($sid, '$name', $age, '$sex', $uid)";

  if ($conn->query($sql) === TRUE) {
      href('../home.php');
  }
  else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>  