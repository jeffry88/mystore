<?php
/**
 * 在进入时先判断session中用户是否已经登录已经登录则直接进入
 * 管理员后台，否则重定向到登录界面
 */
session_start();
if(empty($_SESSION['username'])){
    header("Location:login.php");
}
//include 'page.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Iconos -->
        <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
        <link rel="stylesheet" href="css/leftnav.css" media="screen" type="text/css"/>
        <link rel="stylesheet" href="css/admin.css" type="text/css"/>
        <link rel="stylesheet" href="css/common.css" type="text/css"/>
        <link rel="stylesheet" href="layui/css/layui.css">

    </head>
    <body>
        <div>
            <div class="header">
                <?php include 'header.php'; ?>
            </div>
            <div class="sidebar">
                <?php include 'sidebar.php'; ?>
            </div>
            <div class="product">
                
                <?php include'main.php'; ?>
            </div>
            <div class="clear"></div>
        </div>
        <script src="js/jquery.js"></script>
        <script src='js/leftnav.js'></script>
        <script src="layui/layui.js"></script>
        <script src="js/product.js"></script>
        <script src="js/user.js"></script>
    </body>
</html>
