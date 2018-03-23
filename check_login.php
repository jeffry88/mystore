<?php
session_start();
ini_set('session.save_path','/php_sessions/');
//6个钟头
ini_set('session.gc_maxlifetime',21600);
if (isset($_SESSION['username'])) {
            //echo $_SESSION['username'];
            header("Location:settlement.php");
        } else {
            
            header("Location:login.php");
        }
        ?>