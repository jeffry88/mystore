<?php

session_start();
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
    $con = mysqli_connect('localhost', 'root', '724993441', 'mystore');
    mysqli_set_charset($con, "utf8");
    $sql_username = "select * from user where name = '$username'";
    $sql_email = "select * from user where email = '$username'";
    $res = mysqli_query($con, $sql_username);
    $row = mysqli_fetch_array($res);
    $res1 = mysqli_query($con, $sql_email);
    $row1 = mysqli_fetch_array($res1);
    if (!$row1) {
        if ($username == $row['name'] && $password == $row['password']) {           
                header("Location:index.php");
            
        } else{
            header("Location:login.php?err1");
        }
    } else {
        if($username == $row1['email'] && $password == $row1['password']){
            header("Location:index.php");
        } else {
            header("Location:login.php?err1");
        }
    }
    mysqli_close($con);
    ?>
