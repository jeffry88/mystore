<?php
header("Content-type:text/html;charset=utf-8");
session_start();
ini_set('session.save_path', '/php_sessions/');
//6个钟头
ini_set('session.gc_maxlifetime', 21600);
include_once("conn/conn.php");
$username = $_SESSION['username'];
//echo $username;
$sql = "select * from je_user where user_name = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_array();
//print_r($row);
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">  
<link rel="stylesheet" href="css/templatemo-style.css">
<link rel="stylesheet" href="css/style.css"/>
<div class="container">
    <div class="heade">
        <div>
            <a href="index.php" class="navbar-brand"><em>J</em>store</a>
            <ul class="nav navbar-nav">
                <li><a href="index.php" >主页</a></li>
                <li><a href="fiction_book.php">小说</a></li>
                <li><a href="humanities.php" >人文社科</a></li>
                <li><a href="art.php" >文艺</a></li>
                <li><a href="children.php">儿童读物</a></li>
            </ul>
            <div class="drop-menu"style="float:right;margin-top: 23px;">
                <div class="hover-btn">
                    <img style="height:40px;" src="img/frog.png"/>
                </div>
                <div class="drop-content">
                    <ul>
                        <li>您好<?php echo $_SESSION['username'] ?></li>
                        <li><a href="usermsg.php">个人信息</a></li>
                        <li><a href="myorder.php">我的订单</a></li>
                        <li><a href="logout.php">退出登录</a></li>
                    </ul>
                </div> 
            </div>
            <div class="clear"></div>
        </div>


        <div class="clear"></div>
    </div>
    <div class="user-info">
        <img src="img/user04.png">
        <ul>
            <li>用户名：<?php echo $row['user_name']?></li>
            <li>性别：<?php echo $row['sex']?></li>
            <li>邮箱：<?php echo $row['email']?></li>
            <li>余额：<?php echo $row['money']?></li>
        </ul>
    </div>
</div>
