<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />
<title>后台管理系统</title>
<link rel = "stylesheet" href = "css/main.css">
<?php
	error_reporting(E_ALL);
	$i=isset($_GET['i']) ? intval($_GET['i']) : 0;
	require_once("../My_SQL/_My_SQL_link.php");
	//  防止全局变量造成安全隐患
	$SXWY = false;
	//  启动会话
	$session_path = "../_Sessionpath/";//上传路径  
	if(!file_exists($session_path))  
	{  
		//检查是否有该文件夹，如果没有就创建，并给予最高权限  
		mkdir("$session_path", 0700);  
	}
	session_save_path(realpath($session_path)); 
	session_start(); 
	setcookie(session_name(),session_id(),time()+900,"/"); 
	//  判断是否登陆
	if (isset($_SESSION['SXWY']) && $_SESSION['SXWY'] != 0)
	{
			$id = $_SESSION['SXWY'];
			$group = $_SESSION['GroupId'];
			$name = $_SESSION['UserName'];
			$regdate = date("Y-m-d H:i:s", time());
			$ip = $_SERVER['REMOTE_ADDR'];
		if($_SESSION['land']!= 0)
		{
			$_SESSION['land'] = 0;
			$update_sql = "update `t_user` set u_Lasttime = u_Thistime , u_Thistime = '$regdate' , u_LastIp = u_ThisIp , u_ThisIp = '$ip', u_Number = u_Number + 1  where u_UserId = $id";
			$down_path = "../file/";//上传路径  
			if(!file_exists($down_path))  
			{  
				//检查是否有该文件夹，如果没有就创建，并给予最高权限  
				mkdir("$down_path", 0700);  
			}
			mysql_query($update_sql,$con);	
		}
	}
	else
	{
		$_SESSION["SXWY"] = $_SESSION['land'] = $_SESSION['GroupId'] = $_SESSION['UserName'] = $_SESSION['Number'] = $group = $name = $SXWY;	
		header("refresh:1;url = index.php");
		die("<div align = 'center' style = 'margin-top:20%'><h1>登陆超时，请重新登陆<h1></div>");
	}
?>
</head>
<body>
<!--[if IE]>    
        <div style = "left:50%; margin-left:-20px; margin-top:15%;">本后台拒绝在IE内核模式下运行</div>
   		<meta http-equiv = "Refresh" content = "1;URL = ../index.php" />
<![endif]-->
    <div align = "center">
    </div>
    <div id = "top">
    	<h2>你好<?php echo $name;?></h2>
        <div class = jg></div>
        <div id = "topTags">
            <ul><li><?php 
				if		($i == 0 ){$Top_Title = '欢迎访问后台管理系统';}
				else if ($i == 10 ){$Top_Title = '个人资料';}
				else if ($i == 11 ){$Top_Title = '个人信息修改';}
				else if ($i == 20 ){$Top_Title = '用户管理';}
				else if ($i == 21 ){$Top_Title = '添加新用户';}
				else if ($i == 22 ){$Top_Title = '用户删除';}
				else if ($i == 30 ){$Top_Title = '产品展示';}
				else if ($i == 31 ){$Top_Title = '添加要展示的产品';}
				else if ($i == 32 ){$Top_Title = '删除产品信息';}
				else if ($i == 40 ){$Top_Title = '技术支持';}
				else if ($i == 41 ){$Top_Title = '添加技术信息';}
				else if ($i == 42 ){$Top_Title = '删除技术信息';}
				else if ($i == 50 ){$Top_Title = '联系我们';}
				else if ($i == 51 ){$Top_Title = '添加新的地址';}
				else if ($i == 52 ){$Top_Title = '删除地址信息';}
				else if ($i == 60 ){$Top_Title = '关于我们';}
				else if ($i == 61 ){$Top_Title = '添加关于我们';}
				else if ($i == 62 ){$Top_Title = '删除关于我们';}
				else if ($i == 70 ){$Top_Title = '产品下载';}
				else if ($i == 71 ){$Top_Title = '添加产品下载';}
				else if ($i == 72 ){$Top_Title = '删除产品下载';}
				else if ($i == 80 ){$Top_Title = '公益产品';}
				else if ($i == 81 ){$Top_Title = '添加公益产品';}
				else if ($i == 82 ){$Top_Title = '删除公益产品';}
				else if ($i == 90 ){$Top_Title = '企业员工';}
				else if ($i == 91 ){$Top_Title = '添加员工信息';}
				else if ($i == 92 ){$Top_Title = '删除员工信息';}
				else if ($i == 100){$Top_Title = '访客留言信息';}
				else if ($i == 102){$Top_Title = '删除留言信息';}
				else if ($i == 110){$Top_Title = '幻灯片信息';}
				else if ($i == 111){$Top_Title = '添加幻灯片信息';}
				else if ($i == 112){$Top_Title = '删除幻灯片信息';}
				else if ($i == 120){$Top_Title = '帮助文档';}
				else if ($i == 130){$Top_Title = '退出登录';}
				else			   {$Top_Title = '提示信息';}
				echo $Top_Title;
			?></li></ul>
        </div>
    </div>
<div id = "main"> 
<div id = "leftMenu">
<ul>
<a href = "?i=0  "><li>后台首页</li></a>
<a href = "?i=10 "><li>个人资料</li></a>
<a href = "?i=20 "><li>用户管理</li></a>
<a href = "?i=30 "><li>产品展示</li></a>
<a href = "?i=40 "><li>技术支持</li></a>
<a href = "?i=50 "><li>联系我们</li></a>
<a href = "?i=60 "><li>关于我们</li></a>
<a href = "?i=70 "><li>产品下载</li></a>
<a href = "?i=80 "><li>紧急避险</li></a>
<a href = "?i=90 "><li>企业员工</li></a>
<a href = "?i=100"><li>访客留言</li></a>
<a href = "?i=110"><li>幻 灯 片</li></a>
<a href = "?i=120"><li>帮助文档</li></a>
<a href = "?i=130"><li>退出登录</li></a>
</ul>
</div>
<div class = jg></div>
<div id = "content">
<div id = "welcome" class = "content" style = "display:block;">
<?php
switch($i){
case 0:
?>
	<div align = "center">
        <br /><br />
			<script charset = "Shift_JIS" src = "js/honehone_clock.js"></script>
        <br /><br />
        <p>
        	<strong>
				<?php echo '欢迎您',$name,'<br />今天是',date("Y-m-d", time()),'<br />本次登陆IP',$ip,'<br />这是您第',$_SESSION['Number'],'次登陆后台';?>
            </strong>
        </p>
    </div>
</div>
<?php
break;
case 10:
$user_sql = "SELECT `u_UserId`,`u_UserName`,`u_Sex`,`u_GroupId`,`u_CreateDate`,`u_Address`,`u_QQ`,`u_Phone`,`u_Mailbox`,`u_LastIp`,`u_Lasttime`,`u_ThisIp` FROM `t_user` order by u_UserId ";
$user_result = mysql_query($user_sql) or die("个人资料查询失败!");
$user_group = 0;
while ($user_row = mysql_fetch_array($user_result)) 
{
	if(250 < $user_row['u_GroupId'])
	{$user_group = '超级管理员';}
	if(250 == $user_row['u_GroupId'])
	{$user_group = '高级管理员';}
	if(200 == $user_row['u_GroupId'])
	{$user_group = '普通管理员';}
	if(150 == $user_row['u_GroupId'])
	{$user_group = '信息审核员';}
	if(100 == $user_row['u_GroupId'])
	{$user_group = '信息发布员';}
	if(50 == $user_row['u_GroupId'])
	{$user_group = '无权限';}
	if(0 == $user_row['u_GroupId'])
	{$user_group = '游客';}
	if ($_SESSION['SXWY'] == $user_row['u_UserId'])
	{?>
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">用户ID</td><td style = "width:185px"><?php echo $user_row['u_UserId'];?></td>
    <td style = "width:80px">用户名</td><td style = "width:185px"><?php echo $user_row['u_UserName'];?></td>
  </tr>
  <tr>
    <td>性别</td><td><?php echo $user_row['u_Sex'];?></td>
    <td>用户权限</td><td><?php echo $user_group;?></td>
  </tr>
  <tr>
    <td>电话</td><td><?php echo $user_row['u_Phone'];?></td>
    <td>地址</td><td><?php echo $user_row['u_Address'];?></td>
  </tr>
  <tr>
    <td>QQ</td><td><?php echo $user_row['u_QQ'];?></td>
    <td>邮箱</td><td><?php echo $user_row['u_Mailbox'];?></td>
  </tr>
  <tr>
    <td>注册日期</td><td><?php echo $user_row['u_CreateDate'];?></td>
    <td>上次登陆IP</td><td><?php echo $user_row['u_LastIp'];?></td>
  </tr>
  <tr>
    <td>上次登陆时间</td><td><?php echo $user_row['u_Lasttime'];?></td>
    <td>本次登陆IP</td><td><?php echo $user_row['u_ThisIp'];?></td>
  </tr>
</table>

<?php
	}
}
?>
<a href = "?i=11">修改</a>
<?php
mysql_free_result($user_result);
break;
case 11:
$user_select_sql = "SELECT `u_UserId`,`u_UserName`,`u_Sex`,`u_Password`,`u_CreateDate`,`u_Address`,`u_QQ`,`u_Phone`,`u_Mailbox`,`u_Lasttime`,`u_LastIp`,`u_ThisIp`FROM `t_user` order by u_UserId ";
$user_result = mysql_query($user_select_sql) or die("个人信息修改查询失败!");
while ($user_row = mysql_fetch_array($user_result)) 
{
	if ($_SESSION['SXWY'] == $user_row['u_UserId'])
	{
		?>
<form name = "RegForm" method = "post" action = "?i=16" onSubmit = "return InputCheck(this)">
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">用户ID</td><td style = "width:165px"><input name = "u_UserId" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_UserId'];?>" readonly /></td>
    <td style = "width:80px">用户名</td><td style = "width:165px"><input name = "u_UserName" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_UserName'];?>" readonly /></td>
  </tr>
  <tr>
    <td>密码<a style = "float:right">*</a></td>
    <td><input type = "password" class = "table_Name" name = "u_Password" maxlength = "32" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;" required = "required" /></td>
    <td>确认密码<a style = "float:right">*</a></td>
    <td><input type = "password" class = "table_Name" name = "u_Password2" maxlength = "32" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;" required = "required" /></td>
  </tr>
  <tr>
    <td>性别</td>
    <td>
        <select name = "u_Sex" class = "table_Name" type = "text" >
            <option selected>女</option>
            <option selected>男</option>
        </select>
	</td>
    <td>电话</td>
    <td><input name = "u_Phone" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_Phone'];?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 13 /></td>
  </tr>
  <tr>
</table>
<table align = "center" width = "700" border = "1" style="margin-top:-1px;">
    <td style = "width:110px">地址</td>
    <td>
        <select id="s_province" name = "u_Province" style="width:187px;" selected></select>
        <select id="s_city" name = "u_City" style="width:186px;" selected></select>	
        <select id="s_county" name = "u_County" style="width:186px;" selected></select>	
		<script class="resources library" src="js/area.js" type="text/javascript"></script>
        <script type="text/javascript">_init_area();</script>
     </td>
  </tr>
</table>
<table align = "center" width = "700" border = "1" style="margin-top:-1px;">
  <tr>
    <td style = "width:110px">QQ</td>
    <td><input name = "u_QQ" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_QQ'];?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 10/></td>
    <td>邮箱</td>
    <td><input name = "u_Mailbox" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_Mailbox'];?>" /></td>
  </tr>
  <tr>
    <td>注册日期</td>
    <td><input name = "u_UserId" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_CreateDate'];?>" readonly /></td>
    <td>上次登陆IP</td>
    <td><input name = "u_LastIp" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_LastIp'];?>" readonly /></td>
  </tr>
  <tr>
    <td>上次登陆时间</td>
    <td><input name = "u_Lasttime" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_Lasttime'];?>" readonly /></td>
    <td>本次登陆IP</td>
    <td><input name = "u_ThisIp" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_ThisIp'];?>" readonly /></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
		<?php
	}
}
mysql_free_result($user_result);
break;
case 16:
if(!isset($_POST['submit'])){
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}

$sex = $_POST['u_Sex'];
$temp_Password = $_POST['u_Password'];
$password = sha1($name.md5($_POST['u_Password']));
$password2 = sha1($name.md5($_POST['u_Password2']));
$phone = $_POST['u_Phone'];
$province = $_POST['u_Province'];
$city = $_POST['u_City'];
$county = $_POST['u_County'];
if($province == '省份')
{$province='';}
if($city == '地级市')
{$city='';}
if($county == '市、县级市')
{$county='';}
$address = $province.'-'.$city.'-'.$county;
$qq = $_POST['u_QQ'];
$mailbox = $_POST['u_Mailbox'];
if(!$temp_Password){
    echo '密码不能为空。<a href = "javascript:history.back(-1);">返回</a>';
		break;
}
if(strlen($temp_Password) < 6){
    echo '错误：密码长度需大于6位。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
if($password != $password2)
{
    echo '错误：两次输入的密码不一致。<a href = "javascript:history.back(-1);">返回</a>';
		break;
}
$uesr_update_sql = "update t_user set 
u_Sex = '$sex',
u_Password = '$password',
u_Address = '$address',
u_QQ = '$qq',
u_Phone = '$phone',
u_Mailbox = '$mailbox'
where u_UserId = $id";
if(mysql_query($uesr_update_sql,$con))
{
				function deldir($dir)
			{
			   $dh = opendir($dir);
			   while ($file = readdir($dh))
			   {
				  if ($file != "." && $file != "..")
				  {
					 $fullpath = $dir . "/" . $file;
					 if (!is_dir($fullpath))
					 {
						@unlink($fullpath);
					 } else
					 {
						deldir($fullpath);
					 }
				  }
			   }
			   closedir($dh);
			   if (@rmdir($dir))
			   {
				  return true;
			   } else
			   {
				  return false;
			   }
			} 
			deldir($session_path); 
			session_unset(); 
			session_destroy();
    header("refresh:3;url = index.php");
    echo '个人信息修改成功！点击此处 <a href = "index.php">重新登录</a>';
		break;
} 
else {
    echo'抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '<input type = "submit" value = "  返回  " onclick = "javascript:history.back(-1);" />';
		break;
}
break;
case 20:
?>
	<table width = "1200" border = "1">
  <tr>
    <td style = "width:20px">ID</td>
    <td style = "width:80px">用户名</td>
    <td style = "width:30px">性别</td>
    <td style = "width:60px">用户权限</td>
    <td style = "width:140px">注册日期</td>
    <td style = "width:250px">地址</td>
    <td style = "width:70px">QQ</td>
    <td style = "width:70px">电话</td>
    <td style = "width:90px">邮箱</td>
    <td style = "width:130px">上次登陆时间</td>
    <td style = "width:80px">上次登陆IP</td>
  </tr>
  <?php
	$user_select_sql = "SELECT `u_UserId`,`u_UserName`,`u_Sex`,`u_GroupId`,`u_CreateDate`,`u_Address`,`u_QQ`,`u_Phone`,`u_Mailbox`,`u_Lasttime`,`u_LastIp`FROM `t_user` order by u_UserId ";
  	$user_result = mysql_query($user_select_sql) or die("用户管理查询失败!");
	$user_group = 0;
	while ($user_row = mysql_fetch_array($user_result)) 
	{ 
	if(250 < $user_row['u_GroupId'])
	{$user_group = '超级管理员';}
	if(250 == $user_row['u_GroupId'])
	{$user_group = '高级管理员';}
	if(200 == $user_row['u_GroupId'])
	{$user_group = '普通管理员';}
	if(150 == $user_row['u_GroupId'])
	{$user_group = '信息审核员';}
	if(100 == $user_row['u_GroupId'])
	{$user_group = '信息发布员';}
	if(50 == $user_row['u_GroupId'])
	{$user_group = '无权限';}
	if(0 == $user_row['u_GroupId'])
	{$user_group = '游客';}
	?>
<tr>
    <td><?php echo $user_row['u_UserId'];?></td>
    <td><?php echo $user_row['u_UserName'];?></td>
    <td><?php echo $user_row['u_Sex'];?></td>
    <td><?php echo $user_group;?></td>
    <td><?php echo $user_row['u_CreateDate'];?></td>
    <td><?php echo $user_row['u_Address'];?></td>
    <td><?php echo $user_row['u_QQ'];?></td>
    <td><?php echo $user_row['u_Phone'];?></td>
    <td><?php echo $user_row['u_Mailbox'];?></td>
    <td><?php echo $user_row['u_Lasttime'];?></td>
    <td><?php echo $user_row['u_LastIp'];?></td>
</tr>
 		<?php
	}
?>
</table>
<a href = "?i=21">添加用户</a>
<a href = "?i=22">删除用户</a>
<?php 
	mysql_free_result($user_result);
break;
case 21:
	$user_result = mysql_query("select count(*) from `t_user`");
	list($user_result_count) = mysql_fetch_row($user_result);
	if($user_result_count >= 10)
	{
		 echo '用户数量达到上限。请删除后在添加<a href = "javascript:history.back(-1);">返回</a>';
		break;
	}
	else if($group < 200)
	{
		 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
		break;
	}
	else
?>
<form name = "RegForm" method = "post" action = "?i=26" onSubmit = "return InputCheck(this)">
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">用户名<a style = "float:right">*</a></td><td style = "width:165px"><input name = "u_UserName" class = "table_Name"  onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" onKeypress="javascript:if(event.keyCode == 32)event.returnValue = false;" maxlength = 16 required = "required" /></td>
    <td>权限<a style = "float:right">*</a></td>
    <td>
    <select name = "u_GroupId" class = "table_Name" type = "text" >
            <option selected>高级管理员</option>
            <option selected>普通管理员</option>
            <option selected>信息审核员</option>
            <option selected>信息发布员</option>
            <option selected>无权限</option>
            <option selected>游客</option>
    </select>
    </td>
  </tr>
  <tr>
    <td style = "width:80px">密码<a style = "float:right">*</a></td><td style = "width:165px"><input type = "password" class = "table_Name" name = "u_Password"  maxlength = 32 required = "required" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;"/></td>
    <td style = "width:80px">再次输入<a style = "float:right">*</a></td><td style = "width:165px"><input type = "password" class = "table_Name" name = "u_Password2"  maxlength = 32 required = "required" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;"/></td>
  </tr>
  <tr>
    <td>性别</td><td>
        <select name = "u_Sex" class = "table_Name" type = "text" >
            <option selected>女</option>
            <option selected>男</option>
        </select></td>
    <td>电话</td><td><input name = "u_Phone" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 12/></td>
  </tr>
  <tr>
    <td>地址</td><td><input name = "u_Address" type = "text" class = "table_Name" maxlength = 30/></td>
    <td>QQ</td><td><input name = "u_QQ" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 10/></td>
  </tr>
  <tr>
    <td>邮箱</td><td><input name = "u_Mailbox" type = "text" class = "table_Name" /></td>
    <td>注</td><td><input class = "table_Name" value = "带*号为必填项目" readonly/></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 22:
if($group < 200)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=27" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
<tr>
	<td style = "width:80px">用户ID<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "u_UserId" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
    </tr>
<tr>
	<td>用户名<a style = "float:right">*</a></td>
    <td><input name = "u_UserName" class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
    </tr>
    <tr>
	<td>权限<a style = "float:right">*</a></td>
    <td>
    <select name = "u_GroupId" class = "table_Name" type = "text" >
            <option selected>高级管理员</option>
            <option selected>普通管理员</option>
            <option selected>信息审核员</option>
            <option selected>信息发布员</option>
            <option selected>无权限</option>
            <option selected>游客</option>
    </select></td>
</tr>
<tr>
	<td>密码<a style = "float:right">*</a></td>
    <td><input name = "u_Password" type = "password" class = "table_Name" maxlength = 32 required = "required" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;"/></td>
    </tr>
    <tr>
	<td>再次输入<a style = "float:right">*</a></td>
    <td><input name = "u_Password2" type = "password" class = "table_Name" maxlength = 32 required = "required" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;"/></td>
</tr>
  <tr>
    <td>注</td><td><input class = "table_Name" value = "带*号为必填项目" readonly/></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确认删除  " class = "left" />
</form>
<?php
break;
case 26:
if(!isset($_POST['submit'])){
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}

$username = $_POST['u_UserName'];
$temp_Password = $_POST['u_Password'];
$password = sha1($username.md5($_POST['u_Password']));
$password2 = sha1($username.md5($_POST['u_Password2']));
$permissions = $_POST['u_GroupId'];
if($permissions == '高级管理员'){$groupid = 250;}
if($permissions == '普通管理员'){$groupid = 200;}
if($permissions == '信息审核员'){$groupid = 150;}
if($permissions == '信息发布员'){$groupid = 100;}
if($permissions == '无权限'){$groupid = 50;}
if($permissions == '游客'){$groupid = 0;}
$sex = $_POST['u_Sex'];
$address = $_POST['u_Address'];
$qq = $_POST['u_QQ'];
$phone = $_POST['u_Phone'];
$mailbox = $_POST['u_Mailbox'];
if(!$temp_Password){
    echo '密码不能为空。<a href = "javascript:history.back(-1);">返回</a>';
		break;
}
if(!preg_match('/^[\w\x80-\xff]{4,16}$/', $username))
{
    echo '错误：用户名需大于4个字符并小于16个字符。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
if($password != $password2)
{
    echo '错误：两次输入的密码不一致。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
if(strlen($temp_Password) < 6 && strlen($temp_Password) > 32){
    echo '错误：密码长度需大于6个字符并小于32个字符。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
$check_query = mysql_query("select u_UserName from t_user where u_UserName = '$username' limit 1");
if(mysql_fetch_array($check_query))
{
    echo '错误：用户名 ',$username,' 已存在。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
if($groupid >= $group)
{
    echo '错误：添加人员权限不得大于当前用户权限<a href = "javascript:history.back(-1);">返回</a>';
    break;
}

if(!$mailbox == "")   
{   
	preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/",$mailbox);
    echo '错误：邮箱地址不正确<a href = "javascript:history.back(-1);">返回</a>'; 
    break;
	  
}

$user_into_sql = "INSERT INTO `t_user`(
u_UserName,u_Password,u_Sex,u_GroupId,u_CreateDate,u_Address,u_QQ,u_Phone,u_Mailbox,u_number)VALUES(
'$username','$password','$sex','$groupid','$regdate','$address','$qq','$phone','$mailbox','0')";

if(mysql_query($user_into_sql,$con)){
    echo '用户添加成功！<a href = "?i=20");">查看</a>';
    break;
} 
else {
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '<input type = "submit" value = "  返回  " onclick = "javascript:history.back(-1);" />';
    break;
}
break;
case 27:
if(!isset($_POST['submit'])){
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$userId = $_POST['u_UserId'];
$username = $_POST['u_UserName'];
$temp_Password = $_POST['u_Password'];
$password = sha1($name.md5($_POST['u_Password']));
$password2 = sha1($name.md5($_POST['u_Password2']));
$permissions = $_POST['u_GroupId'];
if($permissions == '超级管理员')
{$groupid = 250;}
if($permissions == '普通管理员')
{$groupid = 200;}
if($permissions == '信息审核员')
{$groupid = 150;}
if($permissions == '信息发布员')
{$groupid = 100;}
if($permissions == '无权限')
{$groupid = 50;}
if($permissions == '游客')
{$groupid = 0;}
$groupid = $permissions;

if(!$temp_Password){
    echo '密码不能为空。<a href = "javascript:history.back(-1);">返回</a>';
		break;
}
if(strlen($temp_Password) < 6 && strlen($temp_Password) > 32){
    echo '错误：密码长度需大于6个字符并小于32个字符。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
//检测用户名是否已经存在
$check_query = mysql_query("select u_UserId from t_user where u_UserId = '$userId'");
if(!mysql_fetch_array($check_query)){
    echo '错误：ID： ',$userId,' 不存在。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
$check_query = mysql_query("select u_UserId from t_user where u_UserId = '$userId' && u_UserName = '$username'");
if(!mysql_fetch_array($check_query)){
    echo '错误：用户名 ：',$username,' 与ID:',$userId,'不匹配请输入正确ID。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
//删除信息判断
$check_query = mysql_query("select u_UserId from t_user where u_UserId = '$userId' && u_UserName = '$username' &&  u_GroupId = '$groupid'");
if(!mysql_fetch_array($check_query)){
    echo '错误：用户权限错误，无法删除 ：',$username,'<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
if($group < $groupid)
{
    echo '错误：用户权限小于对方，无法删除 ：',$username,'<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
$check_query = mysql_query("select u_UserId from t_user where u_UserId = '$userId' && u_UserName = '$username' &&  u_Groupid >= '$groupid' && u_Password = '$password'");
if($password != $password2)
{
    echo '错误：两次输入的密码不一致。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
if(!mysql_fetch_array($check_query))
{
    echo '错误：用户名 ：',$username,'的密码不正确,无法进行删除操作，请重新输入。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}

//删除数据

	$user_delete_sql = "DELETE FROM t_user WHERE  u_UserId = '$userId' && u_UserName = '$username' && u_Password = '$password' &&  u_GroupId = '$groupid'";
	if(mysql_query($user_delete_sql,$con))
	{
		echo '用户删除成功！点击此处<a href = "?i=20">返回</a>';
    	break;
	}
	else
	{
		echo '抱歉！删除数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
	}

break;
case 30:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:140px">标题</td>
    <td style = "width:60px">作者</td>
    <td style = "width:80px">发表IP</td>
    <td style = "width:130px">发表日期</td>
    <td style = "width:300px">内容</td>
  </tr>
  <?php
	$Page_size=10; 
	$result=mysql_query('select * from t_Show'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_GET['page'])||$_GET['page']<0){ 
	$page=1; 
	}else { 
	$page=$_GET['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$show_select_sql = "SELECT `s_ShowId`,`s_ShowName`,`s_Author`,`s_PublishIp`,`s_Publishtime`,`s_Content` FROM `t_Show` order by s_ShowId limit $offset,$Page_size";
  	$show_result = mysql_query($show_select_sql) or die("产品展示查询失败!");
	while ($show_row = mysql_fetch_array($show_result)) 
	{
		?>
<tr>
    <td><?php echo $show_row['s_ShowId'];?></td>
    <td><?php echo mb_substr($show_row['s_ShowName'],0,12,'utf-8');?></td>
    <td><?php echo $show_row['s_Author'];?></td>
    <td><?php echo $show_row['s_PublishIp'];?></td>
    <td><?php echo $show_row['s_Publishtime'];?></td>
    <td><?php echo mb_substr(str_replace("","",strip_tags($show_row['s_Content'])),0,24,'utf-8');?></td>
</tr>
		<?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=30&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=30&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=30&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=30&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=30&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<a href = "?i=31">添加文章</a>
<a href = "?i=32">删除文章</a>
<?php
mysql_free_result($show_result);
break;
case 31:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=36" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">标题<a style = "float:right">*</a></td>
    <td style = "width:165px">
    <input name = "s_ShowName" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = "20" /></td>
  <tr>
  <td>内容<a style = "float:right">*</a></td>
    <td><textarea name = "s_Content" class = "table_Content"  required = "required" ></textarea></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 32:
if($group < 150)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=37" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_ShowId" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
<tr>
	<td>文章名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_ShowName"  type = "text" class = "table_Name" required = "required" maxlength = 20 /></td>
    </tr>
<tr>
	<td>作者名称<a style = "float:right">*</a></td>
    <td><input name = "s_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
    </tr>
    <tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确认删除  " class = "left" />
</form>
<?php
break;
case 36:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$showname = $_POST['s_ShowName'];

$content = str_replace(chr(13),'<br>',$_POST['s_Content']); 
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $showname)){
    echo '错误：标题长度需大于2个字并小于20个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
if(strlen($content) < 80){
    echo '错误：内容长度应大于20个字。<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
$check_query = mysql_query("select s_ShowName from t_Show where s_ShowName = '$showname' limit 1");
if(mysql_fetch_array($check_query)){
    echo '错误：文章名称 ',$showname,' 已存在。<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
$show_into_sql = "INSERT INTO `t_Show`(s_ShowName,s_Author,s_GroupId,s_PublishIp,s_Publishtime,s_Content)VALUES('$showname','$name','$group','$ip','$regdate','$content')";

if(mysql_query($show_into_sql,$con)){
    echo '文章发布成功！<a href = "?i=30">返回</a>';
   		break;
} else {
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
}
break;
case 37:

if(!isset($_POST['submit'])){
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$showid = $_POST['s_ShowId'];
$showname = $_POST['s_ShowName'];
$author = $_POST['s_Author'];
//验证ID
$check_query = mysql_query("select s_ShowId from t_Show where s_ShowId = '$showid'");
if(!mysql_fetch_array($check_query)){
    echo '错误：文章编号 ：',$showid,' 不存在<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应的名称
$check_query = mysql_query("select s_ShowId from t_Show where s_ShowId = '$showid' && s_ShowName = '$showname'");
if(!mysql_fetch_array($check_query)){
    echo '错误：文章编号 ：',$showid,' 与文章名称 ：',$showname,' 不匹配，请输入真确ID。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应的名称的作者
$check_query = mysql_query("select s_ShowId from t_Show where s_ShowId = '$showid' && s_ShowName = '$showname' && s_Author = '$author'");
if(!mysql_fetch_array($check_query)){
    echo '错误：文章 ：',$showname,'与作者',$author,' 不匹配，请输核实。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select s_ShowId from t_Show where s_ShowId = '$showid' && s_ShowName = '$showname' && s_Author = '$author' && s_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
    echo '错误：用户权限小于对方，无法删除 ：',$showname,'<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}

//删除数据

	$show_delete_sql = "DELETE FROM t_Show WHERE s_ShowId = '$showid' && s_ShowName = '$showname' && s_Author = '$author' && s_GroupId <= '$group'";
	if(mysql_query($show_delete_sql,$con))
	{
		echo '文章删除成功！点击此处<a href = "?i=30">返回</a>';
   		break;
	}
	else
	{
		echo '抱歉！删除数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
	}

break;
case 40:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:140px">标题</td>
    <td style = "width:60px">作者</td>
    <td style = "width:80px">发表IP</td>
    <td style = "width:130px">发表日期</td>
    <td style = "width:300px">内容</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from t_Support'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_GET['page'])||$_GET['page']<0){ 
	$page=1; 
	}else { 
	$page=$_GET['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$support_select_sql = "SELECT `s_SupportId`,`s_SupportName`,`s_Author`,`s_PublishIp`,`s_Publishtime`,`s_Content` FROM `t_Support` order by s_SupportId limit $offset,$Page_size";
  	$support_result = mysql_query($support_select_sql) or die("技术支持查询失败!");
	while ($support_row = mysql_fetch_array($support_result)) 
	{
		?>
<tr>
    <td><?php echo $support_row['s_SupportId'];?></td>
    <td><?php echo mb_substr($support_row['s_SupportName'],0,12,'utf-8');?></td>
    <td><?php echo $support_row['s_Author'];?></td>
    <td><?php echo $support_row['s_PublishIp'];?></td>
    <td><?php echo $support_row['s_Publishtime'];?></td>
    <td><?php echo mb_substr(str_replace("","",strip_tags($support_row['s_Content'])),0,24,'utf-8');?></td>
</tr>
  <?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=40&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=40&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=40&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=40&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=40&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<a href = "?i=41">添加文章</a>
<a href = "?i=42">删除文章</a>
<?php
mysql_free_result($support_result);
break;
case 41:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=46" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">标题<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_SupportName" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>

  <tr>
  <td>内容<a style = "float:right">*</a></td>
    <td><textarea name = "s_Content" class = "table_Content" required = "required" ></textarea></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 42:
if($group < 150)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=47" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_SupportId"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
<tr>
	<td>文章名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_SupportName" type = "text"  class = "table_Name" required = "required" maxlength = 20 /></td>
    </tr>
<tr>
	<td>作者名称<a style = "float:right">*</a></td>
    <td><input name = "s_Author" class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
    </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确认删除  " class = "left" />
</form>
<?php
break;
case 46:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$supportname = $_POST['s_SupportName'];

$content = str_replace(chr(13),'<br>',$_POST['s_Content']); 
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $supportname)){
    echo '错误：标题长度需大于2个字并小于20个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
if(strlen($content) < 80){
    echo '错误：内容长度应大于20个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
$check_query = mysql_query("select s_SupportName from t_Support where s_SupportName = '$supportname' limit 1");
if(mysql_fetch_array($check_query)){
    echo '错误：文章名称 ',$showname,' 已存在。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
$support_into_sql = "INSERT INTO `t_Support`(s_SupportName,s_Author,s_GroupId,s_PublishIp,s_Publishtime,s_Content)VALUES('$supportname','$name','$group','$ip','$regdate','$content')";

if(mysql_query($support_into_sql,$con)){
    echo '文章发布成功！<a href = "?i=40">返回</a>';
   		break;
} else {
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
}

break;
case 47:

if(!isset($_POST['submit'])){
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$supportid = $_POST['s_SupportId'];
$upportname = $_POST['s_SupportName'];
$author = $_POST['s_Author'];
//验证ID
$check_query = mysql_query("select s_SupportId from t_Support where s_SupportId = '$supportid'");
if(!mysql_fetch_array($check_query)){
    echo '错误：文章编号：',$supportid,' 不存在<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应的名称
$check_query = mysql_query("select s_SupportId from t_Support where s_SupportId = '$supportid' && s_SupportName = '$upportname'");
if(!mysql_fetch_array($check_query)){
    echo '错误：文章编号：',$supportid,' 与文章名称 ：',$upportname,' 不匹配，请输入正确ID。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应的名称的作者
$check_query = mysql_query("select s_SupportId from t_Support where s_SupportId = '$supportid' && s_SupportName = '$upportname' && s_Author = '$author'");
if(!mysql_fetch_array($check_query)){
    echo '错误：文章：',$upportname,'与作者：',$author,' 不匹配，请输核实。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select s_SupportId from t_Support where s_SupportId = '$supportid' && s_SupportName = '$upportname' && s_Author = '$author' && s_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
    echo '错误：用户权限小于对方，无法删除：',$upportname,'<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}

//删除数据

	$support_delete_sql = "DELETE FROM t_Support WHERE s_SupportId = '$supportid' && s_SupportName = '$upportname' && s_Author = '$author' && s_GroupId <= '$group'";
	if(mysql_query($support_delete_sql,$con))
	{
		echo '文章删除成功！点击此处<a href = "?i=40">返回</a>';
   		break;
	}
	else
	{
		echo '抱歉！删除数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
	}

break;
case 50:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:140px">注释1</td>
    <td style = "width:160px">注释2</td>
    <td style = "width:90px">电话</td>
    <td style = "width:80px">市区</td>
    <td style = "width:90px">路号</td>
    <td style = "width:90px">楼号</td>
    <td style = "width:30px">房号</td>
    <td style = "width:50px">邮编</td>
    <td style = "width:50px">添加人员</td>
  </tr>
    <?php
	$contact_select_sql = "SELECT `c_ContactId`,`c_Phone`,`c_Address1`,`c_Address2`,`c_Address3`,`c_Address4`,`c_code`,`c_Author` FROM `t_Contact` order by c_ContactId ";
  	$contact_result = mysql_query($contact_select_sql) or die("联系我们查询失败!");
	while ($contact_row = mysql_fetch_array($contact_result)) 
{?>
<tr>
    <td><?php echo $contact_row['c_ContactId'];?></td>
    <td><?php echo $contact_row['c_Phone'];?></td>
    <td><?php echo $contact_row['c_Address1'];?></td>
    <td><?php echo $contact_row['c_Address2'];?></td>
    <td><?php echo $contact_row['c_Address3'];?></td>
    <td><?php echo $contact_row['c_Address4'];?></td>
    <td><?php echo $contact_row['c_code'];?></td>
    <td><?php echo $contact_row['c_Author'];?></td>
</tr>
  <?php
}
  ?>
</table>
<a href = "?i=51">添加信息</a>
<a href = "?i=52">删除信息</a>
<?php
mysql_free_result($contact_result);
break;
case 51:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
	$contact_result = mysql_query("select count(*) from t_Contact");
	list($contact_result_count) = mysql_fetch_row($contact_result);
	if($contact_result_count >= 5)
	{
		echo'地址信息达到上限。请删除后在添加<a href = "javascript:history.back(-1);">返回</a>';
   		break;
	}
	else

?>
<form name = "RegForm" method = "post" action = "?i=56" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
    <td style = "width:80px">电话<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "c_Phone"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 13 required = "required" /></td>
  </tr>
  <tr>
    <td>市区<a style = "float:right">*</a></td>
    <td><input name = "c_Address1" type = "text" class = "table_Name"  maxlength = 10 required = "required" /></td>
  </tr>
  <tr>
    <td>路号<a style = "float:right">*</a></td>
    <td><input name = "c_Address2" type = "text" class = "table_Name"  maxlength = 20 required = "required" /></td>
  </tr>
  <tr>
    <td>楼号<a style = "float:right">*</a></td>
    <td><input name = "c_Address3" type = "text" class = "table_Name"  maxlength = 10 required = "required" /></td>
  </tr>
  <tr>
    <td>房号<a style = "float:right">*</a></td>
    <td><input name = "c_Address4"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 5 required = "required"/></td>
  </tr>
  <tr>
    <td>邮编<a style = "float:right">*</a></td>
    <td><input name = "c_code"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 6 required = "required"/></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 52:
if($group < 150)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=57" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "c_ContactId"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>添加人名称<a style = "float:right">*</a></td>
    <td><input name = "c_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确认删除  " class = "left" />
</form>
<?php
break;
case 56:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$phone = $_POST['c_Phone'];
$address1 = $_POST['c_Address1'];
$address2 = $_POST['c_Address2'];
$address3 = $_POST['c_Address3'];
$address4 = $_POST['c_Address4'];
$code = $_POST['c_code'];
$check_query = mysql_query("select c_Phone from t_Contact where c_Phone = '$phone' and c_Address1 = '$address1' and  c_Address2 = '$address2' and  c_Address3 = '$address3' and  c_Address4 = '$address4'  limit 1");
if(mysql_fetch_array($check_query)){
    echo '错误：地址已存在 ',$address1,'——',$address2,'——',$address3,'——',$address4,' 已存在。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
$contact_into_sql = "INSERT INTO `t_Contact`(c_Phone,c_Address1,c_Address2,c_Address3,c_Address4,c_Code,c_Author,c_GroupId)
VALUES('$phone','$address1','$address2','$address3','$address4','$code','$name','$group')";
if(mysql_query($contact_into_sql,$con)){
    echo '新地址添加成功！<a href = "?i=50">返回</a>';
   		break;
} else {
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
}
break;
case 57:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$contactid = $_POST['c_ContactId'];
$author = $_POST['c_Author'];
//验证ID
$check_query = mysql_query("select c_ContactId from t_Contact where c_ContactId = '$contactid'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$contactid,' 不存在<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应作者
$check_query = mysql_query("select c_ContactId from t_Contact where c_ContactId = '$contactid' && c_Author = '$author'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$contactid,' 与人员 ：',$author,' 不匹配，请输入正确ID。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select c_ContactId from t_Contact where c_ContactId = '$contactid' && c_Author = '$author' && c_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
    echo '错误：用户权限小于对方，无法删除ID为：',$contactid,'的数据<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//删除数据

	$contact_delete_sql = "DELETE FROM t_Contact WHERE c_ContactId = '$contactid' && c_Author = '$author' && c_GroupId <= '$group'";
	if(mysql_query($contact_delete_sql,$con))
	{
		echo '地址删除成功！点击此处<a href = "?i=50">返回</a>';
   		break;
	}
	else
	{
		echo '抱歉！删除数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
	}

break;
case 60:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:140px">标题</td>
    <td style = "width:60px">作者</td>
    <td style = "width:80px">发表IP</td>
    <td style = "width:130px">发表日期</td>
    <td style = "width:300px">内容</td>
  </tr>
    <?php
		$Page_size=10; 
	$result=mysql_query('select * from t_About'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_GET['page'])||$_GET['page']<0){ 
	$page=1; 
	}else { 
	$page=$_GET['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$about_select_sql = "SELECT `a_AboutId`,`a_AboutName`,`a_Author`,`a_PublishIp`,`a_Publishtime`,`a_Content` FROM `t_About` order by a_AboutId limit $offset,$Page_size";
  	$about_result = mysql_query($about_select_sql) or die("关于我们查询失败!");
	while ($about_row = mysql_fetch_array($about_result)) 
{?>
<tr>
    <td><?php echo $about_row['a_AboutId'];?></td>
    <td><?php echo mb_substr($about_row['a_AboutName'],0,11,'utf-8');?></td>
    <td><?php echo $about_row['a_Author'];?></td>
    <td><?php echo $about_row['a_PublishIp'];?></td>
    <td><?php echo $about_row['a_Publishtime'];?></td>
    <td><?php echo mb_substr(str_replace("","",strip_tags($about_row['a_Content'])),0,24,'utf-8');?></td>
</tr>
  <?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=60&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=60&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=60&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=60&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=60&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<a href = "?i=61">添加信息</a>
<a href = "?i=62">删除信息</a>
<?php
mysql_free_result($about_result);
break;
case 61:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=66" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">标题<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "a_AboutName" type = "text" class = "table_Name"  class = "input_name" required = "required" maxlength = 20 /></td>

  <tr>
  <td>内容<a style = "float:right">*</a></td>
    <td><textarea name = "a_Content" class = "table_Content" required = "required" ></textarea></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 62:
if($group < 150)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=67" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "a_AboutId"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>标题<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "a_AboutName" type = "text" class = "table_Name"  required = "required" maxlength = 20 /></td>
  </tr>
  <tr>
    <td>作者<a style = "float:right">*</a></td>
    <td><input name = "a_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确认删除  " class = "left" />
</form>
<?php
break;
case 66:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$aboutname = $_POST['a_AboutName'];

$content = str_replace(chr(13),'<br>',$_POST['a_Content']); 
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $aboutname)){
    echo '错误：标题长度需大于2个字并小于20个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
if(strlen($content) < 80){
    exit('错误：内容长度应大于20个字。<a href = "javascript:history.back(-1);">返回</a>');
   		break;
}
$check_query = mysql_query("select a_AboutName from t_About where a_AboutName = '$aboutname' limit 1");
if(mysql_fetch_array($check_query)){
    echo '错误：文章名称 ',$aboutname,' 已存在。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
$about_into_sql = "INSERT INTO `t_About`(a_AboutName,a_Author,a_GroupId,a_PublishIp,a_Publishtime,a_Content)VALUES('$aboutname','$name','$group','$ip','$regdate','$content')";

if(mysql_query($about_into_sql,$con)){
    echo '文章发布成功！<a href = "?i=60">返回</a>';
   		break;
} else {
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
}
break;
case 67:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$aboutid = $_POST['a_AboutId'];
$author = $_POST['a_Author'];
//验证ID
$check_query = mysql_query("select a_AboutId from t_About where a_AboutId = '$aboutid'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$aboutid,' 不存在<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应作者
$check_query = mysql_query("select a_AboutId from t_About where a_AboutId = '$aboutid' && a_Author = '$author'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$aboutid,' 与人员 ：',$author,' 不匹配，请输入正确ID。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select a_AboutId from t_About where a_AboutId = '$aboutid' && a_Author = '$author' && a_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
    echo '错误：用户权限小于对方，无法删除ID为：',$aboutid,'的数据<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//删除数据

	$adout_delete_sql = "DELETE FROM t_About WHERE a_AboutId = '$aboutid' && a_Author = '$author' && a_GroupId <= '$group'";
	if(mysql_query($adout_delete_sql,$con))
	{
		echo '文章删除成功！点击此处<a href = "?i=60">返回</a>';
   		break;
	}
	else
	{
		echo '抱歉！删除数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
	}
break;
case 70:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:140px">产品名称</td>
    <td style = "width:60px">发布人</td>
    <td style = "width:80px">发表IP</td>
    <td style = "width:130px">发表时间</td>
    <td style = "width:300px">产品简介</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from t_Download'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_GET['page'])||$_GET['page']<0){ 
	$page=1; 
	}else { 
	$page=$_GET['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$download_select_sql = "SELECT `d_DownloadId`,`d_DownloadName`,`d_Author`,`d_PublishIp`,`d_Publishtime`,`d_Introduction` FROM `t_Download` order by d_DownloadId limit $offset,$Page_size";
  	$download_result = mysql_query($download_select_sql) or die("产品下载查询失败!");
	while ($download_row = mysql_fetch_array($download_result)) 
{?>
<tr>
    <td><?php echo $download_row['d_DownloadId'];?></td>
    <td><?php echo mb_substr($download_row['d_DownloadName'],0,12,'utf-8');?></td>
    <td><?php echo $download_row['d_Author'];?></td>
    <td><?php echo $download_row['d_PublishIp'];?></td>
    <td><?php echo $download_row['d_Publishtime'];?></td>
    <td><?php echo mb_substr(str_replace("","",strip_tags($download_row['d_Introduction'])),0,24,'utf-8');?></td>
</tr>
  <?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=70&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=70&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=70&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=70&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=70&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<a href = "?i=71">添加信息</a>
<a href = "?i=72">删除信息</a>
<?php
mysql_free_result($download_result);
break;
case 71:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=76" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">产品名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "d_DownloadName" type = "text" class = "table_Name"  required = "required" maxlength = 20/></td>
  </tr>
  <tr>
    <td>产品截图<a style = "float:right">*</a></td>
    <td><input name = "d_Downloadimage" type = "file"></td>
  </tr>
  <tr>
    <td>产品上传<a style = "float:right">*</a></td>
    <td><input name = "d_Downloadname" type = "file"></td>
  </tr>
  <tr>
    <td>产品简介<a style = "float:right">*</a></td>
    <td><textarea name = "d_Introduction" class = "table_Content" required = "required" /></textarea></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 72:
if($group < 150)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=77" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">产品序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "d_DownloadId"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>产品名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "d_DownloadName" type = "text" class = "table_Name"  required = "required" maxlength = 20 /></td>
  </tr>
  <tr>
    <td>发布人<a style = "float:right">*</a></td>
    <td><input name = "d_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确认删除  " class = "left" />
</form>
<?php
break;
case 76:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$downloadname = $_POST['d_DownloadName'];
//允许上传的文件格式
 
$down_image_path = "../file/DowunImage/";        //上传路径  
if(!file_exists($down_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$down_image_path", 0700);  
}
$down_image_type = array("image/gif","image/jpeg","image/pjpeg","image/png","image/x-png","image/bmp");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["d_Downloadimage"]["type"],$down_image_type))  
{  
	echo '图像格式不对<a href = "javascript:history.back(-1);">返回</a>只允许上传gif、jpeg、png、bmp格式图片';  
	break;  
}
if($_FILES["d_Downloadimage"]["name"])  
{  
		$down_image_type1 = $_FILES["d_Downloadimage"]["name"];  
		$down_image_type2 = $down_image_path.time().$down_image_type1;
}
if($_FILES["d_Downloadimage"]["size"]>500000)  
{ 
    echo '错误：产品截图文件大小不得超过500KB<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}
$down_file_path = "../file/DownFile/";        //上传路径 
if(!file_exists($down_file_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$down_file_path", 0700);  
}  
$down_file_type = array("application/zip","application/x-zip-compressed","application/octet-stream"); 
if(!in_array($_FILES["d_Downloadname"]["type"],$down_file_type))  
{  
	echo '文件格式不正确<a href = "javascript:history.back(-1);">返回</a><br>只允许上传zip格式压缩包';  
	break;  
} 
if($_FILES["d_Downloadname"]["name"])  
{  
		$down_file_type1 = $_FILES["d_Downloadname"]["name"];  
		$down_file_type2 = $down_file_path.time().$down_file_type1;
}
if($_FILES["d_Downloadname"]["size"]>50000000)  
{ 
    echo '错误：产品文件大小不得超过50MB<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}
$introduction = str_replace(chr(13),'<br>',$_POST['d_Introduction']);
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $downloadname)){
    echo '错误：标题长度需大于2个字并小于20个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
if(strlen($introduction) < 8){
    exit('错误：内容长度应大于2个字。<a href = "javascript:history.back(-1);">返回</a>');
   		break;
} 

if(@preg_match("/[\x7f-\xff]/","$down_image_type2"))
{
    echo '错误：产品图像名称不能含有中文字符<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}else{
	$down_image_type = move_uploaded_file($_FILES["d_Downloadimage"]["tmp_name"],$down_image_type2);
}

if(@preg_match("/[\x7f-\xff]/","$down_file_type2"))
{
    echo '错误：产品文件名称不能含有中文字符<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}else{
	$down_file_type = move_uploaded_file($_FILES["d_Downloadname"]["tmp_name"],$down_file_type2);
}
$check_query = mysql_query("select d_DownloadName from t_download where d_DownloadName = '$downloadname' limit 1");
if(mysql_fetch_array($check_query)){
    echo '错误：产品 ',$downloadname,' 已存在。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
$download_into_sql = "INSERT INTO `t_Download`(d_DownloadName,d_DownloadImage,d_Author,d_GroupId,d_PublishIp,d_Publishtime,d_Address,d_Introduction)
VALUES('$downloadname','$down_image_type2','$name','$group','$ip','$regdate','$down_file_type2','$introduction')";
if(mysql_query($download_into_sql,$con)){
    echo '产品发布成功！<a href = "?i=70">返回</a>';
   		break;
} else {
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
}
break;
case 77:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$downloadid = $_POST['d_DownloadId'];
$downloadname = $_POST['d_DownloadName'];
$author = $_POST['d_Author'];
//验证ID
$check_query = mysql_query("select d_DownloadId from t_Download where d_DownloadId = '$downloadid'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$downloadid,' 不存在<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应作者
$check_query = mysql_query("select d_DownloadId from `t_Download` where d_DownloadId = '$downloadid' && d_DownloadName = '$downloadname'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$downloadid,' 与名称 ：',$downloadname,' 不匹配，请输入正确ID。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}

//验证ID所对应作者
$check_query = mysql_query("select d_DownloadId from `t_Download` where d_DownloadId = '$downloadid' && d_DownloadName = '$downloadname' && d_Author = '$author'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$downloadid,' 与发布人 ：',$author,' 不匹配，请输入正确ID。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select d_DownloadId from `t_Download` where d_DownloadId = '$downloadid' && d_DownloadName = '$downloadname' && d_Author = '$author' && d_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
    echo '错误：用户权限小于对方，无法删除ID为：',$downloadid,'的数据<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
//删除上传的图片
$delete_image = mysql_query("select d_DownloadImage  from `t_Download` where d_DownloadId = '$downloadid' && d_DownloadName = '$downloadname' && d_Author = '$author'");
$delete_image_file = mysql_fetch_array($delete_image);
$file_image = $delete_image_file['d_DownloadImage'];
if (file_exists($file_image))
{
    $delete_image_ok = unlink ($file_image);
}
//删除的文件
$delete_file = mysql_query("select d_Address from `t_Download` where d_DownloadId = '$downloadid' && d_DownloadName = '$downloadname' && d_Author = '$author'");
$delete_file_file = mysql_fetch_array($delete_file);
$file_file = $delete_file_file['d_Address'];
if (file_exists($file_file))
{
    $delete_file_ok = unlink ($file_file);
}
//删除数据
	$download_delete_sql = "DELETE FROM t_Download WHERE d_DownloadId = '$downloadid' && d_DownloadName = '$downloadname' && d_Author = '$author' && d_GroupId <= '$group'";
	if(mysql_query($download_delete_sql,$con))
	{
		echo '文章删除成功！点击此处<a href = "?i=70">返回</a>';
   		break;
	}
	else
	{
		echo '抱歉！删除数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
	}
break;
case 80:
?>
<table align = "center" width = "1600" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:200px">名称</td>
    <td style = "width:300px">介绍</td>
    <td style = "width:80px">发布IP</td>
    <td style = "width:150px">发布时间</td>
    <td style = "width:200px">Android</td>
    <td style = "width:200px">Ios</td>
    <td style = "width:200px">Pc</td>
    <td style = "width:200px">Web</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from t_Game'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_GET['page'])||$_GET['page']<0){ 
	$page=1; 
	}else { 
	$page=$_GET['page']; 
	} 
	$offset=$Page_size*($page-1); 	
	$game_select_sql = "SELECT `g_GameId`,`g_GameName`,`g_Content`,`g_Publishtime`,`g_PublishIp`,`g_AndroidAddress`,`g_IosAddress`,`g_PcAddress`,`g_WebAddress` FROM `t_Game` order by g_GameId limit $offset,$Page_size";
  	$game_result = mysql_query($game_select_sql) or die("公益产品查询失败!");
	while ($game_row = mysql_fetch_array($game_result)) 
	{
		?>
<tr>
    <td><?php echo $game_row['g_GameId'];?></td>
    <td><?php echo mb_substr($game_row['g_GameName'],0,12,'utf-8');?></td>
    <td><?php echo mb_substr(str_replace("","",strip_tags($game_row['g_Content'])),0,24,'utf-8');?></td>
    <td><?php echo $game_row['g_PublishIp'];?></td>
    <td><?php echo $game_row['g_Publishtime'];?></td>
    <td><?php echo mb_substr($game_row['g_AndroidAddress'],20,96,'utf-8');?></td>
    <td><?php echo mb_substr($game_row['g_IosAddress'],16,96,'utf-8');?></td>
    <td><?php echo mb_substr($game_row['g_PcAddress'],15,96,'utf-8');?></td>
    <td><?php echo mb_substr($game_row['g_WebAddress'],16,96,'utf-8');?></td>
</tr>
		<?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=80&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=80&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=80&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=80&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=80&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<a href = "?i=811">添加公益产品</a> |
<a href = "?i=812">上传Android版</a> |
<a href = "?i=813">上传Ios版</a> |
<a href = "?i=814">上传Pc版</a> |
<a href = "?i=815">上传Web版</a> |
<a href = "?i=82">删除信息</a>
<?php
mysql_free_result($game_result);
break;
case 811:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=861" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">公益名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "g_GameName" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
    <tr>
    <td>公益图像<a style = "float:right">*</a></td>
    <td><input name = "g_GameImage" type = "file">
    </td>
  </tr>
  <tr>
    <td>图像大小</td>
    <td>图像大小 宽990px 高390px 只允许上传png图片
    </td>
  </tr>
  <tr>
	<td>内容<a style = "float:right">*</a></td>
    <td><textarea name = "g_Content" class = "table_Content" required = "required" ></textarea></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 812:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=862" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "g_GameId" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td style = "width:80px">公益名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "g_GameName" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td>Android<a style = "float:right">*</a></td>
    <td><input name = "g_AndroidAddress" type = "file"></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 813:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=863" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "g_GameId" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td style = "width:80px">公益名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "g_GameName" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td>Ios<a style = "float:right">*</a></td>
    <td><input name = "g_IosAddress" type = "file"></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 814:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=864" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "g_GameId" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td style = "width:80px">公益名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "g_GameName" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td>Pc<a style = "float:right">*</a></td>
    <td><input name = "g_PcAddress" type = "file"></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 815:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=865" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "g_GameId" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td style = "width:80px">公益名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "g_GameName" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td>Web<a style = "float:right">*</a></td>
    <td><input name = "g_WebAddress" type = "file"></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 82:
if($group < 150)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=87" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "g_GameId"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>公益名称<a style = "float:right">*</a></td>
    <td><input name = "g_GameName" type = "text" class = "table_Name"  required = "required" maxlength = 20 /></td>
  </tr>
    <tr>
        <td>注意！</td>
        <td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
    </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确认删除  " class = "left" />
</form>
<?php
break;
case 861:

if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$gamename = $_POST['g_GameName'];
$game_image_path = "../file/GameImage/";        //上传路径  
if(!file_exists($game_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$game_image_path", 0700);  
} 
//允许上传的文件格式  
$game_image_type =  array("image/jpeg","image/pjpeg","image/png","image/x-png");   
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["g_GameImage"]["type"],$game_image_type))
{  
	echo '图像格式不正确<a href = "javascript:history.back(-1);">返回</a>只允许发布jpg/png类型图片';  
	break;  
} 
if($_FILES["g_GameImage"]["name"])  
{  
		$game_image_type1 = $_FILES["g_GameImage"]["name"];  
		$game_image_type2 = $game_image_path.time().$game_image_type1;
}
if($_FILES["g_GameImage"]["size"]>800000)  
{ 
    echo '错误：头像文件大小不得超过800KB<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $gamename)){
    echo '错误：标题长度需大于2个字并小于20个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
$content = str_replace(chr(13),'<br>',$_POST['g_Content']); 
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $gamename)){
    echo '错误：标题长度需大于2个字并小于20个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
if(strlen($content) < 80){
    exit('错误：内容长度应大于20个字。<a href = "javascript:history.back(-1);">返回</a>');
   		break;
}
$android = $ios = $pc = $web = '';
if(@preg_match("/[\x7f-\xff]/","$game_image_type2"))
{
    echo '错误：文件名称不能含有中文字符<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}else{
	$game_image_type = move_uploaded_file($_FILES["g_GameImage"]["tmp_name"],$game_image_type2);
}
$check_query = mysql_query("select g_GameName from t_Game where g_GameName = '$gamename' limit 1");
if(mysql_fetch_array($check_query)){
    echo '错误：文章名称 ',$gamename,' 已存在。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
$game_into_sql = "INSERT INTO `t_Game`(g_GameName,g_GameImage,g_Content,g_GroupId,g_PublishIp,g_Publishtime,g_AndroidAddress,g_IosAddress,g_PcAddress,g_WebAddress)
VALUES('$gamename','$game_image_type2','$content','$group','$ip','$regdate','$android','$ios','$pc','$web')";

if(mysql_query($game_into_sql,$con)){
    echo '公益发布成功！<a href = "?i=80">返回</a>';
   		break;
} else {
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
}
break;
case 862:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$gamename = $_POST['g_GameName'];
$gameid = $_POST['g_GameId'];
$game_android_path = "../file/GameAndroid/";        //上传Android路径  
if(!file_exists($game_android_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$game_android_path", 0700);  
}
//允许上传的文件格式
$game_android_type = array("application/zip","application/x-zip-compressed","application/octet-stream"); 
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["g_AndroidAddress"]["type"],$game_android_type))  
{  
	echo 'Android文件格式不对<a href = "javascript:history.back(-1);">返回</a>只允许上传zip格式文件';  
	break;  
}
if($_FILES["g_AndroidAddress"]["name"])  
{  
		$game_android_type1 = $_FILES["g_AndroidAddress"]["name"];  
		$game_android_type2 = $game_android_path.time().$game_android_type1;
}
if($_FILES["g_AndroidAddress"]["size"]>50000000)  
{ 
    echo '错误：文件大小不得超过50MB<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}

if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $gamename)){
    echo '错误：标题长度需大于2个字并小于20个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}

if(@preg_match("/[\x7f-\xff]/","$game_android_type2"))
{
    echo '错误：文件名称不能含有中文字符<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}else{
	$game_android_type = move_uploaded_file($_FILES["g_AndroidAddress"]["tmp_name"],$game_android_type2);
}
$game_result = mysql_query("select count(*) from `t_Game`");
list($game_result_count) = mysql_fetch_row($game_result);
if($game_result_count < 1)
{
	$game_into_sql = "INSERT INTO `t_Game`(g_GameName,g_GroupId,g_PublishIp,g_Publishtime,g_AndroidAddress)
	VALUES('$gamename','$group','$ip','$regdate','$game_android_type2')";
	if(mysql_query($game_into_sql,$con)){
		echo '公益产品发布成功！<a href = "?i=80">返回</a>';
			break;
	} else {
		echo '抱歉！添加数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
			break;
	}
}else
{
	$game_update_sql = "update `t_Game` set 
	g_GameName = '$gamename',
	g_GroupId = '$group',
	g_PublishIp = '$ip',
	g_Publishtime = '$regdate',
	g_AndroidAddress = '$game_android_type2'
	where g_GameId = $gameid";
	if(mysql_query($game_update_sql,$con)){
		echo '公益产品发布成功！<a href = "?i=80">返回</a>';
			break;
	} else {
		echo '抱歉！添加数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
			break;
	}
}
break;
case 863:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$gamename = $_POST['g_GameName'];
$gameid = $_POST['g_GameId'];
$game_ios_path = "../file/GameIos/";        //上传Ios路径  
if(!file_exists($game_ios_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$game_ios_path", 0700);  
}
//允许上传的文件格式
$game_ios_type = array("application/zip","application/x-zip-compressed","application/octet-stream"); 
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["g_IosAddress"]["type"],$game_ios_type))  
{  
	echo 'Ios文件格式不对<a href = "javascript:history.back(-1);">返回</a>只允许上传zip格式文件';  
	break;  
}
if($_FILES["g_IosAddress"]["name"])  
{  
		$game_ios_type1 = $_FILES["g_IosAddress"]["name"];  
		$game_ios_type2 = $game_ios_path.time().$game_ios_type1;
}
if($_FILES["g_IosAddress"]["size"]>50000000)  
{ 
    echo '错误：文件大小不得超过50MB<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}

if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $gamename)){
    echo '错误：标题长度需大于2个字并小于20个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}

if(@preg_match("/[\x7f-\xff]/","$game_ios_type2"))
{
    echo '错误：文件名称不能含有中文字符<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}else{
	$game_ios_type = move_uploaded_file($_FILES["g_IosAddress"]["tmp_name"],$game_ios_type2);
}
$game_result = mysql_query("select count(*) from `t_Game`");
list($game_result_count) = mysql_fetch_row($game_result);
if($game_result_count < 1)
{
	$game_into_sql = "INSERT INTO `t_Game`(g_GameName,g_GroupId,g_PublishIp,g_Publishtime,g_IosAddress)
	VALUES('$gamename','$group','$ip','$regdate','$game_ios_type2')";
	if(mysql_query($game_into_sql,$con)){
		echo '公益产品发布成功！<a href = "?i=80">返回</a>';
			break;
	} else {
		echo '抱歉！添加数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
			break;
	}
}else
{
	$game_update_sql = "update `t_Game` set 
	g_PublishIp = '$ip',
	g_Publishtime = '$regdate',
	g_IosAddress = '$game_ios_type2'
	where g_GameId = $gameid";
	if(mysql_query($game_update_sql,$con)){
		echo '公益产品发布成功！<a href = "?i=80">返回</a>';
			break;
	} else {
		echo '抱歉！添加数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
			break;
	}
}

break;
case 864:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$gamename = $_POST['g_GameName'];
$gameid = $_POST['g_GameId'];
$game_pc_path = "../file/GamePc/";        //上传Pc路径  
if(!file_exists($game_pc_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$game_pc_path", 0700);  
}
//允许上传的文件格式
$game_pc_type = array("application/zip","application/x-zip-compressed","application/octet-stream"); 
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["g_PcAddress"]["type"],$game_pc_type))  
{  
	echo 'Pc文件格式不对<a href = "javascript:history.back(-1);">返回</a>只允许上传zip格式文件';  
	break;  
}
if($_FILES["g_PcAddress"]["name"])  
{  
		$game_pc_type1 = $_FILES["g_PcAddress"]["name"];  
		$game_pc_type2 = $game_pc_path.time().$game_pc_type1;
}
if($_FILES["g_PcAddress"]["size"]>50000000)  
{ 
    echo '错误：文件大小不得超过50MB<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}

if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $gamename)){
    echo '错误：标题长度需大于2个字并小于20个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}

if(@preg_match("/[\x7f-\xff]/","$game_pc_type2"))
{
    echo '错误：文件名称不能含有中文字符<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}else{
	$game_pc_type = move_uploaded_file($_FILES["g_PcAddress"]["tmp_name"],$game_pc_type2);
}
$game_result = mysql_query("select count(*) from `t_Game`");
list($game_result_count) = mysql_fetch_row($game_result);
if($game_result_count < 1)
{
	$game_into_sql = "INSERT INTO `t_Game`(g_GameName,g_GroupId,g_PublishIp,g_Publishtime,g_PcAddress)
	VALUES('$gamename','$group','$ip','$regdate','$game_pc_type2')";
	if(mysql_query($game_into_sql,$con)){
		echo '公益产品发布成功！<a href = "?i=80">返回</a>';
			break;
	} else {
		echo '抱歉！添加数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
			break;
	}
}else
{
	$game_update_sql = "update `t_Game` set 
	g_PublishIp = '$ip',
	g_Publishtime = '$regdate',
	g_PcAddress = '$game_pc_type2'
	where g_GameId = $gameid";
	if(mysql_query($game_update_sql,$con)){
		echo '公益产品发布成功！<a href = "?i=80">返回</a>';
			break;
	} else {
		echo '抱歉！添加数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
			break;
	}
}

break;
case 865:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
echo "web上传中";
$gamename = $_POST['g_GameName'];
$gameid = $_POST['g_GameId'];
$game_web_path = "../file/GameWeb/";        //上传Web路径  
if(!file_exists($game_web_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$game_web_path", 0700);  
}
//允许上传的文件格式
$game_web_type = array("application/zip","application/x-zip-compressed","application/octet-stream"); 
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["g_WebAddress"]["type"],$game_web_type))  
{  
	echo 'Web文件格式不对<a href = "javascript:history.back(-1);">返回</a>只允许上传zip格式文件';  
	break;  
}
if($_FILES["g_WebAddress"]["name"])  
{  
		$game_web_type1 = $_FILES["g_WebAddress"]["name"];  
		$game_web_type2 = $game_web_path.time().$game_web_type1;
}
if($_FILES["g_WebAddress"]["size"]>50000000)  
{ 
    echo '错误：文件大小不得超过50MB<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}

if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $gamename)){
    echo '错误：标题长度需大于2个字并小于20个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}

if(@preg_match("/[\x7f-\xff]/","$game_web_type2"))
{
    echo '错误：文件名称不能含有中文字符<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}else{
	$game_web_type = move_uploaded_file($_FILES["g_WebAddress"]["tmp_name"],$game_web_type2);
}
$game_result = mysql_query("select count(*) from `t_Game`");
list($game_result_count) = mysql_fetch_row($game_result);
if($game_result_count < 1)
{
	$game_into_sql = "INSERT INTO `t_Game`(g_GameName,g_GroupId,g_PublishIp,g_Publishtime,g_WebAddress)
	VALUES('$gamename','$group','$ip','$regdate','$game_web_type2')";
	if(mysql_query($game_into_sql,$con)){
		echo '公益产品发布成功！<a href = "?i=80">返回</a>';
			break;
	} else {
		echo '抱歉！添加数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
			break;
	}
}else
{
	$game_update_sql = "update `t_Game` set 
	g_PublishIp = '$ip',
	g_Publishtime = '$regdate',
	g_WebAddress = '$game_web_type2'
	where g_GameId = $gameid";
	if(mysql_query($game_update_sql,$con)){
		echo '公益产品发布成功！<a href = "?i=80">返回</a>';
			break;
	} else {
		echo '抱歉！添加数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
			break;
	}
}

break;
case 87:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$gameid = $_POST['g_GameId'];
$gamename = $_POST['g_GameName'];
//验证ID
$check_query = mysql_query("select g_GameId from `t_Game` where g_GameId = '$gameid'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$gameid,' 不存在<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应名称
$check_query = mysql_query("select g_GameId from `t_Game` where g_GameId = '$gameid' && g_GameName = '$gamename'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$gameid,' 与名称 ：',$gamename,' 不匹配，请输入正确ID。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select g_GameId from `t_Game` where g_GameId = '$gameid' && g_GameName = '$gamename' && g_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
    echo '错误：用户权限小于对方，无法删除ID为：',$gameid,'的数据<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}
//删除image文件
$delete_image = mysql_query("select g_GameImage from `t_Game` where g_GameId = '$gameid' && g_GameName = '$gamename' && g_GroupId <= '$group'");
$delete_image_file = mysql_fetch_array($delete_image);
$file_image = $delete_image_file['g_GameImage'];
if (file_exists($file_image))
{
    $delete_image_ok = unlink ($file_image);
}
//删除Android文件
$delete_Android = mysql_query("select g_AndroidAddress from `t_Game` where g_GameId = '$gameid' && g_GameName = '$gamename' && g_GroupId <= '$group'");
$delete_Android_file = mysql_fetch_array($delete_Android);
$file_Android = $delete_Android_file['g_AndroidAddress'];
if (file_exists($file_Android))
{
    $delete_Android_ok = unlink ($file_Android);
}
//删除Ios文件
$delete_Ios = mysql_query("select g_IosAddress from `t_Game` where g_GameId = '$gameid' && g_GameName = '$gamename' && g_GroupId <= '$group'");
$delete_Ios_file = mysql_fetch_array($delete_Ios);
$file_Ios = $delete_Ios_file['g_IosAddress'];
if (file_exists($file_Ios))
{
    $delete_Ios_ok = unlink ($file_Ios);
}
//删除Pc文件
$delete_Pc = mysql_query("select g_PcAddress from `t_Game` where g_GameId = '$gameid' && g_GameName = '$gamename' && g_GroupId <= '$group'");
$delete_Pc_file = mysql_fetch_array($delete_Pc);
$file_Pc = $delete_Pc_file['g_PcAddress'];
if (file_exists($file_Pc))
{
    $delete_Pc_ok = unlink ($file_Pc);
}
//删除Web文件
$delete_Web = mysql_query("select g_WebAddress from `t_Game` where g_GameId = '$gameid' && g_GameName = '$gamename' && g_GroupId <= '$group'");
$delete_Web_file = mysql_fetch_array($delete_Web);
$file_Web = $delete_Web_file['g_WebAddress'];
if (file_exists($file_Web))
{
    $delete_Web_ok = unlink ($file_Web);
}
//删除数据
$staff_delete_sql = "DELETE FROM `t_Game` WHERE g_GameId = '$gameid' && g_GameName = '$gamename' && g_GroupId <= '$group'";
if(mysql_query($staff_delete_sql,$con))
{
	echo '数据删除成功！点击此处<a href = "?i=80">返回</a>';
	break;
}
else
{
	echo '抱歉！数据删除失败：',mysql_error(),'<br />';
	echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
	break;
}
break;
case 90:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:50px">姓名</td>
    <td style = "width:80px">发表IP</td>
    <td style = "width:140px">发表日期</td>
    <td style = "width:380px">简介</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from t_Staff'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_GET['page'])||$_GET['page']<0){ 
	$page=1; 
	}else { 
	$page=$_GET['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$staff_select_sql = "SELECT `s_StaffId`,`s_StaffName`,`s_PublishIp`,`s_Publishtime`,`s_Address`,`s_Introduction` FROM `t_Staff` order by s_StaffId limit $offset,$Page_size";
  	$staff_result = mysql_query($staff_select_sql) or die("企业员工查询失败!");
	while ($staff_row = mysql_fetch_array($staff_result)) 
	{
		?>
<tr>
    <td><?php echo $staff_row['s_StaffId'];?></td>
    <td><?php echo $staff_row['s_StaffName'];?></td>
    <td><?php echo $staff_row['s_PublishIp'];?></td>
    <td><?php echo $staff_row['s_Publishtime'];?></td>
    <td><?php echo mb_substr(str_replace("","",strip_tags($staff_row['s_Introduction'])),0,22,'utf-8');?></td>
</tr>
		<?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=90&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=90&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=90&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=90&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=90&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<a href = "?i=91">添加信息</a>
<a href = "?i=92">删除信息</a>
<?php
mysql_free_result($staff_result);
break;
case 91:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=96" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">姓名<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_StaffName" type = "text" class = "table_Name"  required = "required"  maxlength = 4 /></td>
  </tr>
  <tr>
    <td>头像<a style = "float:right">*</a></td>
    <td><input name = "s_StaffImage" type = "file">
    </td>
  </tr>
  <tr>
    <td>头像大小</td>
    <td>头像大小建议 宽238像素 高180像素 最佳
    </td>
  </tr>
  <tr>
    <td>个人主页</td>
    <td><input name = "s_Address" type = "text"  class = "table_Name" maxlength = 64/></td>
  </tr>
  <tr>
  <td>简介<a style = "float:right">*</a></td>
    <td><textarea name = "s_Introduction" class = "table_Content" required = "required" maxlength = 100 ></textarea></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 92:
if($group < 150)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=97" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_StaffId"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>姓名<a style = "float:right">*</a></td>
    <td><input name = "s_StaffName" type = "text" class = "table_Name" maxlength = 4 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 96:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$staffname = $_POST['s_StaffName'];
$staff_image_path = "../file/StaffImage/";        //上传路径  
if(!file_exists($staff_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$staff_image_path", 0700);  
} 
//允许上传的文件格式  
$staff_image_type = array("image/gif","image/jpeg","image/pjpeg","image/png","image/x-png","image/bmp");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["s_StaffImage"]["type"],$staff_image_type))
{  
	echo '员工头像格式不正确<a href = "javascript:history.back(-1);">返回</a>';  
	break;  
} 
if($_FILES["s_StaffImage"]["name"])  
{  
		$staff_image_type1 = $_FILES["s_StaffImage"]["name"];  
		$staff_image_type2 = $staff_image_path.time().$staff_image_type1;
}
if($_FILES["s_StaffImage"]["size"]>200000)  
{ 
    echo '错误：头像文件大小不得超过200KB<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}
$address = $_POST['s_Address'];
$introduction = $_POST['s_Introduction']; 
if(!preg_match('/^[\w\x80-\xff]{4,16}$/', $staffname)){
    echo '错误：姓名需大于1个字并小于4个字。<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}
if(@preg_match("/[\x7f-\xff]/","$staff_image_type2"))
{
    echo '错误：头像文件名称不能含有中文字符<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}else{
	$staff_image_type = move_uploaded_file($_FILES["s_StaffImage"]["tmp_name"],$staff_image_type2);
}
if('' == $address)
{
	$address = 'title = "不好意思，我真的没有主页"';
	}else{
			$address = 'href = "http://'.$address.'" title = "我有个人主页噢。嘿嘿。快点我的名字！" target = "_blank"';
		}
if(strlen($introduction) > 400){
    echo '错误：简介长度应小于100个字。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
$check_query = mysql_query("select s_StaffName from t_Staff where s_StaffName = '$staffname' limit 1");
if(mysql_fetch_array($check_query)){
    echo '错误：员工 ',$staffname,' 已存在。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
$staff_into_sql = "INSERT INTO `t_Staff`(s_StaffName,s_StaffImage,s_GroupId,s_PublishIp,s_Publishtime,s_Address,s_Introduction)
VALUES('$staffname','$staff_image_type2','$group','$ip','$regdate','$address','$introduction')";

if(mysql_query($staff_into_sql,$con)){
    echo '员工添加成功！<a href = "?i=90">返回</a>';
   		break;
} else {
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
}
break;
case 97:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$staffid = $_POST['s_StaffId'];
$staffname = $_POST['s_StaffName'];
//验证ID
$check_query = mysql_query("select s_StaffId from t_Staff where s_StaffId = '$staffid'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$staffid,' 不存在<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}
//验证ID所对应作者
$check_query = mysql_query("select s_StaffId from t_Staff where s_StaffId = '$staffid' && s_StaffName = '$staffname'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$staffid,' 与标题 ：',$staffname,' 不匹配，请输入正确ID。<a href = "javascript:history.back(-1);">返回</a>';
   		break;
}

//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select s_StaffId from t_Staff where s_StaffId = '$staffid' && s_StaffName = '$staffname' && s_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
    echo '错误：用户权限小于对方，无法删除ID为：',$staffid,'的数据<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}

//删除的文件
$delete_image = mysql_query("select s_StaffImage from t_Staff where s_StaffId = '$staffid' && s_StaffName = '$staffname' && s_GroupId <= '$group'");
$delete_file = mysql_fetch_array($delete_image);
$file = $delete_file['s_StaffImage'];
if (file_exists($file))
{
    $delete_ok = unlink ($file);
}
//删除数据
$staff_delete_sql = "DELETE FROM t_Staff WHERE s_StaffId = '$staffid' && s_StaffName = '$staffname' && s_GroupId <= '$group'";
if(mysql_query($staff_delete_sql,$con))
{
	echo '员工数据删除成功！点击此处<a href = "?i=90">返回</a>';
	break;
}
else
{
	echo '抱歉！员工数据失败：',mysql_error(),'<br />';
	echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
	break;
}
break;
case 100:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:50px">名称</td>
    <td style = "width:80px">地址</td>
    <td style = "width:80px">主题</td>
    <td style = "width:400px">内容</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from t_Message'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_GET['page'])||$_GET['page']<0){ 
	$page=1; 
	}else { 
	$page=$_GET['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$message_select_sql = "SELECT `m_MessageId`,`m_Name`,`m_Email`,`m_Subject`,`m_Content` FROM `t_Message` order by m_MessageId limit $offset,$Page_size";
  	$message_result = mysql_query($message_select_sql) or die("访客留言查询失败!");
	while ($message_row = mysql_fetch_array($message_result)) 
	{
	?>
<tr>
    <td><?php echo $message_row['m_MessageId'];?></td>
    <td><?php echo $message_row['m_Name'];?></td>
    <td><?php echo $message_row['m_Email'];?></td>
    <td><?php echo $message_row['m_Subject'];?></td>
    <td><?php echo str_replace("","",strip_tags($message_row['m_Content']));?></td>
</tr>
	<?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=100&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=100&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=100&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=100&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=100&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<a href = "?i=102">删除信息</a>
<?php
mysql_free_result($message_result);
break;
case 102:
if($group < 150)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=107" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "m_MessageId" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "m_Name" type = "text" class = "table_Name"  required = "required" maxlength = 32 /></td>
  </tr>
  <tr>
    <td>主题<a style = "float:right">*</a></td>
    <td><input name = "m_Subject" class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确认删除  " class = "left" />
</form>
<?php
break;
case 107:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$messageid = $_POST['m_MessageId'];
$messagename = $_POST['m_Name'];
$subject = $_POST['m_Subject'];
//验证ID
$check_query = mysql_query("select m_MessageId from t_Message where m_MessageId = '$messageid'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$messageid,' 不存在<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
//验证ID所对应作者
$check_query = mysql_query("select m_MessageId from t_Message where m_MessageId = '$messageid' && m_Name = '$messagename'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$messageid,' 与主题 ：',$messagename,' 不匹配，请输入正确ID。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
$check_query = mysql_query("select m_MessageId from t_Message where m_MessageId = '$messageid' && m_Name = '$messagename'&& m_Subject = '$subject'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$messageid,' 与内容 ：',$subject,' 不匹配，请输入正确ID。<a href = "javascript:history.back(-1);">返回</a>';
    break;
}
//删除数据

	$message_delete_sql = "DELETE FROM t_Message WHERE m_MessageId = '$messageid' && m_Name = '$messagename' && m_Subject = '$subject'";
	if(mysql_query($message_delete_sql,$con))
	{
		echo '留言删除成功！点击此处<a href = "?i=100">返回</a>';
   		break;
	}
	else
	{
		echo '抱歉！删除数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
   		break;
	}
break;
case 110:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:140px">标题</td>
    <td style = "width:60px">作者</td>
    <td style = "width:80px">发表IP</td>
    <td style = "width:130px">发表日期</td>
    <td style = "width:300px">内容</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from t_Slide'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_GET['page'])||$_GET['page']<0){ 
	$page=1; 
	}else { 
	$page=$_GET['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$slide_select_sql = "SELECT `s_SlideId`,`s_SlideName`,`s_Author`,`s_PublishIp`,`s_Publishtime`,`s_Content` FROM `t_Slide` order by s_SlideId limit $offset,$Page_size";
  	$slide_result = mysql_query($slide_select_sql) or die("幻灯片查询失败!");
	while ($slide_row = mysql_fetch_array($slide_result)) 
{?>
<tr>
    <td><?php echo $slide_row['s_SlideId'];?></td>
    <td><?php echo mb_substr($slide_row['s_SlideName'],0,12,'utf-8');?></td>
    <td><?php echo $slide_row['s_Author'];?></td>
    <td><?php echo $slide_row['s_PublishIp'];?></td>
    <td><?php echo $slide_row['s_Publishtime'];?></td>
    <td><?php echo mb_substr(str_replace("","",strip_tags($slide_row['s_Content'])),0,24,'utf-8');?></td>
</tr>
  <?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=110&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=110&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=110&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=110&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=110&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<a href = "?i=111">添加信息</a>
<a href = "?i=112">删除信息</a>
<?php
mysql_free_result($slide_result);
break;
case 111:
if($group < 100)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=116" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">标题<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_SlideName" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td>图片<a style = "float:right">*</a></td>
    <td><input name = "s_SlideImage" type = "file"></td>
  </tr>
  <tr>
    <td>图片大小</td>
    <td>图片大小建议 宽1900像素 高480像素 最佳
    </td>
  </tr>
  <tr>
  <td>内容<a style = "float:right">*</a></td>
    <td><textarea name = "s_Content" class = "table_Content" required = "required"></textarea></td>
  </tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确定  " />
</form>
<?php
break;
case 112:
if($group < 150)
{
	 echo'权限不足，无法执行该操作<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=117" onSubmit = "return InputCheck(this)">
<table align = "center" width = "420" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_SlideId" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>标题<a style = "float:right">*</a></td>
    <td><input name = "s_SlideName" type = "text" class = "table_Name"  required = "required" maxlength = 20 /></td>
  </tr>
  <tr>
    <td>作者<a style = "float:right">*</a></td>
    <td><input name = "s_Author" class = "table_Name"  onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
<a href = "javascript:history.back(-1);">返回</a>
<input type = "submit" name = "submit" value = "  确认删除  " class = "left" />
</form>
<?php
break;
case 116:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$slidename = $_POST['s_SlideName'];
$slide_image_path = "../file/SlideImage/";        //幻灯片图片上传路径  
if(!file_exists($slide_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$slide_image_path", 0700);  
} 
//允许上传的文件格式  
$slide_image_type = array("image/gif","image/jpeg","image/pjpeg","image/bmp");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["s_SlideImage"]["type"],$slide_image_type))
{  
	echo '幻灯片图片格式不正确<a href = "javascript:history.back(-1);">返回</a>';  
	break;  
} 
if($_FILES["s_SlideImage"]["name"])  
{  
		$slide_image_type1 = $_FILES["s_SlideImage"]["name"];  
		$slide_image_type2 = $slide_image_path.time().$slide_image_type1;
}
if($_FILES["s_SlideImage"]["size"]>500000)  
{ 
    echo '错误：图片文件大小不得超过500KB<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}
$content = str_replace(chr(13),'<br>',$_POST['s_Content']); 
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $slidename)){
    echo '错误：标题长度需大于2个字并小于20个字。<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
$check_query = mysql_query("select s_SlideName from t_Slide where s_SlideName = '$slidename' limit 1");
if(mysql_fetch_array($check_query)){
    echo '错误：文章名称 ',$slidename,' 已存在。<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
if(@preg_match("/[\x7f-\xff]/","$slide_image_type2"))
{
    echo '错误：图片文件名称不能含有中文字符<a href = "javascript:history.back(-1);">返回</a>';
   	break;
}else{
	$slide_image_type = move_uploaded_file($_FILES["s_SlideImage"]["tmp_name"],$slide_image_type2);
}
$slide_into_sql = "INSERT INTO `t_Slide`(s_SlideImage,s_SlideName,s_Author,s_GroupId,s_PublishIp,s_Publishtime,s_Content)
VALUES('$slide_image_type2','$slidename','$name','$group','$ip','$regdate','$content')";

if(mysql_query($slide_into_sql,$con)){
    echo '文章发布成功！<a href = "?i=110">返回</a>';
	break;
} else {
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
	break;
}
break;
case 117:
if(!isset($_POST['submit']))
{
    echo '非法访问!';
    header("refresh:1;url = ?i=0");
   	break;
}
$slideid = $_POST['s_SlideId'];
$slidename = $_POST['s_SlideName'];
$author = $_POST['s_Author'];
//验证ID
$check_query = mysql_query("select a_AboutId from t_Slide where s_SlideId = '$slideid'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$slideid,' 不存在<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
//验证标题
$check_query = mysql_query("select a_AboutId from t_Slide where s_SlideId = '$slideid'  && s_SlideName = slidename");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$slideid,' 不存在<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
//验证ID所对应作者
$check_query = mysql_query("select a_AboutId from t_Slide where s_SlideId = '$slideid' && s_SlideName = slidename && s_Author = '$author'");
if(!mysql_fetch_array($check_query)){
    echo '错误：编号：',$slideid,' 与人员 ：',$author,' 不匹配，请输入正确ID。<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select a_AboutId from t_Slide where s_SlideId = '$slideid' && s_SlideName = slidename && s_Author = '$author' && s_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
    echo '错误：用户权限小于对方，无法删除ID为：',$slideid,'的数据<a href = "javascript:history.back(-1);">返回</a>';
	break;
}
//删除的文件
$delete_image = mysql_query("select s_SlideImage from t_Slide where s_SlideId = '$slideid' && s_SlideName = slidename");
$delete_file = mysql_fetch_array($delete_image);
$file = $delete_file['s_SlideImage'];
if (file_exists($file))
{
    $delete_ok = unlink ($file);
}
//删除数据
	$slide_delete_sql = "DELETE FROM t_Slide WHERE s_SlideId = '$slideid' && s_SlideName = slidename && s_Author = '$author' && a_GroupId <= '$group'";
	if(mysql_query($slide_delete_sql,$con))
	{
		echo '文章删除成功！点击此处<a href = "?i=110">返回</a>';
		break;
	}
	else
	{
		echo '抱歉！删除数据失败：',mysql_error(),'<br />';
		echo '点击此处 <a href = "javascript:history.back(-1);">返回</a> 重试';
		break;
	}

break;
case 120:
?>
		  注：全站带*号的为必填项
	<br />一、后台首页：显示当前登陆用户的基础信息，其中包括用户名、当前日期、登陆IP、登陆次数。
    <br />二、个人资料：显示当前登陆用户的个人资料。
    <br />修改:可修改密码、性别、电话、地址、QQ、邮箱信息。
	<br />三、用户管理：显示当前数据库内所有的用户资料、包括ID	、用户名、性别、用户权限、注册日期、地址、QQ、电话、邮箱、上次登陆时间、上次登陆IP等信息。
    <br />添加用户：在总用户数量小于10个的前提下可添加新用户、其中、用户名、权限、密码为必填项、性别、电话、地址、QQ、邮箱可不填。
    <br />删除用户：输入用户ID号、用户名、用户权限、密码以及二次确认密码可删除对应用户。注：只能删除权限低于当前登陆账户的用户。
    <br />四、产品展示：显示产品展示模块对应的序号、标题、作者、发布IP、发表时间和内容。
    <br />添加文章：为产品展示模块添加新的文章信息。
    <br />删除文章：输入文章序号、文章名称及作者名称后确认后可删除。
    <br />五、技术支持：显示技术支持模块对应的序号、标题、作者、发布IP、发表时间和内容。
    <br />添加文章：为技术支持模块添加新的文章信息。
    <br />删除文章：输入文章序号、文章名称及作者名称后确认后可删除。
    <br />六、联系我们：列表显示所有的联系我们信息、最多可显示5条。首页只会显示最后一条信息。
    <br />添加信息：注释1和注释2是网站首页下方、联系我们板块与发送电子邮件功能之间的两行注释内容。右侧每个空代表一行信息。
    <br />删除信息：只需输入序号和添加人名称即可删除地址信息。
    <br />七、企业员工：展示目前在职员工信息。通过删除减少显示。
    <br />八、公益产品各个版本的下载地址管理。
    <br />九、各种产品的最新版本下载。
    <br />十、访客留言：显示首页访客的留言信息。
    <br />十一、关于我们：介绍公司信息。
    <br />添加信息：为关于我们板块添加新内容。
    <br />删除文章：输入文章序号、文章名称及作者名称后确认后可删除。
    <br />十二、幻灯片：按照序号以及图号对应显示首页图片信息。
    <br />添加信息：为幻灯片输入新内容。注:图号为后台对应图像文件的编号。
    <br />删除信息：输入序号、图号、标题、作者信息可删除对应数据。
    <br />十三、帮助文档：整站的帮助信息以及是使用说明。
    <br />十四、退出登陆：点击退出登陆、系统会销毁当前登陆用户的数据。	
<?php
break;
case 130:
?>
        <div align = "center" style = "margin-top:15%">
			<?php
			//注销登录
			function deldir($dir)
			{
			   $dh = opendir($dir);
			   while ($file = readdir($dh))
			   {
				  if ($file != "." && $file != "..")
				  {
					 $fullpath = $dir . "/" . $file;
					 if (!is_dir($fullpath))
					 {
						@unlink($fullpath);
					 } else
					 {
						deldir($fullpath);
					 }
				  }
			   }
			   closedir($dh);
			   if (@rmdir($dir))
			   {
				  return true;
			   } else
			   {
				  return false;
			   }
			} 
			deldir($session_path); 
			session_unset(); 
			session_destroy();
            echo '<h2>已成功注销登录<br><br>3 秒后页面自动关闭<h2>';
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
break;
default:
	$i=0;
break;
            }
            ?>
        </div>
</div>
</div>
</div>
    <div id = "footer">
        Copyright &copy; 2013 - <?php echo date("Y", time());?>
        <a href="http://t.qq.com/wzxaini9" target = "_blank">"Powerless"</a>
    </div>
</body>
</html>