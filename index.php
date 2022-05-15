<?php
    require './dao/functions.php';

    if (isset($_COOKIE['id'])) {
        href('./home.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
        .title {
            font-size:48px;
            padding: 50px;
            color: #343a40;
            margin-bottom: 20px;
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
.button3 { 
    background-color: white; 
    color: black; 
    border:1px solid #f44336;
}

    </style>
</head>

<body>
<div class="container1">
      <div class="col text-center title">会员管理系统</div>

      <form action="" method="POST">
        <div class="form-group">
          <label>用户：</label>
          <input class="form-control" name="uname">
        </div>
        <div class="form-group">
          <label>密码：</label>
          <input type="password" class="form-control" name="pwd">
        </div>
        <button type="submit" class="button button1 col" >登录</button>
      </form>
      没有账号？<button class="button button2 col" onclick="location.href='./register.php'">注册</button>
  
    </div>

</body>
</html>

<?php
require './dao/connect_db.php';
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$sql = "SELECT id FROM user where uname='$uname' and pwd='$pwd'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    setcookie("id", $id, time() + 86400);
    
    href('./home.php');
}
else {
    // echo "请输入正确的账号或密码.[$uname $pwd]";
    // alert('请输入正确的账号或密码');
}

$conn->close();

?>