<?php
$kind = 5;
include 'page.php';
?>
<html>
    <head>
        <title>经管</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/common.css" />  
        <link rel="stylesheet" type="text/css" href="css/show-product.css" /> 
        <link rel="stylesheet" href="css/templatemo-style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/fontAwesome.css"/>
    </head>
    <body>
        <?php include 'manage_sidebar.php'; ?>
        <?php include 'product_header.php'; ?>
        <div class="demo">  
            <div class="showData">  

                <ul class="dates">  
                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>   
                        <li>
                            <div style="">
                                <a href="<?php echo"product.php?id=".$row['product_id']?>"><img src="img/product/<?php echo $row['product_pic'] ?>" ></a>
                                <p>
                                    <a href="<?php echo"product.php?id=".$row['product_id']?>"><?php echo $row['product_name'] ?></a>
                                </p>
                                <p class="price">¥ <?php echo $row['price'] ?></p>
                            </div>

                        </li>  
                    <?php } ?>  
                </ul>  
                <!--显示数据区-->  
            </div>  
            <div class="showPage">  
                <?php
                if ($total > $showrow) {//总记录数大于每页显示数，显示分页  
                    $page = new page($total, $showrow, $curpage, $url, 2);
                    echo $page->myde_write();
                }
                ?>  
            </div>  
        </div> 
        <?php include 'footer.php'; ?>
        <script src="js/vendor/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="js/vendor/bootstrap.js" type="text/javascript"></script>
        <script src="js/vendor/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
