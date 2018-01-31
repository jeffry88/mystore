<?php
session_start();
echo $_SESSION['testname'];
//echo $_SESSION['username'];
if(!empty($_SESSION['username'])){
include 'test.php';
}else{
    echo"meiyouyonghuming";
}