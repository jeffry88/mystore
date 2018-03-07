<?php
session_start(86400);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">        
        <link rel="stylesheet" href="css/templatemo-style.css">
        <link rel="stylesheet" href="css/style.css">  
    </head>
    <body>
        <div style="height: 500px;">
            <div style="    border: 2px solid #efb5c3;width: 50%;position: relative;top: 145px;left: 354px;height: 203px;">
                <div style="float: left;position: relative;border-right:2px solid #efb5c3; height: 200px;">
                    <h2 style="position: relative;top: 60px;">商品添加入购物车成功！</h2>
                </div>
                <div style="float:left;position: relative;left: 97px;top:82px;">
                    <a style="margin-right:48px; " href="cart.php">进入购物车结算</a>
                    <a href="index.php">返回首页</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>