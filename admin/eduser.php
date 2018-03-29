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
    $sql = "SELECT count(*) as tt FROM `je_user`";
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

    $sql = "select * from je_user order by user_id asc limit $startPage,$pageSize";
    $stmt = $db->query($sql);
    $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($list as $key => $val) {
        $arr['list'][] = array(
            'user_id' => $val['user_id'],
            'user_name' => $val['user_name'],
            'sex' => $val['sex'],
            'email' => $val['email'],
            'money' => $val['money'],
            'phone' => $val['phone'],
            'user_addr' =>$val['user_addr'],
        );
    }
    //print_r($arr);
    echo json_encode($arr);
