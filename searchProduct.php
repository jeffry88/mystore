<?php
header("Content-Type: text/html;charset=utf-8");
$book = $_POST['book'];
include_once("conn/conn.php");
//$conn = mysqli_connect('localhost', 'root', '724993441', 'mystore');
require_once('page.class.php'); //分页类  
$showrow = 12; //一页显示的行数 
//$kind = 1;
$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']  
//$sql = "SELECT * FROM data_type";  
//$sql = "SELECT * FROM je_product";
$sql = "SELECT * FROM je_product  WHERE product_name like'%$book%'";
$total = mysqli_num_rows(mysqli_query($conn, $sql)); //记录总条数  
if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
//获取数据  
$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
$query = mysqli_query($conn, $sql);
//include 'headlink.php';
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">  
<link rel="stylesheet" href="css/templatemo-style.css">
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/common.css" />  
<link rel="stylesheet" type="text/css" href="css/show-product.css" /> 
<link rel="stylesheet" type="text/css" href="css/fontAwesome.css"/>
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
        <div id="product-header">
            <div class="search bar1"> 
                <form action="searchProduct.php" method="POST"> 
                    <input type="text" placeholder="搜索好书..." name="book" /> 
                    <button type="submit"></button> 
                </form> 
            </div> 
        </div>
        <div class="clear"></div>
    </div>
    <div class="main">
        <div class="searchdata">
            <?php
            while ($row = mysqli_fetch_assoc($query)) {
                //echo $row['product_name'];
                ?>
                <ul>
                    <li>
                        <div class="searchdata_img">
                            <a href="<?php echo"product.php?id=".$row['product_id']?>">
                            <img src="img/product/<?php echo $row['product_pic']; ?>" style="border: 0;height: 20%;">
                            </a>
                        </div>
                        <div class="itemdes">
                            <ul>
                                <li><a href="<?php echo"product.php?id=".$row['product_id']?>"><?php echo $row['product_name'] ?></a></li>
                                <li><?php echo $row['description'] ?></li>
                                <li><?php echo"¥ ".$row['price'] ?></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="clear"></div> 
            <?php } ?>
            
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
</div>