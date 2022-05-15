<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!--     -->
    <title>会员管理系统</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
         body {
            padding: 20px 400px;
            color: #17a2b8;
        }

        button {
            margin: 10px;
        }
        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 2px;
            cursor: pointer;
}

.button2 {
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
    font-size: 16px;
    
}
    </style>
</head>
<body>
    <div class="container">
        <h1 style="color:black ">注册</h1>
        <p></p><p></p>
        <form action="" method="POST">
          <div class="form-group">
            <label>用户名：</label>
            <input class="form-control" name="uname">
          </div>
          <div class="form-group">
            <label>密码：</label>
            <input type="password" class="form-control" name="pwd">
          </div>
          <div class="form-group">
            <label>确认密码：</label>
            <input type="password" class="form-control" name="cpwd">
          </div>
          <button type="submit" class="button button2 col">注册</button>
        </form>
      </div>
</body>
</html>

<?php
  require './dao/functions.php';

  if (empty($_POST)) {
    return;
  }

  if ($_POST['uname'] == '' || $_POST['pwd'] == '' || $_POST['cpwd'] == '') {
    alert('信息未完善');
    return;
  }

  if ($_POST['pwd'] != $_POST['cpwd']) {
    alert('密码不一致');
    return;
  }

  require './dao/connect_db.php';

  $uname = $_POST['uname'];
  $pwd = $_POST['pwd'];

  $sql = "INSERT INTO user (uname, pwd) VALUES ('$uname', '$pwd')";
  
  if ($conn->query($sql) === TRUE) {
      alert('注册成功');
      href('./index.php');
  }
  else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
 
  $conn->close();
?>