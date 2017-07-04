<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>北京思行伟业数码科技有限公司后台管理系统</title>
<link rel="stylesheet" media="all" type="text/css" href="css/enter.css"/>
</head>
<body>

<?php
require_once("../My_SQL/_My_SQL_link_All.php");
$session_path = "../_Sessionpath/";//上传路径  
if(!file_exists($session_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$session_path", 0700);  
}
session_save_path(realpath($session_path)); 
session_start(); 
setcookie(session_name(),session_id(),time()+300,"/"); 
//  声明一个名为 admin 的变量，并赋空值。
$_SESSION['SXWY'] = 0;
error_reporting(0);
$name=$_POST['name'];
$passowrd=sha1($name.md5($_POST['password']));
if ($name && $passowrd)
{
 $sql = "SELECT * FROM t_user WHERE (u_Name = '$name') and (u_Password ='$passowrd')";
 $res = mysql_query($sql);
 $rows = mysql_num_rows($res);
	if($rows)
	{
		$sql = "SELECT `u_Id`,`u_Name`,`u_GroupId`,`u_Number` FROM `t_user`";
		$result = mysql_query($sql) or die("查询失败!");
		while ($row=mysql_fetch_array($result)) 
		{
			if($row['u_Name'] == $name || $row['u_Id'] == $name)
			{
				$_SESSION['SXWY'] = $row['u_Id'];
				$_SESSION['land'] = $row['u_Id'];
				$_SESSION['GroupId'] = $row['u_GroupId'];
				$_SESSION['Name'] = $row['u_Name'];
				$_SESSION['Number'] = $row['u_Number']+1;
		   }
		   else if(!$row['u_Name'] == $name || $row['u_Id'] == $name)
		   {
				$_SESSION["SXWY"] = $_SESSION['land'] = $_SESSION['GroupId'] = $_SESSION['Name'] =  $_SESSION['Number'] = 0;  
				?>
				<script language="javascript"> 
					function clock(){
					if(i==0){ 
					clearTimeout(st); 
					window.opener=null; 
					window.parent.window.close();} 
					i = i - 1; 
					st = setTimeout("clock()",1000);
					}
					var i=3 
					clock(); 
				</script>
				<?php
			}
		}
		mysql_free_result($result);
	
	   //  注册登陆成功的 SXWY 变量，并赋值为用户ID
	   header("refresh:0;url=main.php");//跳转页面，注意路径
	   exit;
	 }
 	echo "<script language=javascript>alert('用户名密码错误');history.back();</script>";
}
else
{
 echo "<script language=javascript>alert('用户名密码不能为空');history.back();</script>";
 header("refresh:0;url=enter.htm");//跳转页面，注意路径
}
mysql_free_result($res);
?>

</body>
</html>