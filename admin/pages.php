<?php

header("Content-Type: text/html;charset=utf-8");
//error_reporting(E_ALL); 
//ini_set('display_errors', true);
date_default_timezone_set("PRC");   //系统使用北京时间

define('DBHOST', 'localhost');
define('DBNAME', 'mystore');
define('DBUSER', 'root');
define('DBPWD', '724993441');
define('DBPREFIX', 'hw_');
define('DBCHARSET', 'utf8');
define('CONN', '');
define('TIMEZONE', 'Asia/Shanghai');

try {
    $db = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPWD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->query('SET NAMES utf8;');
} catch (PDOException $e) {
    echo "Error: " . $e;
}


$page = intval($_POST['pageNum']);
$method = $_POST['method'];

//查看商品
if($method == "showpro"){
    //$page = 0;
    $sql = "SELECT count(*) as tt FROM `je_product`";
    $stmt = $db->query($sql);
    $stmt->execute();
    $rs = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $rs['tt'];

    $pageSize = 12; //每页显示数
    $totalPage = ceil($total / $pageSize); //总页数
    //die($totalPage);
    $startPage = $page * $pageSize;
    $arr['total'] = $total;
    $arr['pageSize'] = $pageSize;
    $arr['totalPage'] = $totalPage;

    $sql = "select product_id,product_name,price,description,qty from je_product order by product_id asc limit $startPage,$pageSize";
    $stmt = $db->query($sql);
    $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($list as $key => $val) {
        $arr['list'][] = array(
            'product_id' => $val['product_id'],
            'product_name' => $val['product_name'],
            'price' => $val['price'],
            'description' => $val['description'],
            'qty' => $val['qty'],
        );
    }
}
    //print_r($arr);

//查看已售出商品
if($method == "saled"){
    //$page = 0;
    $sql = "SELECT count(DISTINCT product_id) as tt FROM `je_order_detail`";
    $stmt = $db->query($sql);
    $stmt->execute();
    $rs = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $rs['tt'];

    $pageSize = 12; //每页显示数
    $totalPage = ceil($total / $pageSize); //总页数
    //die($totalPage);
    $startPage = $page * $pageSize;
    $arr['total'] = $total;
    $arr['pageSize'] = $pageSize;
    $arr['totalPage'] = $totalPage;

    $sql = "SELECT DISTINCT product_id,product_name,price,sum(product_qty) FROM je_order_detail GROUP BY  product_id asc limit $startPage,$pageSize";
    $stmt = $db->query($sql);
    $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($list as $key => $val) {
        $arr['list'][] = array(
            'product_id' => $val['product_id'],
            'product_name' => $val['product_name'],
            'price' => $val['price'],
            'qty' => $val['sum(product_qty)'],
        );
    }
}
    echo json_encode($arr);
