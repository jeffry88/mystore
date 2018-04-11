<?php
//session_start();
include 'conn/conn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>登入</title>
        <!-- Custom Theme files -->
        <link href="css/loginstyle.css" rel="stylesheet" type="text/css" media="all"/>
        <!-- Custom Theme files -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="keywords" content="" />

    </head>
    <body>
        <!--header start here-->
        <div style="margin: 210px 0px 0px;">
            <div class="top-login" style="margin-top: -34px;">
                <img src="img/user03.png"/>
                <h1 style="font-size: 20px">管理员登入</h1>
            </div>

            <div class="login-top">
                <form action="loginaction.php" method="post">
                    <div class="username">
                        <p>用户名</p>
                    </div>
                    <div class="login-ic">                      
                        <i ></i>
                        <input type="text"  value="用户名" id="username" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'User name';
                                }"/>
                        <div class="clear"> </div>
                    </div>
                    <div class="userpsw1">
                        <p>密码</p>  
                    </div>
                    <div class="login-ic">
                        <i class="icon"></i>
                        <input type="password"  value="123456" id="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'password';
                                }"/>
                        <div class="clear"> </div>
                    </div>
                    <div class="clear"> </div>
                    <div class="log-bwn">
                        <input type="submit"  value="登入" >
                    </div>
                </form>
                <div style="font-size: 15px;color: white;">
                    <?php
                    // echo "用户名或密码错误！";
                     
                    //echo $row['name'];
                    $err=isset($_GET["err"])?$_GET["err"]:"";
                    //echo $err;
                    if ($err == 1) {
                        echo "用户名或密码错误！";
                    }
                    ?>
                </div>
            </div>
            <p class="copy">© 2016 All rights reserved | Design by jeffry</p>
        </div>		
        <!--header start here-->
        <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
<!--<script src="js/vendor/jquery-1.11.0.min.js" type="text/javascript"></script>-->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
