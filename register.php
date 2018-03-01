<?php
//session_start();
include 'conn/conn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>会员注册</title>
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
        <div class="top-login">
            <img src="img/user03.png"/>
            <h1>注册</h1>
        </div>
            
            <div class="login-top">
                <form action="registeraction.php" method="post">
                    <div class="username">
                        <p>请输入用户名</p>
                    </div>
                    <div class="login-ic">                      
                        <i ></i>
                        <input type="text"  value="用户名" id="username" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'User name';
                                    }"/>
                        <div class="clear"> </div>
                    </div>
                    <div class="useremail">
                        <p>邮箱</p>
                    </div>
                    <div class="login-ic">                      
                        <i class="email"></i>
                        <input type="text"  value="example@gmail.com" id="email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'User name';
                                    }"/>
                        <div class="clear"> </div>
                    </div>
                        <div class="userpsw1">
                            <p>请输入密码</p>  
                    </div>
                    <div class="login-ic">
                        <i class="icon"></i>
                        <input type="password"  value="123456" id="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'password';
                                    }"/>
                        <div class="clear"> </div>
                    </div>
                    <div class="userpsw2">
                            <p>请再次输入密码</p>  
                    </div>
                    <div class="login-ic">
                        <i class="icon"></i>
                        <input type="password"  value="123456" id="re_password" name="re_password" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'password';
                                    }"/>
                        <div class="clear"> </div>
                    </div>
                    <div class="log-bwn">
                        <input type="submit"  value="注册" >
                    </div>
                </form>
                 <div style="font-size: 15px;color: white;">
         <?php
            //echo $row['name'];
                                $err=isset($_GET["err"])?$_GET["err"]:"";
                                switch($err) {
                                    case 1:
                                    echo "用户名已存在！";
                                    break;
                                    case 2:
                                    echo "密码与重复密码不一致！";
                                    break;
                                    case 3:
                                    echo "注册成功！";?>
                                        <a href="login.php">请登入</a>
                                        <?php
                                    break;
                                }
                            ?>
        </div>
            </div>
            <p class="copy">© 2016 All rights reserved | Design by jeffry</p>
        </div>		
        <!--header start here-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<!--<script src="js/vendor/jquery-1.11.0.min.js" type="text/javascript"></script>-->
        <script src="js/vendor/bootstrap.min.js"></script>
       
    </body>
</html>
