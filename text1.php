<?php
header("Content-type:text/html;charset=utf-8");
session_start(86400);
include 'conn/conn.php';
include_once 'Cart_Class.php';
print_r($_SESSION['cart']);
//print_r($_SESSION);
//$order_id = 'hsbdab';
$user_id = 1;
$username = 'dav';
$name = 'cdavv';
$phone = 65126556;
$address = 'jfdanvhb';
$product_id = 1222;
$product_qty = 5;
$totalprice = 52;
$price = 10;
$cart = new Cart();
//$cart->clear();
//$order_id = 'SK'.date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
//$sql1 = "insert into je_order (order_id,user_id,user_name,consignee,phone,address,price_total) values('$order_id','$user_id','$username','$name','$phone','$address','$totalprice')";
//$request1 = $conn->query($sql1);
 $sql2 = "insert into je_order_detail (order_id,product_id,product_name,price,product_qty) 
                       values('$order_id','$product_id','$price','$product_qty')";
 $request2 = $conn->query($sql2);
echo $order_id;
//if (price == 10){
//    echo '1111';
//}
// else {
//    echo '22222';
//}
?>