<?php
/*include 'conn/conn.php';
$username = "小华";
$con = mysqli_connect('localhost', 'root', '724993441', 'mystore');
mysqli_set_charset($con, "utf8");
$sql_name = "select * from user where name = '$username'";
$res = mysqli_query($con,$sql_name);
$row = mysqli_fetch_array($res);
echo "111";
echo $row['name'];*/
//echo $_SESSION['username'];
?>
<?php  
include_once("conn/conn.php"); 
//$conn = mysqli_connect('localhost', 'root', '724993441', 'mystore');
require_once('page.class.php'); //分页类  
$showrow = 10; //一页显示的行数  
$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']  
//省略了链接mysql的代码，测试时自行添加  
//$sql = "SELECT * FROM data_type";  
$sql = "SELECT * FROM test";

$total = mysqli_num_rows(mysqli_query($conn, $sql)); //记录总条数  
if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))  
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
//获取数据  
$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";  
$query = mysqli_query($conn, $sql);
?>  
  
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
    <head>   
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
        <title>演示：PHP简单漂亮的分页类</title>  
        <meta name="keywords" content="php分页类" />  
        <meta name="description" content="本文介绍一款原生的PHP分页类，分页样式有点类似bootstrap。" />  
        <link rel="stylesheet" type="text/css" href="css/common.css" />  
        <link rel="stylesheet" type="text/css" href="css/show-product.css" />  
    </head>  
    <body>  
        <div class="head">  
            <div class="head_inner clearfix">  
                <ul id="nav">  
                    <li><a href="http://www.sucaihuo.com">首 页</a></li>  
                    <li><a href="http://www.sucaihuo.com/templates">网站模板</a></li>  
                    <li><a href="http://www.sucaihuo.com/js">网页特效</a></li>  
                    <li><a href="http://www.sucaihuo.com/php">PHP</a></li>  
                    <li><a href="http://www.sucaihuo.com/site">精选网址</a></li>  
                </ul>  
                <a class="logo" href="http://www.sucaihuo.com"><img src="http://www.sucaihuo.com/Public/images/logo.jpg" alt="素材火logo" /></a>  
            </div>  
        </div>  
        <div class="container">  
            <div class="demo">  
                <h2 class="title"><a href="http://www.sucaihuo.com/php/223.html">教程：PHP简单漂亮的分页类</a></h2>  
  
                <div class="showData">  
  
                    <ul class="dates">  
                        <?php while($row = mysqli_fetch_assoc($query)) { ?>   
                            <li>  
                                <span><?php echo $row['name'] ?></span>  
                                <a target="_blank" href="http://www.sucaihuo.com/js"><?php echo $row['value'] ?></a>  
                            </li>  
                        <?php } ?>  
                    </ul>  
                    <!--显示数据区-->  
                </div>  
                <div class="showPage">  
                    <?php  
                    if ($total > $showrow) {//总记录数大于每页显示数，显示分页  
                        $page = new page($total, $showrow, $curpage, $url, 2);  
                        echo $page->myde_write();  
                    }  
                    ?>  
                </div>  
            </div>  
        </div>  
        <div class="foot">  
            Powered by sucaihuo.com  本站皆为作者原创，转载请注明原文链接：<a href="http://www.sucaihuo.com" target="_blank">www.sucaihuo.com</a>  
        </div>  
        <script type="text/javascript" src="js/vendor/jquery-1.11.2.min.js"></script>   
    </body>  
</html>  