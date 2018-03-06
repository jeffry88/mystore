<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">        
        <link rel="stylesheet" href="css/templatemo-style.css">
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
            <div class="header">

            </div>
            <!--header end-->
            <div class="product_img">
                <img src="img/product/<?php echo $row['product_pic']?>">
            </div>
            <div class="product_description">

            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>