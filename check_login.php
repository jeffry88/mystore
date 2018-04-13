<?php

session_start();
ini_set('session.save_path', '/php_sessions/');
//6个钟头
ini_set('session.gc_maxlifetime', 21600);
include 'conn/conn.php';
$product_id = $_GET['id'];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
//$username = $_SESSION['username'];
$sql = "select user_name from je_user where user_name = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_array();
$sql1 = "select email from je_user where email = '$username'";
$request1 = $conn->query($sql1);
$row1 = $result->fetch_array();
if (!empty($row) || !empty($row1)) {
    //echo $_SESSION['username'];
    if (!empty($product_id)) {
        header('Location:settlement.php?id=' . $product_id);
    } else {
        header('Location:addorder.php');
    }
} else {

    header("Location:login.php");
}
?>