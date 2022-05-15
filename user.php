<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会员管理系统</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <span class="navbar-brand">
                <?php
                    require './dao/connect_db.php';

                    $sql = "select uname from user where id={$_COOKIE['id']}";
                    $result = $conn->query($sql);
                        
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row['uname'];
                    }

                    $conn->close();
                ?>
            </span>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./home.php">会员列表</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./user.php">个人中心</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./src/logout.php">退出</a>
                    </li>
                </ul>
            </div>
        </nav>

        <br>

        <form action="./src/change_username.php" method="POST">
            <h4>修改用户名</h4>
            <div class="form-group">
                <label>新用户名：</label>
                <input class="form-control" name="uname">
            </div>
            <button type="submit" class="btn btn-primary">修改</button>
        </form>

        <br>
        <br>

        <form action="./src/change_pwd.php" method="POST">
            <h4>修改新密码</h4>
            <div class="form-group">
                <label>原密码：</label>
                <input type="password" class="form-control" name="pwd">
            </div>
            <div class="form-group">
                <label>新密码：</label>
                <input type="password" class="form-control" name="npwd">
            </div>
            <div class="form-group">
                <label>确认密码：</label>
                <input type="password" class="form-control" name="cnpwd">
            </div>
            <button type="submit" class="btn btn-primary">修改</button>
        </form>

      </div>
</body>
</html>
