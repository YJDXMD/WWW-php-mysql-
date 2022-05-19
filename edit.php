<?php
  if (count($_GET) > 0) {
    $id = $_GET['id'];
    $sid = $_GET['sid'];
    $name = $_GET['name'];
    $age = $_GET['age'];
    $sex = $_GET['sex'];
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会员注册管理系统</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
  <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./home.php">会员列表</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./user.php">个人中心</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./src/logout.php">退出</a>
                </li>
            </ul>
        </div>
      </nav>
      <h1>修改信息</h1>
      <form action="" method="POST">
        <input style="display: none;" name="id" value="<?php echo $id ?>">

        <div class="form-group">
          <label>会员号：</label>
          <input class="form-control" name="sid" type="number" value="<?php echo $sid ?>">
        </div>

        <div class="form-group">
          <label>姓名：</label>
          <input class="form-control" name="name" value="<?php echo $name ?>">
        </div>

        <div class="form-group">
          <label>年龄：</label>
          <input type="number" class="form-control" name="age" value="<?php echo $age ?>">
        </div>

        <div class="form-group">
          <label>性别：</label>
          <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sex" value="男" <?php if ($sex == '男') echo "checked" ?>>
            <label class="form-check-label">男</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sex" value="女" <?php if ($sex == '女') echo "checked" ?>>
            <label class="form-check-label">女</label>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">修改</button>
      </form>
    </div>
</body>
</html>
<?php
    if (count($_POST) == 0) {
      return;
    }  

    require './dao/connect_db.php';

    $id = $_POST['id'];
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
  
    $conn->query("update member set sid=$sid, name='$name', age=$age, sex='$sex' where id=$id");
    $conn->close();

    require './dao/functions.php';
    
    alert('修改成功');
    href('./home.php');
?>