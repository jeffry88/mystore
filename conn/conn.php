<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    //本地测试
    $host = '127.0.0.1';
    $port = 3306;
    $user = "root";
    $pwd = "724993441";
    $link = @mysql_connect("{$host}:{$port}",$user,$pwd,true);
    if(!$link) {
        die("Connect Server Failed: " . mysql_error());
    }
    else {
        echo '连接成功！';
    }
    //选择连接的数据库库名
    mysql_select_db("mystore");
    //设置字符编码utf8
    mysql_set_charset('utf8');
?>
