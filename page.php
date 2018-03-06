<?php
header("Content-Type: text/html;charset=utf-8");
include_once("conn/conn.php");
//$conn = mysqli_connect('localhost', 'root', '724993441', 'mystore');
require_once('page.class.php'); //分页类  
$showrow = 12; //一页显示的行数 
//$kind = 1;
$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']  
//省略了链接mysql的代码，测试时自行添加  
//$sql = "SELECT * FROM data_type";  
//$sql = "SELECT * FROM je_product";
$sql = "SELECT * FROM je_product ,je_category WHERE categroy_id = $kind AND je_product.product_id = je_category.product_id";
$total = mysqli_num_rows(mysqli_query($conn, $sql)); //记录总条数  
if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
//获取数据  
$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
$query = mysqli_query($conn, $sql);
?>  