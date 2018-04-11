<?php

include 'conn/conn.php';
$category_id = $_POST['category'];
$product_name = $_POST['product_name'];
$pic_addr = $_POST['pic_addr'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$desc = $_POST['desc'];
//////testData///////////
//$category_id = 1;
//$product_name = "test1";
//$pic_addr = "test2";
//$price = 4;
//$qty = 5;
//$desc = "8888";
/////////////////////////
$sql = "select MAX(product_id) from je_product where category_id = '$category_id'";
$result = $conn->query($sql);
$row = $result->fetch_array();
$product_id = $row['MAX(product_id)']+1;
//$product_id = $row;
//die($row);
//print_r($row);
$sql1 = "insert into je_product (product_id,category_id,product_name,description,price,product_pic,qty)
          VALUES('$product_id','$category_id','$product_name','$desc','$price','$pic_addr','$qty')";
$result1 = $conn->query($sql1);
if($result1){
    echo"产品上架成功！";
    //echo $product_id;
}
else{
    echo"产品上架失败！";
}
?>