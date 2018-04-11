<?php
session_start();
ini_set('session.save_path','/php_sessions/');
//6个钟头
ini_set('session.gc_maxlifetime',21600);
 include 'conn/conn.php';
        //$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
        $username = $_SESSION['username'];
        $sql = "select user_name from je_user where user_name = '$username'";
        $result = $conn->query($sql);
        $sql2 = "select email from je_user where email = '$username'";
        $request1 = $conn->query($sql2);
if ($result||$request1) {
            //echo $_SESSION['username'];
            header("Location:settlement.php");
        } else {
            
            header("Location:login.php");
        }
        ?>