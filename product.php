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
        <?php
        header("Content-Type: text/html;charset=utf-8");
        include_once("conn/conn.php");
        $product_id = $_GET['id'];
        session_start();
        //echo $product_id;
        $sql_product = "select * from je_product where product_id = '$product_id'";
        $res = mysqli_query($conn, $sql_product);
        $row = mysqli_fetch_array($res);
        ?>
        <div class="container">

            <div class="heade">
                <div>
                    <a href="index.php" class="navbar-brand"><em>J</em>store</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li><a href="index.php" >主页</a></li>
                        <li><a href="fiction_book.php">小说</a></li>
                        <li><a href="humanities.php" >人文社科</a></li>
                        <li><a href="art.php" >文艺</a></li>
                        <li><a href="children.php">儿童读物</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <!--header end-->
            <div style="height: 710px;">
                <div class="main">
                    <div class="product_img">
                        <img src="img/product/<?php echo $row['product_pic'] ?>">
                    </div>
                    <div class="product_description">
                        <h2>书名：<?php echo $row['product_name'] ?></h2>
                        <div style="position: relative;top: 43px;">
                            <p><?php echo $row['description'] ?></p>
                        </div>
                        <div class="product_pri">
                            <p>特价促销：<?php echo $row['price'] ?>&nbsp;元</p>
                        </div>
                        <div class="buy_box_button">
                            <a href="cart.php" class="btn btn_red">加入购物车</a> 
                            <a href="buy.php" class="buy_now_btn btn_b_red">立即购买</a>
                            <div class="clear"></div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>
