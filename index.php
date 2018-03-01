<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD (2777421) - 用户界面基本完成管理员及下单和购物车功能有待继
=======
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
>>>>>>> 56f55e2147c327927489136152f50f23da6a4d32
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        <link rel="stylesheet" href="css/lightbox.css">
        <link rel="stylesheet" href="css/normalize.css" />
        <link rel="stylesheet" href="css/app.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
<<<<<<< HEAD (2777421) - 用户界面基本完成管理员及下单和购物车功能有待继

        <?php
         //session_start();
        //$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
        //$_SESSION['name'] = $username;
        if (isset($_SESSION['username'])) {
            //echo $_SESSION['username'];
            include 'loginhead.php';
        } else {
            
            include 'header.php';
        }
       // echo $_SESSION['username'];
        ?>
=======
        <?php include 'header.php'; ?>
>>>>>>> 56f55e2147c327927489136152f50f23da6a4d32
        <?php include 'turnover.php'; ?>
        <?php include 'main.php'; ?>
        <?php include 'footer.php'; ?>
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <!--<script src="js/vendor/jquery-1.11.0.min.js" type="text/javascript"></script>-->
        <script type="text/javascript" src="js/vendor/xSlider.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
<<<<<<< HEAD (2777421) - 用户界面基本完成管理员及下单和购物车功能有待继
=======

        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>-->
>>>>>>> 56f55e2147c327927489136152f50f23da6a4d32
        <script type="text/javascript">
            $(document).ready(function () {
                $(window).scroll(function () {
                    if ($(window).scrollTop() > 100) {
<<<<<<< HEAD (2777421) - 用户界面基本完成管理员及下单和购物车功能有待继
                       // var box = document.getElementById("box");
                        //var a = box.getElementsByTagName("a");
                        var aImgs = $('#box img');
                        
                        console.log(aImgs.length);
                        for (var i = 0; i < aImgs.length; i++) {
                            $(aImgs[i]).addClass("on");
=======
                        var box = document.getElementById("box");
                        var aImgs = box.getElementsByTagName("img");
                        for (var i = 0; i < aImgs.length; i++) {
                            aImgs[i].className = "on";
>>>>>>> 56f55e2147c327927489136152f50f23da6a4d32
                        }
                    }
                });
            });
            /* $(window).scroll(function () {//为了保证兼容性，这里取两个值，哪个有值取哪一个
             var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
             alert(scrollTOP);
             if (scrollTop > 100) {
             var box = document.getElementById("box");
             var aImgs = box.getElementsByTagName("img");
             window.onload = function () {
             for (var i = 0; i < aImgs.length; i++) {
             aImgs[i].className = "on";
             }
             
             }
             }
             //scrollTop就是触发滚轮事件时滚轮的高度
             });*/
        </script>
    </body>
</html>
