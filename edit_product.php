<?php
session_start();
include_once 'Cart_Class.php';
//$action = isset($_get['action']) ? $_GET['action'] : "";
//$product_id = isset($_get['id']) ? $_GET['id'] : "";
$action = $_GET['action'];
$product_id = $_GET['id'];
$cart = new Cart();
if($action == 'dec'){
    $cart->decQty($product_id);
}
if($action == 'inc'){
    $cart->incQty($product_id);
}
if($action == 'del'){
    $cart->delItem($product_id);
}
header("Location:cart.php");
//echo $product_id;
//echo $action;
//echo '11111';
//print_r($_SESSION);
?>