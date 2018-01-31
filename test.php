<?php
include 'conn/conn.php';
$username = "小华";
$con = mysqli_connect('localhost', 'root', '724993441', 'mystore');
mysqli_set_charset($con, "utf8");
$sql_name = "select * from user where name = '$username'";
$res = mysqli_query($con,$sql_name);
$row = mysqli_fetch_array($res);
echo "111";
echo $row['name'];
?>