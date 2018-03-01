<?php

//session_start();
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$re_password = isset($_POST['re_password']) ? $_POST['re_password'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
//判断两次输入的密码是否一致
if ($password == $re_password) {
    $conn = mysqli_connect('localhost', 'root', '724993441', 'mystore');
    mysqli_set_charset($conn, "utf8");
    $sql_username = "select name from user where name = '$username'";
    //$sql_email = "select email from user where email = 'username'";
    $res = mysqli_query($conn, $sql_username);
    $row = mysqli_fetch_array($res);
    //echo $username;
    //echo '1111';
    //echo $row['name'];
    //$res1 = mysqli_query($con, $sql_email);
   //$row1 = musqli_fetch_arry($res1);
        if ($username == $row['name']) {
            header("Location:register.php?err=1");
        } else {
            $sql_insert = "insert into user(name,password,email)values('$username','$password','$email')";
} else {
    header("Location:register.php?err=2");
}
        
    
            mysqli_query($conn, $sql_insert);
            header("Location:register.php?err=3");
        }
    mysqli_close($conn);
