<?php
header("Content-type:text/html;charset=utf-8");
session_start();
ini_set('session.save_path', '/php_sessions/');
//6个钟头
ini_set('session.gc_maxlifetime', 21600);
include 'conn/conn.php';
require_once('page.class.php'); //分页类  
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$showrow = 4; //一页显示的行数 
$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
$sql1 = "select order_id,user_name,consignee,phone,address,price_total from je_order where user_name = '$username'";
$total = mysqli_num_rows(mysqli_query($conn, $sql1)); //记录总条数  
if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
//获取数据  
$sql1 .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
$query1 = mysqli_query($conn, $sql1);
//获取订单详情
$sql = "select je_order.order_id,product_name,price,product_qty,consignee,phone,address,price_total from je_order
             inner join je_order_detail on je_order.order_id=je_order_detail.order_id where user_name = '$username' order by order_id";
$query = mysqli_query($conn, $sql);
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">  
<link rel="stylesheet" href="css/templatemo-style.css">
<link rel="stylesheet" href="css/style.css"/>
<div class="container">
    <div class="heade">
        <div>
            <a href="index.php" class="navbar-brand"><em>J</em>store</a>
            <ul class="nav navbar-nav">
                <li><a href="index.php" >主页</a></li>
                <li><a href="fiction_book.php">小说</a></li>
                <li><a href="humanities.php" >人文社科</a></li>
                <li><a href="art.php" >文艺</a></li>
                <li><a href="children.php">儿童读物</a></li>
            </ul>
            <div class="drop-menu"style="float:right;margin-top: 23px;">
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
            <div class="clear"></div>
        </div>


        <div class="clear"></div>
    </div>
    <div style="margin-left: 126px;margin-top: 40px;line-height: 35px;">
        <?php while ($row = mysqli_fetch_assoc($query1)) { ?> 

            <?php while ($row = mysqli_fetch_assoc($query)) { ?>  
                <div>
                    <span><?php echo "订单号：" . $row['order_id'] ?></span>
                    <span><?php echo "收件人：" . $row['consignee'] ?></span>
                    <span><?php echo "电话：" . $row['phone'] ?></span>
                    <span><?php echo "收件地址：" . $row['address'] ?></span>
                    <span><?php echo "订单总价：" . $row['price_total'] . "元" ?></span>
                </div>
                <ul>
                    <li><?php echo "书名：" . $row['product_name'] ?></li>
                    <li><?php echo "单价：" . $row['price'] ?></li>
                    <li><?php echo "数量：" . $row['product_qty'] ?></li>
                </ul>
                <?php
            }
        }
        ?>  

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
