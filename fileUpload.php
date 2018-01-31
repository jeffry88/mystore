<?php
header("content-type:text/html;charset:utf-8");
$fileInfo = $_FILES["myFile"];

$filename = $fileInfo["name"];
$type = $fileInfo["type"];
$error = $fileInfo["error"];
$size = $fileInfo["size"];
$tmp_name = $fileInfo["tmp_name"];
$maxSize=2*1024*1024;//允许的最大值
$allowExt=array("jpeg","jpg","gif","png");
$flag = true;//检测是否为真实的图片类型

//判断错误号
if($error == 0){
 //判断上传文件的大小
 if($size>$maxSize){
 exit("上传文件过大");
 }
 
 //检测文件类型
 //取出文件扩展名
 $ext = pathinfo($filename,PATHINFO_EXTENSION);
 if(!in_array($ext,$allowExt)){
 exit("非法文件类型");
 }

 //检测是否为真实的图片类型
 if($flag){
 if(@!getimagesize($tmp_name)){
  exit("不是正的图片类型");
 }
 }

 //创建目录
 $path = "D:/wamp64/www/mystore/img/";
 if(!file_exists($path)){
 mkdir($path,0777,true);
 chmod($path,0777);
 }

 //确保文件名唯一,防止重名覆盖
 $uniName = md5(uniqid(microtime(true),true)).".".$ext;
 $destination = $path.$uniName;
 if(@move_uploaded_file($tmp_name,$destination)){
 echo "上传成功";
 }else{
 echo "上传失败";
 }
}else{
 switch($error){
 case 1:
 case 2:
 case 3:
 case 4:
 case 6:
 case 7:
 case 8:
  echo "上传错误";
  break;
 }
}
?>