<?php

/**
 * 编辑
 */
//$con = mysql_connect("localhost", "root", "");
include 'conn/conn.php';
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$description = $_POST['description'];
$qty = $_POST['qty'];
$method = $_POST['method'];
//die($product_id);
if ($method == "updatepro") {
    $sql = "UPDATE je_product SET product_name = '$product_name',price = '$price',description = '$description',qty = '$qty'WHERE product_id = '$product_id'";
    $result = $conn->query($sql);
    if ($result) {
        //echo "修改成功";
        $sql = "select * from je_product where product_id = " . $product_id;
        $result = $conn->query($sql);
        $row = $result->fetch_array();
        $arr = array("product_id" => $row['product_id'], "product_name" => $row['product_name'], "price" => $row['price'], "description" => $row['description'], "qty" => $row['qty']);
        echo json_encode($arr);
        //echo "修改成功";
    } else {
        echo "修改失败" . $qty;
    }
    mysqli_close($conn);
}
if($method == "insertpro"){
    echo"test";
}
?>