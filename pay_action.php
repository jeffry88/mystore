<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
session_start();
ini_set('session.save_path', '/php_sessions/');
//6个钟头
ini_set('session.gc_maxlifetime', 21600);
//保存一天
//$lifeTime = 24 * 3600;
//setcookie(session_name(), session_id(), time() + $lifeTime, "/");
include_once 'Cart_Class.php';
include 'conn/conn.php';
include 'headlink.php';
$cart = new Cart();
$username = $_SESSION['username'];
$totalprice = $cart->getPrice();
$name = isset($_POST['name']) ? $_POST['name'] : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
$address = isset($_POST['province']) ? $_POST['province'] : "";
$address .= isset($_POST['address']) ? $_POST['address'] : "";
$postcode = isset($_POST['postcode']) ? $_POST['postcode'] : "";
$order_id = 'SK' . date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
//die($order_id);
/**
 * 使用面向对象的方法操作数据库
 */
$query = "SELECT money,user_id,user_name FROM je_user where user_name = '$username'";
$result = $conn->query($query);
$row = $result->fetch_array();
$user_id = $row['user_id'];
$flag = 0;
//die($row['user_id']);
//判断账户余额是否大于购物车总价
if ($row['money'] >= $totalprice) {
    if ($_SESSION['cart']) {
        foreach ($_SESSION['cart'] as $k => $val) {
            $product_id = $val['product_id'];
            $product_name = $val['product_name'];
            $price = $val['price'];
            //echo "dddd$price";
            $product_qty = $val['qty'];
            //die($order_id);
            $sql = "select qty from je_product where product_id = '$product_id'";
            $request = $conn->query($sql);
            $row = $request->fetch_array();
            //echo "订单号" . $order_id . "用户号" . $user_id . "用户名" . $username . "收货人" . $name . "电话" . 
            //$phone . "地址" . $address . "总价" . $totalprice . "单价" . $price . "产品id" . $product_id . "数量" . $product_qty;
            //判断库存是否充足
            if ($row['qty'] >= $product_qty) {
                $flag++;
                //echo "哨兵：".$flag;
                //order表只需执行一次
                if ($flag == 1) {
                    //echo '555';
                    $sql1 = "insert into je_order (order_id,user_id,user_name,consignee,phone,address,price_total)
                          values('$order_id','$user_id','$username','$name','$phone','$address','$totalprice')";
                    $request1 = $conn->query($sql1);
                    $sql4 = "update je_user set money = money - '$totalprice' where user_id = '$user_id'";
                    $request4 = $conn->query($sql4);
                }
                //die('111111');
                $sql2 = "insert into je_order_detail (order_id,product_id,product_name,price,product_qty) 
                       values('$order_id','$product_id','$product_name','$price','$product_qty')";
                $sql3 = "update je_product set qty = qty - '$product_qty'where product_id = '$product_id'";

                // die('111111');
                $request2 = $conn->query($sql2);
                $request3 = $conn->query($sql3);
            } else {

                echo '库存不足';
                header("Location:index.php");
            }
        }
        if ($request1 && $request2 && $request3 && $request4) {
            //header("Location:buy_success.php"); 
            $cart->clear();
            //echo '提交成功';
            ?>
            <div class="showbooks">
                <div class="cart_header">
                    <div class="heade">
                        <a href="index.php" class="navbar-brand"><em>J</em>store</a>
                    </div>

                </div>
                <div class="clear"></div>
                <div style="height:320px;text-align: center;">
                    <div style="margin-top: 190px;">
                        <p style="font-size: 20px;">订单提交成功！</p>
                        <p style="font-size: 20px;">欢迎亲回<a href="index.php">首页</a>继续购物</p>
                    </div>
                   
                </div>
                 <div class="clear"></div>
            </div>
            <?php include 'footer.php'; ?>
            <?php
        } else {

            echo '订单提交失败！';
        }
    } else {
        ?>
        <div class = "showbooks">
            <div class = "cart_header">
                <div class = "heade">
                    <a href = "index.php" class = "navbar-brand"><em>J</em>store</a>
                </div>
            </div>
            <div style="height:400px;text-align: center;">
                <div style="margin-top: 190px;">
                    <p style="font-size: 20px;"><?php echo '购物车中没有商品！'; ?></p>
                <p style="font-size: 20px;">请返回<a href = "index.php">首页</a>选购商品</p>
                </div>
                <div class = "clear"></div>
            </div>
            <div class = "clear"></div>
        </div>
        <?php include 'footer.php'; ?>
        <?php
    }
}
//echo $row['money'];
//echo $username;
?>
