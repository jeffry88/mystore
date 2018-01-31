
<?php  
/*$f=&$HTTP_POST_FILES['Myfile'];
$dest_dir='img';//设定上传目录
$dest=$dest_dir.'/'.date("ymd")."_".$f['name'];//设置文件名为日期加上文件名避免重复
$r=move_uploaded_file($f['tmp_name'],$dest);
//chmod($dest, 0755);//设定上传的文件的属性*/
$res["error"] = "";//错误信息
$res["msg"] = "";//提示信息
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],"c:\\test.jpg")){
    $res["msg"] = "ok";
}else{
    $res["error"] = "error";
}
echo json_encode($res);
?> 