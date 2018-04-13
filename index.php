<?php 
session_start();
ini_set('session.save_path','/php_sessions/');
//6个钟头
ini_set('session.gc_maxlifetime',21600);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
        <meta name="viewport" content="width=device-width, user-scalabel=no">
        <link rel="icon" href="favicon.ico">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
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

        <?php
         //session_start();
         include 'conn/conn.php';
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
        //$username = $_SESSION['username'];
        $sql = "select user_name from je_user where user_name = '$username'";
        $result = $conn->query($sql);
        $row = $result->fetch_array();
        $sql1 = "select email from je_user where email = '$username'";
        $request1 = $conn->query($sql1);
        $row1 = $result->fetch_array();
        //$row = $result->fetch_array();
        if (!empty($row)||!empty($row1)) {
            //echo $_SESSION['username'];
            include 'loginhead.php';
        } else {
            
            include 'header.php';
        }
       // echo $_SESSION['username'];
        ?>
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
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>-->
        <script type="text/javascript">
            $(document).ready(function () {
                $(window).scroll(function () {
                    if ($(window).scrollTop() > 100) {
                       // var box = document.getElementById("box");
                        //var a = box.getElementsByTagName("a");
                        var aImgs = $('#box img');                       
                        console.log(aImgs.length);
                        for (var i = 0; i < aImgs.length; i++) {
                            $(aImgs[i]).addClass("on");
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
