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
//$method = $_POST['method'];
//查看用户
    $sql = "SELECT count(*) as tt FROM `je_order_detail`";
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

    $sql = "select je_order.order_id,product_id,product_name,price,product_qty,user_name,consignee,phone,address,price_total from je_order
             inner join je_order_detail on je_order.order_id=je_order_detail.order_id order by order_id asc limit $startPage,$pageSize";
    $stmt = $db->query($sql);
    $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($list as $key => $val) {
        $arr['list'][] = array(
            'order_id' => $val['order_id'],
            'product_id' => $val['product_id'],
            'product_name' => $val['product_name'],
            'price' => $val['price'],
            'product_qty' => $val['product_qty'],
            'user_name' => $val['user_name'],
            'consignee' => $val['consignee'],
            'phone' => $val['phone'],
            'address' => $val['address'],
            'price_total' => $val['price_total'],
        );
    }
    //print_r($arr);
    echo json_encode($arr);
