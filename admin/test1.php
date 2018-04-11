<?php
session_start();
include 'conn/conn.php';
//$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$admin_name = $_SESSION['username'];
$sql = "select admin_name from je_admin where admin_name = '$admin_name'";
$result = $conn->query($sql);
$row = $result->fetch_array();
print_r($row);
//if (!mysql_num_rows($result)) {
//    header("Location:login.php");
//}