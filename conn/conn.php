<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//本地测试
$servername = 'localhost'; //
$username = 'root';   //用户名
$password = '724993441'; //密码自己填
$database = 'mystore';  //数据库名称
// 创建连接

$conn = new mysqli($servername, $username, $password, $database);
mysqli_query($conn, 'SET NAMES utf8');
// 检测连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
