<?php
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
/**
 * 面向过程的方法操作数据库
 */
    $conn = mysqli_connect('localhost', 'root', '724993441', 'mystore');
    //include 'conn/conn.php';
    mysqli_set_charset($conn, "utf8");
    $sql_username = "select * from je_user where user_name = '$username'";
    $sql_email = "select * from je_user where email = '$username'";
    $res = mysqli_query($conn, $sql_username);
    $row = mysqli_fetch_array($res);
    $res1 = mysqli_query($conn, $sql_email);
    $row1 = mysqli_fetch_array($res1);
   // echo '';
    if (!$row1) {
        //echo $row['password'];
        //echo $password;
        if ($username == $row['user_name'] && $password === $row['user_psw']) {  
            session_start();
            $_SESSION['username'] = $username;
            echo $_SESSION['username'];
           // echo $row['password'];
               header("Location:index.php");
            
        } else{
            //header("Location:login.php?err=1");
            //echo"111";
        }
    } else {
        if($username == $row1['email'] && $password === $row1['user_psw']){
            session_start();
            $_SESSION['username'] = $row1['name'];
            header("Location:index.php");
        } else {
            header("Location:login.php?err=1");
        }
    }
    mysqli_close($conn);
    ?>
