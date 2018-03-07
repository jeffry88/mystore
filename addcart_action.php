<?php
header("Content-type:text/html;charset=utf-8");
session_start(86400);
include_once("conn/conn.php");
include_once 'Cart_Class.php';
$cart = new Cart();
//$cart = Cart::getCart('_test');
//$id = $product_id ;
//$qty = 1;
$product_id = $_GET['id'];
//echo $product_id;
$sql = "select product_name,price,product_pic from je_product where product_id = $product_id";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);
$cart->addItem($product_id,$row['product_name'],$row['price'],'1',$row['product_pic']);
//$cart->addItem($product_id,$row['product_name'],'1',$row['price']);
header("Location:addcart_succe.php");
//print_r($_SESSION);
//print_r($_SESSION['cart']);
//echo $cart->getPrice();
//echo session_id();
///echo $_SESSION['cart_test']->item[10001]['product_name'];
//echo $_SESSION['cart']->item[$product_id]['product_name'];
//echo $_SESSION['cart']->getPrice();
?>