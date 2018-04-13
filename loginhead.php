<?php
//session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>jeffry的小店</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/hero-slider.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/normalize.css" />
    <!--<link rel="stylesheet" href="css/demo.css">-->
    <link rel="stylesheet" href="css/app.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

</head>
<div class="header">
    <div class="container">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Jeffry</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand scroll-top"><em>J</em>store</a>
            </div>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php" >主页</a></li>
                    <li><a href="fiction_book.php">小说</a></li>
                    <li><a href="humanities.php" >人文社科</a></li>
                    <li><a href="art.php" >文艺</a></li>
                    <li><a href="children.php">儿童读物</a></li>
                </ul>
                <div id="main-sub-nav" style="position: relative;left:100px;">
                    <ul class="nav navbar-nav" style="position: relative; left: 190px;">
                        <li style="margin-left: 25px;"><a href="cart.php" ><span class="glyphicon glyphicon-shopping-cart">购物车</span></a></li>
                        <li>
                        <div class="drop-menu">
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
                        </li>
                    </ul>
                </div>


            </div>
            <!--/.navbar-collapse-->
        </nav>
        <!--/.navbar-->
        <!-- user -->

    </div>
    <!--/.container-->
</div>
<!--/.header-->




