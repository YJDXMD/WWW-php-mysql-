<?php
    require 'dao/functions.php';
    
    if (!isset($_COOKIE['id'])) {
        href('./index.php');
        return;
    }
    
    require 'dao/connect_db.php';

    $uid = $_COOKIE['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会员管理系统</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        body {
            padding: 20x;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body>
    
    <div class="container table-responsive text-center shadow-lg">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- <span class="navbar-brand">
                <?php 
                   $sql = "select uname from user where id=$uid";
                   $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row['uname'];
                    }
                    else {
                        echo "获取用户名失败";
                    }
                ?>
            </span> -->
            
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./home.php">会员列表</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user.php">个人中心</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./src/logout.php">退出</a>
                    </li>
                </ul>
                <form class="form-inline" action="" method="POST">
                    <input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search" name="search">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">搜索</button>
                </form>
            </div>
        </nav>

        <table class="table table-hover" border="1">
            <thead class="thead-light">
                <tr>
                    <th>会员号</th>
                    <th>姓名</th>
                    <th>年龄</th>
                    <th>性别</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT id, sid, name, age, sex FROM member where uid=$uid";
                    
                    if (isset($_POST['search'])) {
                        $s = $_POST['search'];
                        $sql = "$sql and (sid='$s' or name like '%$s%' or age='$s' or sex='$s')";
                    }

                    $result = $conn->query($sql);
                     
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {

                            $id = $row['id'];
                            $sid = $row['sid'];
                            $name = $row['name'];
                            $age = $row['age'];
                            $sex = $row['sex'];

                            echo "
                                <tr>
                                    <td>$sid</td>
                                    <td>$name</td>
                                    <td>$age</td>
                                    <td>$sex</td>
                                    <td>
                                        <button
                                            type=\"button\"
                                            class=\"btn btn-primary\"
                                            onclick=\"location.href='./edit.php?id=$id&sid=$sid&name=$name&age=$age&sex=$sex'\"
                                            >
                                            编辑
                                        </button>
                                        <button
                                            type=\"button\"
                                            class=\"btn btn-danger\"
                                            onclick=\"location.href='./src/delete.php?id=$id'\"
                                            >
                                            删除
                                        </button>
                                    </td>
                                </tr>
                            ";
                        }
                    }
                    else {
                        echo "<tr><td colspan='5'></td></tr>";
                    }

                    $conn->close();
                ?>
                <tr>
                    <form action="./src/add.php" method="POST">
                        <td>
                            <input class="form-control" name="sid">
                        </td>
                        <td>
                            <input class="form-control" name="name">
                        </td>
                        <td>
                            <input class="form-control" name="age">
                        </td>
                        <td>
                            <select class="form-control" name="sex">
                                <option value="女"></option>
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success">添加新会员</button>
                        </td>
                    </form>
                </tr>

            </tbody>
        </table>
    </div>
</body>
</html>