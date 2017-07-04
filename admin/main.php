<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />
<title>北京思行伟业数码科技有限公司后台管理系统</title>
<link rel = "stylesheet" href = "css/main.css">
<?php
	error_reporting(E_ALL);
	$i=isset($_REQUEST['i']) ? intval($_REQUEST['i']) : 0;
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
	setcookie(session_name(),session_id(),time()+1800,"/"); 
	//  判断是否登陆
	if (isset($_SESSION['SXWY']) && $_SESSION['SXWY'] != 0)
	{
			$id = $_SESSION['SXWY'];
			$group = $_SESSION['GroupId'];
			$name = $_SESSION['Name'];
			$regdate = date("Y-m-d H:i:s", time());
			$ip = $_SERVER['REMOTE_ADDR'];
		if($_SESSION['land']!= 0)
		{
			$_SESSION['land'] = 0;
			$update_sql = "update `t_user` set u_Lasttime = u_Thistime , u_Thistime = '$regdate' , u_LastIp = u_ThisIp , u_ThisIp = '$ip', u_Number = u_Number + 1  where u_Id = $id";
			$down_path = "../file/";//上传路径  
			if(!file_exists($down_path))  
			{  
				//检查是否有该文件夹，如果没有就创建，并给予最高权限  
				mkdir("$down_path", 0700);  
			}
			mysql_query($update_sql,$con);	
			set_time_limit(0);
		}
		header('Content-Type:text/html;Charset=utf-8;');
		include_once('editor/sinaEditor.class.php');
		extract($_POST);
		extract($_GET);
		unset($_POST,$_GET);
		$editor=new sinaEditor('gently_editor');
		$editor->Value='';
		$editor->BasePath='.';
		$editor->Height=400;
		$editor->Width=620;
		$editor->AutoSave=false;
	}
	else
	{
		$_SESSION["SXWY"] = $_SESSION['land'] = $_SESSION['GroupId'] = $_SESSION['Name'] = $_SESSION['Number'] = $group = $name = $SXWY = 0;	
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
				if		($i == 0 ){$Top_Title = '欢迎访问北京思行伟业数码科技有限公司后台管理系统';}
				else if ($i == 10 ){$Top_Title = '个人资料';}
				else if ($i == 11 ){$Top_Title = '个人信息修改';}
				else if ($i == 12 ){$Top_Title = '密码修改';}
				else if ($i == 20 ){$Top_Title = '用户管理';}
				else if ($i == 21 ){$Top_Title = '添加用户';}
				else if ($i == 22 ){$Top_Title = '删除用户';}
				else if ($i == 30 ){$Top_Title = '产品展示';}
				else if ($i == 31 ){$Top_Title = '添加产品展示';}
				else if ($i == 32 ){$Top_Title = '删除产品展示';}
				else if ($i == 40 ){$Top_Title = '技术支持';}
				else if ($i == 41 ){$Top_Title = '添加技术信息';}
				else if ($i == 42 ){$Top_Title = '删除技术信息';}
				else if ($i == 50 ){$Top_Title = '联系我们';}
				else if ($i == 51 ){$Top_Title = '添加新的地址';}
				else if ($i == 52 ){$Top_Title = '删除地址信息';}
				else if ($i == 60 ){$Top_Title = '关于我们';}
				else if ($i == 61 ){$Top_Title = '添加关于我们';}
				else if ($i == 62 ){$Top_Title = '删除关于我们';}
				else if ($i == 70 ){$Top_Title = '经典案例';}
				else if ($i == 71 ){$Top_Title = '添加经典案例';}
				else if ($i == 72 ){$Top_Title = '删除经典案例';}
				else if ($i == 80 ){$Top_Title = '公益产品';}
				else if ($i == 811){$Top_Title = '添加公益产品';}
				else if ($i == 812){$Top_Title = '上传Android版';}
				else if ($i == 813){$Top_Title = '上传Ios版';}
				else if ($i == 814){$Top_Title = '上传Pc版';}
				else if ($i == 815){$Top_Title = '上传Web版';}
				else if ($i == 82 ){$Top_Title = '删除公益产品';}
				else if ($i == 90 ){$Top_Title = '合作伙伴';}
				else if ($i == 91 ){$Top_Title = '添加合作伙伴';}
				else if ($i == 92 ){$Top_Title = '删除合作伙伴';}
				else if ($i == 100){$Top_Title = '访客留言信息';}
				else if ($i == 102){$Top_Title = '删除留言信息';}
				else if ($i == 110){$Top_Title = '幻灯片信息';}
				else if ($i == 111){$Top_Title = '添加幻灯片信息';}
				else if ($i == 112){$Top_Title = '删除幻灯片信息';}
				else if ($i == 120){$Top_Title = '关键字';}
				else if ($i == 130){$Top_Title = '备案信息';}
				else if ($i == 131){$Top_Title = '添加备案信息';}
				else if ($i == 132){$Top_Title = '删除备案信息';}
				else if ($i == 140){$Top_Title = '帮助文档';}
				else if ($i == 150){$Top_Title = '退出登录';}
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
<a href = "?i=70 "><li>经典案例</li></a>
<a href = "?i=80 "><li>公益产品</li></a>
<a href = "?i=90 "><li>合作伙伴</li></a>
<a href = "?i=100"><li>访客留言</li></a>
<a href = "?i=110"><li>幻灯片</li></a>
<a href = "?i=120"><li>关键字</li></a>
<a href = "?i=130"><li>备案信息</li></a>
<a href = "?i=140"><li>帮助文档</li></a>
<a href = "?i=150"><li>退出登录</li></a>
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
				<?php echo '欢迎您',$name,'<br />今天是',date("Y-m-d", time()),'日<br />本次登陆IP',$ip,'<br />这是您第',$_SESSION['Number'],'次登陆后台';?>
            </strong>
        </p>
    </div>
</div>
<?php
break;
case 10:
$user_sql = "SELECT `u_Id`,`u_Name`,`u_Sex`,`u_GroupId`,`u_CreateDate`,`u_Address`,`u_QQ`,`u_Phone`,`u_Mailbox`,`u_LastIp`,`u_Lasttime`,`u_ThisIp` FROM `t_user` order by u_Id ";
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
	if(50 > $user_row['u_GroupId'])
	{$user_group = '游客';}
	if ($_SESSION['SXWY'] == $user_row['u_Id'])
	{?>
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">用户ID</td><td style = "width:185px"><?php echo $user_row['u_Id'];?></td>
    <td style = "width:80px">用户名</td><td style = "width:185px"><?php echo $user_row['u_Name'];?></td>
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
<div style="text-align:center;">
<a href = "?i=11" class="dilog_bmit">修改资料</a>
<a href = "?i=12" class="dilog_bmit">修改密码</a>
</div>
<?php
mysql_free_result($user_result);
break;
case 11:
$user_select_sql = "SELECT `u_Id`,`u_Name`,`u_Sex`,`u_Password`,`u_CreateDate`,`u_Address`,`u_QQ`,`u_Phone`,`u_Mailbox`,`u_Lasttime`,`u_LastIp`,`u_ThisIp`FROM `t_user` order by u_Id ";
$user_result = mysql_query($user_select_sql) or die("个人信息修改查询失败!");
while ($user_row = mysql_fetch_array($user_result)) 
{
	if ($_SESSION['SXWY'] == $user_row['u_Id'])
	{
		?>
<form name = "RegForm" method = "post" action = "?i=16" onSubmit = "return InputCheck(this)">
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">用户ID</td><td style = "width:165px"><input name = "u_Id" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_Id'];?>" readonly /></td>
    <td style = "width:80px">用户名</td><td style = "width:165px"><input name = "u_Name" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_Name'];?>" readonly /></td>
  </tr>
  <tr>
    <td>性别</td>
    <td>
        <select name = "u_Sex" class = "table_Name" type = "text" >
            <?php
				if($user_row['u_Sex'] == '女')
				{
					?>
                        <option selected>男</option>
                        <option selected>女</option>
                    <?php
					}
					
				if($user_row['u_Sex'] == '男')
				{
					?>
                        <option selected>女</option>
                        <option selected>男</option>
                    <?php
					}
			?>
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
    <td><input name = "u_Id" type = "text" class = "table_Name"  value = "<?php echo $user_row['u_CreateDate'];?>" readonly /></td>
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
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>

		<?php
	}
}
mysql_free_result($user_result);
break;
case 12:
?>
<form name = "RegForm" method = "post" action = "?i=17" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">旧密码<a style = "float:right">*</a></td>
    <td style = "width:165px"><input type = "password"  name = "temp_Password" class = "table_Name" maxlength = "32" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;" required = "required" /></td>
  </tr>
<tr>
    <td>密码<a style = "float:right">*</a></td>
    <td><input type = "password" class = "table_Name" name = "u_Password" maxlength = "32" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;" required = "required" /></td>
</tr>
<tr>
    <td>确认密码<a style = "float:right">*</a></td>
    <td><input type = "password" class = "table_Name" name = "u_Password2" maxlength = "32" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;" required = "required" /></td>
    </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 16:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}

$sex = $_REQUEST['u_Sex'];
$phone = $_REQUEST['u_Phone'];
$province = $_REQUEST['u_Province'];
$city = $_REQUEST['u_City'];
$county = $_REQUEST['u_County'];
if($province == '省份')
{$province='';}
if($city == '地级市')
{$city='';}
if($county == '市、县级市')
{$county='';}
$address = $province.'-'.$city.'-'.$county;
$qq = $_REQUEST['u_QQ'];
$mailbox = $_REQUEST['u_Mailbox'];
$uesr_update_sql = "update t_user set 
u_Sex = '$sex',
u_Address = '$address',
u_QQ = '$qq',
u_Phone = '$phone',
u_Mailbox = '$mailbox'
where u_Id = $id";
if(mysql_query($uesr_update_sql,$con))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">个人信息修改成功</h4>
        <a href = "?i=10" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
} 
else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
break;
case 17:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$temp_Password = $_REQUEST['temp_Password'];
$temp_Password2 = sha1($name.md5($_REQUEST['temp_Password']));
$password = sha1($name.md5($_REQUEST['u_Password']));
$password2 = sha1($name.md5($_REQUEST['u_Password2']));
if(strlen($temp_Password) < 6){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">密码长度需大于6位</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if ($temp_Password)
{
 $sql = "SELECT * FROM t_user WHERE (u_Name = '$name') and (u_Password ='$temp_Password2')";
 $res = mysql_query($sql);
 $rows = mysql_num_rows($res);
 if(!$rows)
 {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">旧密码错误</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	 break;
 }
}else
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">密码不能为空</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
if($password != $password2)
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">两次输入的密码不一致</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
$uesr_update_sql = "update t_user set u_Password = '$password' where u_Id = $id";
if(mysql_query($uesr_update_sql,$con))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户密码修改成功</h4>
        <a href = "?i=10" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
} 
else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
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
    <td style = "width:135px">上次登陆时间</td>
    <td style = "width:80px">上次登陆IP</td>
  </tr>
  <?php
	$user_select_sql = "SELECT `u_Id`,`u_Name`,`u_Sex`,`u_GroupId`,`u_CreateDate`,`u_Address`,`u_QQ`,`u_Phone`,`u_Mailbox`,`u_Lasttime`,`u_LastIp`FROM `t_user` order by u_Id ";
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
	if(50 > $user_row['u_GroupId'])
	{$user_group = '游客';}
	?>
<tr>
    <td><?php echo $user_row['u_Id'];?></td>
    <td><?php echo $user_row['u_Name'];?></td>
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
<div style="text-align:center;">
    <a href = "?i=21" class="dilog_bmit">添加用户</a>
    <a href = "?i=22" class="dilog_bmit">删除用户</a>
</div>
<?php 
	mysql_free_result($user_result);
break;
case 21:
	$user_result = mysql_query("select * from `t_user`");
	list($user_result_count) = mysql_fetch_row($user_result);
	if($user_result_count >= 10)
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户数量达到上限。请删除后在添加</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
	else if($group < 200)
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
	else
?>
<form name = "RegForm" method = "post" action = "?i=26" onSubmit = "return InputCheck(this)">
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">用户名<a style = "float:right">*</a></td><td style = "width:165px"><input name = "u_Name" class = "table_Name"  onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" onKeypress="javascript:if(event.keyCode == 32)event.returnValue = false;" maxlength = 16 required = "required" /></td>
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
    <td>QQ</td><td><input name = "u_QQ" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 10/></td>
    <td>邮箱</td><td><input name = "u_Mailbox" type = "text" class = "table_Name" /></td>
  </tr>
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
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
	mysql_free_result($user_result);
break;
case 22:
if($group < 200)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=27" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
<tr>
	<td style = "width:80px">用户ID<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "u_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
    </tr>
<tr>
	<td>用户名<a style = "float:right">*</a></td>
    <td><input name = "u_Name" class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
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
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 26:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}

$username = $_REQUEST['u_Name'];
$temp_Password = $_REQUEST['u_Password'];
$password = sha1($username.md5($_REQUEST['u_Password']));
$password2 = sha1($username.md5($_REQUEST['u_Password2']));
$permissions = $_REQUEST['u_GroupId'];
if($permissions == '高级管理员'){$groupid = 250;}
if($permissions == '普通管理员'){$groupid = 200;}
if($permissions == '信息审核员'){$groupid = 150;}
if($permissions == '信息发布员'){$groupid = 100;}
if($permissions == '无权限'){$groupid = 50;}
if($permissions == '游客'){$groupid = 0;}
$sex = $_REQUEST['u_Sex'];
$province = $_REQUEST['u_Province'];
$city = $_REQUEST['u_City'];
$county = $_REQUEST['u_County'];
if($province == '省份')
{$province='';}
if($city == '地级市')
{$city='';}
if($county == '市、县级市')
{$county='';}
$address = $province.'-'.$city.'-'.$county;
$qq = $_REQUEST['u_QQ'];
$phone = $_REQUEST['u_Phone'];
$mailbox = $_REQUEST['u_Mailbox'];
if(!$temp_Password){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">密码不能为空</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
if(!preg_match('/^[\w\x80-\xff]{4,16}$/', $username))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户名需大于4个字符并小于16个字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if($password != $password2)
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">两次输入的密码不一致</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if(strlen($temp_Password) < 6 && strlen($temp_Password) > 32){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">密码长度需大于6个字符并小于32个字符</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
$check_query = mysql_query("select u_Name from t_user where u_Name = '$username' limit 1");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户名<?php echo $username;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if($groupid >= $group)
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加人员权限不得大于当前用户权限</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}

if(!$mailbox == "")   
{   
	preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/",$mailbox);
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">邮箱地址不正确</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php 
    break;
	  
}

$user_into_sql = "INSERT INTO `t_user`(
u_Name,u_Password,u_Sex,u_GroupId,u_CreateDate,u_Address,u_QQ,u_Phone,u_Mailbox,u_number)VALUES(
'$username','$password','$sex','$groupid','$regdate','$address','$qq','$phone','$mailbox','0')";

if(mysql_query($user_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户添加成功</h4>
        <a href = "?i=20" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
} 
else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
break;
case 27:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$userId = $_REQUEST['u_Id'];
$username = $_REQUEST['u_Name'];
$temp_Password = $_REQUEST['u_Password'];
$password = sha1($username.md5($_REQUEST['u_Password']));
$password2 = sha1($username.md5($_REQUEST['u_Password2']));
$permissions = $_REQUEST['u_GroupId'];
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

if(!$temp_Password){
    echo '密码不能为空。';
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">提示</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
if(strlen($temp_Password) < 6 && strlen($temp_Password) > 32){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">密码长度需大于6个字符并小于32个字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
//检测用户名是否已经存在
$check_query = mysql_query("select u_Id from t_user where u_Id = '$userId'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户ID<?php echo $userId;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
$check_query = mysql_query("select u_Id from t_user where u_Id = '$userId' && u_Name = '$username'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户名<?php echo $username,'与',$userId;?>不匹配，请输入正确的用户ID</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
//删除信息判断
$check_query = mysql_query("select u_Id from t_user where u_Id = '$userId' && u_Name = '$username' &&  u_GroupId = '$groupid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限错误，无法删除<?php echo $username;?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if($group < $groupid)
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除<?php echo $username;?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if($password != $password2)
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">两次输入的密码不一致</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
$check_query = mysql_query("select u_Id from t_user where u_Id = '$userId' && u_Name = '$username' &&  u_Groupid >= '$groupid' && u_Password = '$password'");
if(!mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户名<?php echo $username;?>的密码不正确,无法进行删除操作，请重新输入</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}

//删除数据

	$user_delete_sql = "DELETE FROM t_user WHERE  u_Id = '$userId' && u_Name = '$username' && u_Password = '$password' &&  u_GroupId = '$groupid'";
	if(mysql_query($user_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户删除成功</h4>
        <a href = "?i=20" class="dilog_bmit">返回</a>
    </div>
    <?php
    	break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
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
    <td style = "width:135px">发表日期</td>
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
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$show_select_sql = "SELECT `s_Id`,`s_Name`,`s_Author`,`s_PublishIp`,`s_Publishtime`,`s_Content` FROM `t_Show` order by s_Id limit $offset,$Page_size";
  	$show_result = mysql_query($show_select_sql) or die("产品展示查询失败!");
	while ($show_row = mysql_fetch_array($show_result)) 
	{
		?>
<tr>
    <td><?php echo $show_row['s_Id'];?></td>
    <td><?php echo mb_substr($show_row['s_Name'],0,10,'utf-8');?></td>
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
<div style="text-align:center;">
    <a href = "?i=31" class="dilog_bmit">添加信息</a>
    <a href = "?i=32" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($show_result);
break;
case 31:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=36" onSubmit = "return InputCheck(this)">
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">标题<a style = "float:right">*</a></td>
    <td style = "width:600px">
    <input name = "s_Name" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = "20" /></td>
  <tr>
  <td>内容<a style = "float:right">*</a></td>
    <td>
		<?php
        	$editor->Create();
        ?>
	</td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 32:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=37" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
<tr>
	<td>文章标题<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_Name"  type = "text" class = "table_Name" required = "required" maxlength = 20 /></td>
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
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 36:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$showname = $_REQUEST['s_Name'];
$content = htmlspecialchars($gently_editor);
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $showname)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
if(strlen($content) < 80){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">内容长度应大于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$check_query = mysql_query("select s_Name from t_Show where s_Name = '$showname' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章标题<?php echo $showname;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$show_into_sql = "INSERT INTO `t_Show`(s_Name,s_Author,s_GroupId,s_PublishIp,s_Publishtime,s_Content)VALUES('$showname','$name','$group','$ip','$regdate','$content')";

if(mysql_query($show_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章发布成功</h4>
        <a href = "?i=30" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 37:

if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$showid = $_REQUEST['s_Id'];
$showname = $_REQUEST['s_Name'];
$author = $_REQUEST['s_Author'];
//验证ID
$check_query = mysql_query("select s_Id from t_Show where s_Id = '$showid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章编号<?php echo $showid;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称
$check_query = mysql_query("select s_Id from t_Show where s_Id = '$showid' && s_Name = '$showname'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章编号<?php echo $showid,'与文章标题',$showname;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者
$check_query = mysql_query("select s_Id from t_Show where s_Id = '$showid' && s_Name = '$showname' && s_Author = '$author'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章标题<?php echo $showname,'与发布人',$author;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select s_Id from t_Show where s_Id = '$showid' && s_Name = '$showname' && s_Author = '$author' && s_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除<?php echo $showname;?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//删除数据

	$show_delete_sql = "DELETE FROM t_Show WHERE s_Id = '$showid' && s_Name = '$showname' && s_Author = '$author' && s_GroupId <= '$group'";
	if(mysql_query($show_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章删除成功</h4>
        <a href = "?i=30" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
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
    <td style = "width:135px">发表日期</td>
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
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$support_select_sql = "SELECT `s_Id`,`s_Name`,`s_Author`,`s_PublishIp`,`s_Publishtime`,`s_Content` FROM `t_Support` order by s_Id limit $offset,$Page_size";
  	$support_result = mysql_query($support_select_sql) or die("技术支持查询失败!");
	while ($support_row = mysql_fetch_array($support_result)) 
	{
		?>
<tr>
    <td><?php echo $support_row['s_Id'];?></td>
    <td><?php echo mb_substr($support_row['s_Name'],0,10,'utf-8');?></td>
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
<div style="text-align:center;">
    <a href = "?i=41" class="dilog_bmit">添加信息</a>
    <a href = "?i=42" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($support_result);
break;
case 41:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=46" onSubmit = "return InputCheck(this)">
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">标题<a style = "float:right">*</a></td>
    <td style = "width:600px"><input name = "s_Name" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>

  <tr>
  <td>内容<a style = "float:right">*</a></td>
        <td>
		<?php
$editor->Create();
        ?>
	</td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 42:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=47" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
<tr>
	<td>文章标题<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_Name" type = "text"  class = "table_Name" required = "required" maxlength = 20 /></td>
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
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 46:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$supportname = $_REQUEST['s_Name'];
$content = htmlspecialchars($gently_editor);
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $supportname)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
if(strlen($content) < 80){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">内容长度应大于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
$check_query = mysql_query("select s_Name from t_Support where s_Name = '$supportname' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章标题<?php echo $showname;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
$support_into_sql = "INSERT INTO `t_Support`(s_Name,s_Author,s_GroupId,s_PublishIp,s_Publishtime,s_Content)VALUES('$supportname','$name','$group','$ip','$regdate','$content')";

if(mysql_query($support_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章发布成功</h4>
        <a href = "?i=40" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

break;
case 47:

if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$supportid = $_REQUEST['s_Id'];
$upportname = $_REQUEST['s_Name'];
$author = $_REQUEST['s_Author'];
//验证ID
$check_query = mysql_query("select s_Id from t_Support where s_Id = '$supportid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章编号<?php echo $supportid;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称
$check_query = mysql_query("select s_Id from t_Support where s_Id = '$supportid' && s_Name = '$upportname'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章编号<?php echo $supportid,'与文章标题',$upportname;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者
$check_query = mysql_query("select s_Id from t_Support where s_Id = '$supportid' && s_Name = '$upportname' && s_Author = '$author'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章标题<?php echo $upportname,'与作者',$author;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select s_Id from t_Support where s_Id = '$supportid' && s_Name = '$upportname' && s_Author = '$author' && s_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除文章标题为<?php echo $upportname;?>的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//删除数据

	$support_delete_sql = "DELETE FROM t_Support WHERE s_Id = '$supportid' && s_Name = '$upportname' && s_Author = '$author' && s_GroupId <= '$group'";
	if(mysql_query($support_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章删除成功</h4>
        <a href = "?i=40" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

break;
case 50:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:90px">电话</td>
    <td style = "width:80px">微博</td>
    <td style = "width:90px">QQ群</td>
    <td style = "width:90px">公众号</td>
    <td style = "width:50px">添加人员</td>
  </tr>
    <?php
	$contact_select_sql = "SELECT `c_Id`,`c_Phone`,`c_Blog`,`c_Crowd`,`c_Public`,`c_Author` FROM `t_Contact` order by c_Id ";
  	$contact_result = mysql_query($contact_select_sql) or die("联系我们查询失败!");
	while ($contact_row = mysql_fetch_array($contact_result)) 
{?>
<tr>
    <td><?php echo $contact_row['c_Id'];?></td>
    <td><?php echo $contact_row['c_Phone'];?></td>
    <td><?php echo $contact_row['c_Blog'];?></td>
    <td><?php echo $contact_row['c_Crowd'];?></td>
    <td><a target="_blank" href="<?php echo $contact_row['c_Public']?>"><?php echo mb_substr($contact_row['c_Public'],21,100,'utf-8');?></a></td>
    <td><?php echo $contact_row['c_Author'];?></td>
</tr>
  <?php
}
  ?>
</table>
<div style="text-align:center;">
    <a href = "?i=51" class="dilog_bmit">添加信息</a>
    <a href = "?i=52" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($contact_result);
break;
case 51:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
	$contact_result = mysql_query("select * from t_Contact");
	list($contact_result_count) = mysql_fetch_row($contact_result);
	if($contact_result_count >= 5)
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">地址信息达到上限。请删除后在添加</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else

?>
<form name = "RegForm" method = "post" action = "?i=56" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1">
<table align = "center" width = "500" border = "1">
    <td style = "width:80px">电话<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "c_Phone"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 13 required = "required" /></td>
  </tr>
  <tr>
    <td>微博<a style = "float:right">*</a></td>
    <td><input name = "c_Blog" type = "text" class = "table_Name"  maxlength = 32 required = "required" /></td>
  </tr>
  <tr>
    <td>QQ群<a style = "float:right">*</a></td>
    <td><input name = "c_Crowd" type = "text" class = "table_Name"  maxlength = 10 required = "required" /></td>
  </tr>
  <tr>
    <td>二维码<a style = "float:right">*</a></td>
    <td><input name = "c_Public" type = "file"/>(500 KB max)</td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 52:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=57" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "c_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
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
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 56:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$phone = $_REQUEST['c_Phone'];
$blog = $_REQUEST['c_Blog'];
$crowd = $_REQUEST['c_Crowd'];
$contact_image_path = "../file/ContactImage/";        //幻灯片图片上传路径  
if(!file_exists($contact_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$contact_image_path", 0700);  
} 
//允许上传的文件格式
$contact_image_type = array("image/gif","image/jpeg","image/pjpeg","image/png","image/x-png","image/bmp");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["c_Public"]["type"],$contact_image_type))
{  
echo $_FILES["c_Public"]["type"];
	echo '二维码图片格式不正确<a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>只允许上传jpg、gif、png、bmp格式图片';  
	break;  
} 
if($_FILES["c_Public"]["name"])  
{  
		$contact_image_type1 = $_FILES["c_Public"]["name"];  
		$contact_image_type2 = $contact_image_path.time().$contact_image_type1;
}
if($_FILES["c_Public"]["size"]>500000)  
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">图片文件大小不得超过500KB</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}

$check_query = mysql_query("select c_Phone from t_Contact where c_Phone = '$phone' and c_Blog = '$blog' and  c_Crowd = '$crowd' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">地址信息<?php echo $phone,'——',$blog,'——',$crowd;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

if(@preg_match("/[\x7f-\xff]/","$contact_image_type2"))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">图片文件名称不能含有中文字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}else{
	$contact_image_type = move_uploaded_file($_FILES["c_Public"]["tmp_name"],$contact_image_type2);
}
$contact_into_sql = "INSERT INTO `t_Contact`(c_Phone,c_Blog,c_Crowd,c_Public,c_Author,c_GroupId)
VALUES('$phone','$blog','$crowd','$contact_image_type2','$name','$group')";
if(mysql_query($contact_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">地址添加成功</h4>
        <a href = "?i=50" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 57:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$contactid = $_REQUEST['c_Id'];
$author = $_REQUEST['c_Author'];
//验证ID
$check_query = mysql_query("select c_Id from t_Contact where c_Id = '$contactid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">编号<?php echo $contactid;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应作者
$check_query = mysql_query("select c_Id from t_Contact where c_Id = '$contactid' && c_Author = '$author'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">编号<?php echo $contactid,'与添加人员',$author;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select c_Id from t_Contact where c_Id = '$contactid' && c_Author = '$author' && c_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除编号为<?php echo $contactid;?>的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//删除数据

	$contact_delete_sql = "DELETE FROM t_Contact WHERE c_Id = '$contactid' && c_Author = '$author' && c_GroupId <= '$group'";
	if(mysql_query($contact_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">地址删除成功</h4>
        <a href = "?i=50" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
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
    <td style = "width:135px">发表日期</td>
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
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$about_select_sql = "SELECT `a_Id`,`a_Name`,`a_Author`,`a_PublishIp`,`a_Publishtime`,`a_Content` FROM `t_About` order by a_Id limit $offset,$Page_size";
  	$about_result = mysql_query($about_select_sql) or die("关于我们查询失败!");
	while ($about_row = mysql_fetch_array($about_result)) 
{?>
<tr>
    <td><?php echo $about_row['a_Id'];?></td>
    <td><?php echo mb_substr($about_row['a_Name'],0,11,'utf-8');?></td>
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
<div style="text-align:center;">
    <a href = "?i=61" class="dilog_bmit">添加信息</a>
    <a href = "?i=62" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($about_result);
break;
case 61:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=66" onSubmit = "return InputCheck(this)">
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">标题<a style = "float:right">*</a></td>
    <td style = "width:600px"><input name = "a_Name" type = "text" class = "table_Name"  class = "input_name" required = "required" maxlength = 20 /></td>

  <tr>
  <td>内容<a style = "float:right">*</a></td>
        <td>
		<?php
        $editor->Create();
        ?>
	</td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 62:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=67" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "a_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>标题<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "a_Name" type = "text" class = "table_Name"  required = "required" maxlength = 20 /></td>
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
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 66:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$aboutname = $_REQUEST['a_Name'];
$content = htmlspecialchars($gently_editor);
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $aboutname)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
if(strlen($content) < 80){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">内容长度应大于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
$check_query = mysql_query("select a_Name from t_About where a_Name = '$aboutname' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章标题<?php echo $showname;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
$about_into_sql = "INSERT INTO `t_About`(a_Name,a_Author,a_GroupId,a_PublishIp,a_Publishtime,a_Content)VALUES('$aboutname','$name','$group','$ip','$regdate','$content')";

if(mysql_query($about_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章发布成功</h4>
        <a href = "?i=60" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 67:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$aboutid = $_REQUEST['a_Id'];
$author = $_REQUEST['a_Author'];
//验证ID
$check_query = mysql_query("select a_Id from t_About where a_Id = '$aboutid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章编号<?php echo $aboutid;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应作者
$check_query = mysql_query("select a_Id from t_About where a_Id = '$aboutid' && a_Author = '$author'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章编号<?php echo $aboutid,' 与人员 ：',$author;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select a_Id from t_About where a_Id = '$aboutid' && a_Author = '$author' && a_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除编号为<?php echo $aboutid;?>的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//删除数据

	$adout_delete_sql = "DELETE FROM t_About WHERE a_Id = '$aboutid' && a_Author = '$author' && a_GroupId <= '$group'";
	if(mysql_query($adout_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章删除成功</h4>
        <a href = "?i=60" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
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
    <td style = "width:135px">发表时间</td>
    <td style = "width:300px">产品简介</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from t_Product'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$product_select_sql = "SELECT `p_Id`,`p_Name`,`p_Author`,`p_PublishIp`,`p_Publishtime`,`p_Introduction` FROM `t_Product` order by p_Id limit $offset,$Page_size";
  	$product_result = mysql_query($product_select_sql) or die("经典案例查询失败!");
	while ($product_row = mysql_fetch_array($product_result)) 
{?>
<tr>
    <td><?php echo $product_row['p_Id'];?></td>
    <td><?php echo mb_substr($product_row['p_Name'],0,10,'utf-8');?></td>
    <td><?php echo $product_row['p_Author'];?></td>
    <td><?php echo $product_row['p_PublishIp'];?></td>
    <td><?php echo $product_row['p_Publishtime'];?></td>
    <td><?php echo mb_substr(str_replace("","",strip_tags($product_row['p_Introduction'])),0,24,'utf-8');?></td>
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
<div style="text-align:center;">
    <a href = "?i=71" class="dilog_bmit">添加信息</a>
    <a href = "?i=72" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($product_result);
break;
case 71:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=76" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">产品名称<a style = "float:right">*</a></td>
    <td style = "width:600px"><input name = "p_Name" type = "text" class = "table_Name"  required = "required" maxlength = 20/></td>
  </tr>
  <tr>
    <td>产品截图<a style = "float:right">*</a></td>
    <td><input name = "p_image" type = "file">(500 KB max)</td>
  </tr>
  <tr>
    <td>产品上传<a style = "float:right">*</a></td>
    <td><input type="file" name="p_file" id="p_file" />(100 MB max)</td>
  </tr>
  <tr>
    <td>产品简介<a style = "float:right">*</a></td>
        <td>
		<?php
        $editor->Create();
        ?>
	</td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 72:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=77" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">产品序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "p_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>产品名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "p_Name" type = "text" class = "table_Name"  required = "required" maxlength = 20 /></td>
  </tr>
  <tr>
    <td>发布人<a style = "float:right">*</a></td>
    <td><input name = "p_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 76:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$productname = $_REQUEST['p_Name'];
$check_query = mysql_query("select p_Name from t_Product where p_Name = '$productname' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品名称<?php echo $productname;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//允许上传的文件格式
$down_image_path = "../file/DowunImage/";        //上传路径  
if(!file_exists($down_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$down_image_path", 0700);  
}
$down_image_type = array("image/gif","image/jpeg","image/pjpeg","image/png","image/x-png","image/bmp");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["p_image"]["type"],$down_image_type))  
{  
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">图像格式不对、只允许上传gif、jpeg、png、bmp格式图片</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php 
	break;  
}
if($_FILES["p_image"]["name"])  
{  
		$down_image_type1 = $_FILES["p_image"]["name"];  
		$down_image_type2 = $down_image_path.time().$down_image_type1;
}
if($_FILES["p_image"]["size"]>500000)  
{ 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品截图文件大小不得超过500KB</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$introduction = htmlspecialchars($gently_editor);
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $productname)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
if(strlen($introduction) < 8){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">内容长度应大于2个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} 

if(@preg_match("/[\x7f-\xff]/","$down_image_type2"))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品图像名称不能含有中文字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}else{
	$down_image_type = move_uploaded_file($_FILES["p_image"]["tmp_name"],$down_image_type2);
}

// Check post_max_size (http://us3.php.net/manual/en/features.file-upload.php#73762)
	$POST_MAX_SIZE = ini_get('post_max_size');
	$unit = strtoupper(substr($POST_MAX_SIZE, -1));
	$multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

	if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
		header("HTTP/1.1 500 Internal Server Error"); // This will trigger an uploadError event in 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">POST 超过最大允许大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Settings
	$save_path = "../file/DownFile/";				// The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
	if(!file_exists($save_path))  
	{  
		//检查是否有该文件夹，如果没有就创建，并给予最高权限  
		mkdir("$save_path", 0700);  
	}
	$upload_name = "p_file";
	$max_file_size_in_bytes = 104857600;				// 100MB in bytes
	$extension_whitelist = array("zip", "7z", "rar");	// Allowed file extensions
	$valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-';				// Characters allowed in the file name (in a Regular Expression format)
	
// Other variables	
	$MAX_FILENAME_LENGTH = 260;
	$file_name = "";
	$file_extension = "";
	$uploadErrors = array(
        0=>"没有错误,文件上传成功",
        1=>"上传文件超过upload_max_filesize指令在php . ini",
        2=>"上传文件超过MAX_FILE_SIZE指令中指定的HTML表单",
        3=>"上传文件只是部分上传",
        4=>"没有文件被上传",
        6=>"缺少一个临时文件夹"
	);


// Validate the upload
	if (!isset($_FILES[$upload_name])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">
		<?php
		HandleError("No upload found in \$_FILES for " . $upload_name);
		?>
   		</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (isset($_FILES[$upload_name]["error"]) && $_FILES[$upload_name]["error"] != 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0"><?php  echo $uploadErrors[$_FILES[$upload_name]["error"]];?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]["tmp_name"]) || !@is_uploaded_file($_FILES[$upload_name]["tmp_name"])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">上传失败is_uploaded_file测试</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]['name'])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件没有名字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
// Validate the file size (Warning: the largest files supported by this code is 2GB)
	$file_size = @filesize($_FILES[$upload_name]["tmp_name"]);
	if (!$file_size || $file_size > $max_file_size_in_bytes) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件超过了最大允许的大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
	if ($file_size <= 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件大小外允许下限</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;

	}


// Validate file name (for our purposes we'll just remove invalid characters)
	$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", basename($_FILES[$upload_name]['name']));
	if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效文件名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}


// Validate that we won't over-write an existing file
	if (file_exists($save_path . $file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">具有该名称的文件已经存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Validate file extension
	$path_info = pathinfo($_FILES[$upload_name]['name']);
	$file_extension = $path_info["extension"];
	$is_valid_extension = false;
	foreach ($extension_whitelist as $extension) {
		if (strcasecmp($file_extension, $extension) == 0) {
			$is_valid_extension = true;
			break;
		}
	}
	if (!$is_valid_extension) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效的文件扩展名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

	if (!@move_uploaded_file($_FILES[$upload_name]["tmp_name"], $save_path.$file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件不能被保存</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

function HandleError($message) {
	echo $message;
}
	$down_file_type = $save_path.$_FILES[$upload_name]["name"];

$product_into_sql = "INSERT INTO `t_Product`(p_Name,p_Image,p_Author,p_GroupId,p_PublishIp,p_Publishtime,p_Address,p_Introduction)
VALUES('$productname','$down_image_type2','$name','$group','$ip','$regdate','$down_file_type','$introduction')";
if(mysql_query($product_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品发布成功</h4>
        <a href = "?i=70" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 77:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$productid = $_REQUEST['p_Id'];
$productname = $_REQUEST['p_Name'];
$author = $_REQUEST['p_Author'];
//验证ID
$check_query = mysql_query("select p_Id from t_Product where p_Id = '$productid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品编号<?php echo $productid;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应作者
$check_query = mysql_query("select p_Id from `t_Product` where p_Id = '$productid' && p_Name = '$productname'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品编号<?php echo $productid,' 与产品名称 ：',$productname;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//验证ID所对应作者
$check_query = mysql_query("select p_Id from `t_Product` where p_Id = '$productid' && p_Name = '$productname' && p_Author = '$author'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品编号<?php echo $productid,' 与发布人 ：',$author;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select p_Id from `t_Product` where p_Id = '$productid' && p_Name = '$productname' && p_Author = '$author' && p_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方、无法删除编号为<?php echo $productid;?>的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//删除上传的图片
$delete_image = mysql_query("select p_Image  from `t_Product` where p_Id = '$productid' && p_Name = '$productname' && p_Author = '$author'");
$delete_image_file = mysql_fetch_array($delete_image);
$file_image = $delete_image_file['p_Image'];
if (file_exists($file_image))
{
    $delete_image_ok = unlink ($file_image);
}
//删除的文件
$delete_file = mysql_query("select p_Address from `t_Product` where p_Id = '$productid' && p_Name = '$productname' && p_Author = '$author'");
$delete_file_file = mysql_fetch_array($delete_file);
$file_file = $delete_file_file['p_Address'];
if (file_exists($file_file))
{
    $delete_file_ok = unlink ($file_file);
}
//删除数据
	$product_delete_sql = "DELETE FROM t_Product WHERE p_Id = '$productid' && p_Name = '$productname' && p_Author = '$author' && p_GroupId <= '$group'";
	if(mysql_query($product_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品删除成功</h4>
        <a href = "?i=70" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
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
	$result=mysql_query('select * from t_Welfare'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 	
	$welfare_select_sql = "SELECT `w_Id`,`w_Name`,`w_Content`,`w_Publishtime`,`w_PublishIp`,`w_Android`,`w_Ios`,`w_Pc`,`w_Web` FROM `t_Welfare` order by w_Id limit $offset,$Page_size";
  	$welfare_result = mysql_query($welfare_select_sql) or die("公益板块查询失败!");
	while ($welfare_row = mysql_fetch_array($welfare_result)) 
	{
		?>
<tr>
    <td><?php echo $welfare_row['w_Id'];?></td>
    <td><?php echo mb_substr($welfare_row['w_Name'],0,16,'utf-8');?></td>
    <td><?php echo mb_substr(str_replace("","",strip_tags($welfare_row['w_Content'])),0,24,'utf-8');?></td>
    <td><?php echo $welfare_row['w_PublishIp'];?></td>
    <td><?php echo $welfare_row['w_Publishtime'];?></td>
    <td><?php echo mb_substr($welfare_row['w_Android'],23,96,'utf-8');?></td>
    <td><?php echo mb_substr($welfare_row['w_Ios'],23,96,'utf-8');?></td>
    <td><?php echo mb_substr($welfare_row['w_Pc'],23,96,'utf-8');?></td>
    <td><?php echo mb_substr($welfare_row['w_Web'],23,96,'utf-8');?></td>
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
<div style="text-align:center;">
    <a href = "?i=811" class="dilog_bmit">添加产品</a>
    <a href = "?i=812" class="dilog_bmit">Android版</a>
    <a href = "?i=813" class="dilog_bmit">Ios版</a>
    <a href = "?i=814" class="dilog_bmit">Pc版</a>
    <a href = "?i=815" class="dilog_bmit">Web版</a>
    <a href = "?i=82" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($welfare_result);
break;
case 811:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=861" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">公益名称<a style = "float:right">*</a></td>
    <td style = "width:600px"><input name = "w_Name" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
    <tr>
    <td>公益图像<a style = "float:right">*</a></td>
    <td><input name = "w_Image" type = "file">(500 KB max)
    </td>
  </tr>
  <tr>
	<td>内容<a style = "float:right">*</a></td>
        <td>
		<?php
        $editor->Create();
        ?>
	</td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 812:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=862" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "w_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td style = "width:80px">公益名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "w_Name" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td>Android<a style = "float:right">*</a></td>
    <td><input name = "w_Android" id = "w_Android" type = "file"></td>
    
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 813:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=863" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "w_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td style = "width:80px">公益名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "w_Name" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td>Ios<a style = "float:right">*</a></td>
    <td><input name = "w_Ios" id = "w_Ios" type = "file"></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 814:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=864" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "w_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td style = "width:80px">公益名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "w_Name" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td>Pc<a style = "float:right">*</a></td>
    <td><input name = "w_Pc" id = "w_Pc" type = "file"></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 815:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=865" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "w_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td style = "width:80px">公益名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "w_Name" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td>Web<a style = "float:right">*</a></td>
    <td><input name = "w_Web" id = "w_Web" type = "file"></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 82:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=87" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "w_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>公益名称<a style = "float:right">*</a></td>
    <td><input name = "w_Name" type = "text" class = "table_Name"  required = "required" maxlength = 20 /></td>
  </tr>
    <tr>
        <td>注意！</td>
        <td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
    </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 861:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$welfarename = $_REQUEST['w_Name'];
$welfare_image_path = "../file/cooperationImage/";        //上传路径  
if(!file_exists($welfare_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$welfare_image_path", 0700);  
} 
//允许上传的文件格式
$welfare_image_type = array("image/png","image/x-png");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["w_Image"]["type"],$welfare_image_type))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">图像格式不正确</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php  
	break;  
} 
if($_FILES["w_Image"]["name"])  
{  
		$welfare_image_type1 = $_FILES["w_Image"]["name"];  
		$welfare_image_type2 = $welfare_image_path.time().$welfare_image_type1;
}
if($_FILES["w_Image"]["size"]>500000)  
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">图像文件大小不得超过500KB</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $welfarename)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
$content = htmlspecialchars($gently_editor);
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $welfarename)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
if(strlen($content) < 80){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">内容长度应大于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
$android = $ios = $pc = $web = '';
if(@preg_match("/[\x7f-\xff]/","$welfare_image_type2"))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">公益文件名称不能含有中文字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}else{
	$welfare_image_type = move_uploaded_file($_FILES["w_Image"]["tmp_name"],$welfare_image_type2);
}
$check_query = mysql_query("select w_Name from t_Welfare where w_Name = '$welfarename' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章标题<?php echo $welfarename;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
$welfare_into_sql = "INSERT INTO `t_Welfare`(w_Name,w_Image,w_Content,w_GroupId,w_PublishIp,w_Publishtime,w_Android,w_Ios,w_Pc,w_Web)
VALUES('$welfarename','$welfare_image_type2','$content','$group','$ip','$regdate','$android','$ios','$pc','$web')";

if(mysql_query($welfare_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品发布成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 862:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$welfarename = $_REQUEST['w_Name'];
$welfareid = $_REQUEST['w_Id'];
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $welfarename)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应名称
$check_query = mysql_query("select w_Id from `t_Welfare` where w_Id = '$welfareid' && w_Name = '$welfarename'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品编号<?php echo $welfareid,' 与名称 ：',$welfarename;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

// Check post_max_size (http://us3.php.net/manual/en/features.file-upload.php#73762)
	$POST_MAX_SIZE = ini_get('post_max_size');
	$unit = strtoupper(substr($POST_MAX_SIZE, -1));
	$multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

	if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
		header("HTTP/1.1 500 Internal Server Error"); // This will trigger an uploadError event in 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">POST 超过最大允许大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Settings
	$save_path = "../file/cooperationAndroid/";				// The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
	if(!file_exists($save_path))  
	{  
		//检查是否有该文件夹，如果没有就创建，并给予最高权限  
		mkdir("$save_path", 0700);  
	}
	$upload_name = "w_Android";
	$max_file_size_in_bytes = 104857600;				// 100MB in bytes
	$extension_whitelist = array("apk");	// Allowed file extensions
	$valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-';				// Characters allowed in the file name (in a Regular Expression format)
	
// Other variables	
	$MAX_FILENAME_LENGTH = 260;
	$file_name = "";
	$file_extension = "";
	$uploadErrors = array(
        0=>"没有错误,文件上传成功",
        1=>"上传文件超过upload_max_filesize指令在php . ini",
        2=>"上传文件超过MAX_FILE_SIZE指令中指定的HTML表单",
        3=>"上传文件只是部分上传",
        4=>"没有文件被上传",
        6=>"缺少一个临时文件夹"
	);


// Validate the upload
	if (!isset($_FILES[$upload_name])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">
		<?php
		HandleError("No upload found in \$_FILES for " . $upload_name);
		?>
   		</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (isset($_FILES[$upload_name]["error"]) && $_FILES[$upload_name]["error"] != 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0"><?php  echo $uploadErrors[$_FILES[$upload_name]["error"]];?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]["tmp_name"]) || !@is_uploaded_file($_FILES[$upload_name]["tmp_name"])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">上传失败is_uploaded_file测试</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]['name'])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件没有名字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
// Validate the file size (Warning: the largest files supported by this code is 2GB)
	$file_size = @filesize($_FILES[$upload_name]["tmp_name"]);
	if (!$file_size || $file_size > $max_file_size_in_bytes) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件超过了最大允许的大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
	if ($file_size <= 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件大小外允许下限</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;

	}


// Validate file name (for our purposes we'll just remove invalid characters)
	$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", basename($_FILES[$upload_name]['name']));
	if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效文件名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}


// Validate that we won't over-write an existing file
	if (file_exists($save_path . $file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">具有该名称的文件已经存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Validate file extension
	$path_info = pathinfo($_FILES[$upload_name]['name']);
	$file_extension = $path_info["extension"];
	$is_valid_extension = false;
	foreach ($extension_whitelist as $extension) {
		if (strcasecmp($file_extension, $extension) == 0) {
			$is_valid_extension = true;
			break;
		}
	}
	if (!$is_valid_extension) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效的文件扩展名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

	if (!@move_uploaded_file($_FILES[$upload_name]["tmp_name"], $save_path.$file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件不能被保存</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

function HandleError($message) {
	echo $message;
}
	$welfare_android_type = $save_path.$_FILES[$upload_name]["name"];
	
	
$welfare_result = mysql_query("select * from `t_Welfare`");
list($welfare_result_count) = mysql_fetch_row($welfare_result);
if($welfare_result_count < 1)
{
	$welfare_into_sql = "INSERT INTO `t_Welfare`(w_Name,w_GroupId,w_PublishIp,w_Publishtime,w_Android)
	VALUES('$welfarename','$group','$ip','$regdate','$welfare_android_type')";
	if(mysql_query($welfare_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品发布成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	} else {	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	}
}else
{
	$welfare_update_sql = "update `t_Welfare` set 
	w_Name = '$welfarename',
	w_GroupId = '$group',
	w_PublishIp = '$ip',
	w_Publishtime = '$regdate',
	w_Android = '$welfare_android_type'
	where w_Id = $welfareid";
	if(mysql_query($welfare_update_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品发布成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	} else {	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	}
}
break;
case 863:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$welfarename = $_REQUEST['w_Name'];
$welfareid = $_REQUEST['w_Id'];

if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $welfarename)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应名称
$check_query = mysql_query("select w_Id from `t_Welfare` where w_Id = '$welfareid' && w_Name = '$welfarename'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品编号<?php echo $welfareid,' 与名称 ：',$welfarename;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
// Check post_max_size (http://us3.php.net/manual/en/features.file-upload.php#73762)
	$POST_MAX_SIZE = ini_get('post_max_size');
	$unit = strtoupper(substr($POST_MAX_SIZE, -1));
	$multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

	if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
		header("HTTP/1.1 500 Internal Server Error"); // This will trigger an uploadError event in 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">POST 超过最大允许大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Settings
	$save_path = "../file/cooperationIos/";				// The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
	if(!file_exists($save_path))  
	{  
		//检查是否有该文件夹，如果没有就创建，并给予最高权限  
		mkdir("$save_path", 0700);  
	}
	$upload_name = "w_Ios";
	$max_file_size_in_bytes = 104857600;				// 100MB in bytes
	$extension_whitelist = array("ipa");	// Allowed file extensions
	$valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-';				// Characters allowed in the file name (in a Regular Expression format)
	
// Other variables	
	$MAX_FILENAME_LENGTH = 260;
	$file_name = "";
	$file_extension = "";
	$uploadErrors = array(
        0=>"没有错误,文件上传成功",
        1=>"上传文件超过upload_max_filesize指令在php . ini",
        2=>"上传文件超过MAX_FILE_SIZE指令中指定的HTML表单",
        3=>"上传文件只是部分上传",
        4=>"没有文件被上传",
        6=>"缺少一个临时文件夹"
	);


// Validate the upload
	if (!isset($_FILES[$upload_name])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">
		<?php
		HandleError("No upload found in \$_FILES for " . $upload_name);
		?>
   		</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (isset($_FILES[$upload_name]["error"]) && $_FILES[$upload_name]["error"] != 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0"><?php  echo $uploadErrors[$_FILES[$upload_name]["error"]];?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]["tmp_name"]) || !@is_uploaded_file($_FILES[$upload_name]["tmp_name"])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">上传失败is_uploaded_file测试</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]['name'])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件没有名字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
// Validate the file size (Warning: the largest files supported by this code is 2GB)
	$file_size = @filesize($_FILES[$upload_name]["tmp_name"]);
	if (!$file_size || $file_size > $max_file_size_in_bytes) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件超过了最大允许的大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
	if ($file_size <= 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件大小外允许下限</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;

	}


// Validate file name (for our purposes we'll just remove invalid characters)
	$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", basename($_FILES[$upload_name]['name']));
	if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效文件名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}


// Validate that we won't over-write an existing file
	if (file_exists($save_path . $file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">具有该名称的文件已经存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Validate file extension
	$path_info = pathinfo($_FILES[$upload_name]['name']);
	$file_extension = $path_info["extension"];
	$is_valid_extension = false;
	foreach ($extension_whitelist as $extension) {
		if (strcasecmp($file_extension, $extension) == 0) {
			$is_valid_extension = true;
			break;
		}
	}
	if (!$is_valid_extension) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效的文件扩展名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

	if (!@move_uploaded_file($_FILES[$upload_name]["tmp_name"], $save_path.$file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件不能被保存</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

function HandleError($message) {
	echo $message;
}
	$welfare_ios_type = $save_path.$_FILES[$upload_name]["name"];
	
	
$welfare_result = mysql_query("select * from `t_Welfare`");
list($welfare_result_count) = mysql_fetch_row($welfare_result);
if($welfare_result_count < 1)
{
	$welfare_into_sql = "INSERT INTO `t_Welfare`(w_Name,w_GroupId,w_PublishIp,w_Publishtime,w_Ios)
	VALUES('$welfarename','$group','$ip','$regdate','$welfare_ios_type')";
	if(mysql_query($welfare_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品发布成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	} else {
		?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	}
}else
{
	$welfare_update_sql = "update `t_Welfare` set 
	w_PublishIp = '$ip',
	w_Publishtime = '$regdate',
	w_Ios = '$welfare_ios_type'
	where w_Id = $welfareid";
	if(mysql_query($welfare_update_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品发布成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	} else {	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	}
}

break;
case 864:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$welfarename = $_REQUEST['w_Name'];
$welfareid = $_REQUEST['w_Id'];

if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $welfarename)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应名称
$check_query = mysql_query("select w_Id from `t_Welfare` where w_Id = '$welfareid' && w_Name = '$welfarename'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品编号<?php echo $welfareid,' 与名称 ：',$welfarename;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
// Check post_max_size (http://us3.php.net/manual/en/features.file-upload.php#73762)
	$POST_MAX_SIZE = ini_get('post_max_size');
	$unit = strtoupper(substr($POST_MAX_SIZE, -1));
	$multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

	if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
		header("HTTP/1.1 500 Internal Server Error"); // This will trigger an uploadError event in 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">POST 超过最大允许大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Settings
	$save_path = "../file/cooperationPc/";				// The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
	if(!file_exists($save_path))  
	{  
		//检查是否有该文件夹，如果没有就创建，并给予最高权限  
		mkdir("$save_path", 0700);  
	}
	$upload_name = "w_Pc";
	$max_file_size_in_bytes = 104857600;				// 100MB in bytes
	$extension_whitelist = array("zip","7z","rar");	// Allowed file extensions
	$valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-';				// Characters allowed in the file name (in a Regular Expression format)
	
// Other variables	
	$MAX_FILENAME_LENGTH = 260;
	$file_name = "";
	$file_extension = "";
	$uploadErrors = array(
        0=>"没有错误,文件上传成功",
        1=>"上传文件超过upload_max_filesize指令在php . ini",
        2=>"上传文件超过MAX_FILE_SIZE指令中指定的HTML表单",
        3=>"上传文件只是部分上传",
        4=>"没有文件被上传",
        6=>"缺少一个临时文件夹"
	);


// Validate the upload
	if (!isset($_FILES[$upload_name])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">
		<?php
		HandleError("No upload found in \$_FILES for " . $upload_name);
		?>
   		</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (isset($_FILES[$upload_name]["error"]) && $_FILES[$upload_name]["error"] != 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0"><?php  echo $uploadErrors[$_FILES[$upload_name]["error"]];?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]["tmp_name"]) || !@is_uploaded_file($_FILES[$upload_name]["tmp_name"])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">上传失败is_uploaded_file测试</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]['name'])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件没有名字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
// Validate the file size (Warning: the largest files supported by this code is 2GB)
	$file_size = @filesize($_FILES[$upload_name]["tmp_name"]);
	if (!$file_size || $file_size > $max_file_size_in_bytes) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件超过了最大允许的大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
	if ($file_size <= 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件大小外允许下限</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;

	}


// Validate file name (for our purposes we'll just remove invalid characters)
	$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", basename($_FILES[$upload_name]['name']));
	if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效文件名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}


// Validate that we won't over-write an existing file
	if (file_exists($save_path . $file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">具有该名称的文件已经存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Validate file extension
	$path_info = pathinfo($_FILES[$upload_name]['name']);
	$file_extension = $path_info["extension"];
	$is_valid_extension = false;
	foreach ($extension_whitelist as $extension) {
		if (strcasecmp($file_extension, $extension) == 0) {
			$is_valid_extension = true;
			break;
		}
	}
	if (!$is_valid_extension) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效的文件扩展名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

	if (!@move_uploaded_file($_FILES[$upload_name]["tmp_name"], $save_path.$file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件不能被保存</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

function HandleError($message) {
	echo $message;
}
	$welfare_pc_type = $save_path.$_FILES[$upload_name]["name"];
	
$welfare_result = mysql_query("select * from `t_Welfare`");
list($welfare_result_count) = mysql_fetch_row($welfare_result);
if($welfare_result_count < 1)
{
	$welfare_into_sql = "INSERT INTO `t_Welfare`(w_Name,w_GroupId,w_PublishIp,w_Publishtime,w_Pc)
	VALUES('$welfarename','$group','$ip','$regdate','$welfare_pc_type')";
	if(mysql_query($welfare_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品发布成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	} else {	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	}
}else
{
	$welfare_update_sql = "update `t_Welfare` set 
	w_PublishIp = '$ip',
	w_Publishtime = '$regdate',
	w_Pc = '$welfare_pc_type'
	where w_Id = $welfareid";
	if(mysql_query($welfare_update_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品发布成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	} else {	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	}
}

break;
case 865:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}

$welfarename = $_REQUEST['w_Name'];
$welfareid = $_REQUEST['w_Id'];
//检查上传文件是否在允许上传的类型  
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $welfarename)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应名称
$check_query = mysql_query("select w_Id from `t_Welfare` where w_Id = '$welfareid' && w_Name = '$welfarename'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品编号<?php echo $welfareid,' 与名称 ：',$welfarename;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
// Check post_max_size (http://us3.php.net/manual/en/features.file-upload.php#73762)
	$POST_MAX_SIZE = ini_get('post_max_size');
	$unit = strtoupper(substr($POST_MAX_SIZE, -1));
	$multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

	if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
		header("HTTP/1.1 500 Internal Server Error"); // This will trigger an uploadError event in 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">POST 超过最大允许大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Settings
	$save_path = "../file/cooperationWeb/";				// The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
	if(!file_exists($save_path))  
	{  
		//检查是否有该文件夹，如果没有就创建，并给予最高权限  
		mkdir("$save_path", 0700);  
	}
	$upload_name = "w_Web";
	$max_file_size_in_bytes = 104857600;				// 100MB in bytes
	$extension_whitelist = array("unity3d");	// Allowed file extensions
	$valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-';				// Characters allowed in the file name (in a Regular Expression format)
	
// Other variables	
	$MAX_FILENAME_LENGTH = 260;
	$file_name = "";
	$file_extension = "";
	$uploadErrors = array(
        0=>"没有错误,文件上传成功",
        1=>"上传文件超过upload_max_filesize指令在php . ini",
        2=>"上传文件超过MAX_FILE_SIZE指令中指定的HTML表单",
        3=>"上传文件只是部分上传",
        4=>"没有文件被上传",
        6=>"缺少一个临时文件夹"
	);


// Validate the upload
	if (!isset($_FILES[$upload_name])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">
		<?php
		HandleError("No upload found in \$_FILES for " . $upload_name);
		?>
   		</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (isset($_FILES[$upload_name]["error"]) && $_FILES[$upload_name]["error"] != 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0"><?php  echo $uploadErrors[$_FILES[$upload_name]["error"]];?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]["tmp_name"]) || !@is_uploaded_file($_FILES[$upload_name]["tmp_name"])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">上传失败is_uploaded_file测试</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]['name'])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件没有名字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
// Validate the file size (Warning: the largest files supported by this code is 2GB)
	$file_size = @filesize($_FILES[$upload_name]["tmp_name"]);
	if (!$file_size || $file_size > $max_file_size_in_bytes) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件超过了最大允许的大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
	if ($file_size <= 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件大小外允许下限</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;

	}


// Validate file name (for our purposes we'll just remove invalid characters)
	$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", basename($_FILES[$upload_name]['name']));
	if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效文件名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}


// Validate that we won't over-write an existing file
	if (file_exists($save_path . $file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">具有该名称的文件已经存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Validate file extension
	$path_info = pathinfo($_FILES[$upload_name]['name']);
	$file_extension = $path_info["extension"];
	$is_valid_extension = false;
	foreach ($extension_whitelist as $extension) {
		if (strcasecmp($file_extension, $extension) == 0) {
			$is_valid_extension = true;
			break;
		}
	}
	if (!$is_valid_extension) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效的文件扩展名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

	if (!@move_uploaded_file($_FILES[$upload_name]["tmp_name"], $save_path.$file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件不能被保存</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

function HandleError($message) {
	echo $message;
}
	$welfare_web_type = $save_path.$_FILES[$upload_name]["name"];
	
$welfare_result = mysql_query("select * from `t_Welfare`");
list($welfare_result_count) = mysql_fetch_row($welfare_result);
if($welfare_result_count < 1)
{
	$welfare_into_sql = "INSERT INTO `t_Welfare`(w_Name,w_GroupId,w_PublishIp,w_Publishtime,w_Web)
	VALUES('$welfarename','$group','$ip','$regdate','$welfare_web_type')";
	if(mysql_query($welfare_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品发布成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	} else {	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	}
}else
{
	$welfare_update_sql = "update `t_Welfare` set 
	w_PublishIp = '$ip',
	w_Publishtime = '$regdate',
	w_Web = '$welfare_web_type'
	where w_Id = $welfareid";
	if(mysql_query($welfare_update_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品发布成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	} else {	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	}
}

break;
case 87:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$welfareid = $_REQUEST['w_Id'];
$welfarename = $_REQUEST['w_Name'];
//验证ID
$check_query = mysql_query("select w_Id from `t_Welfare` where w_Id = '$welfareid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品编号<?php echo $welfareid;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应名称
$check_query = mysql_query("select w_Id from `t_Welfare` where w_Id = '$welfareid' && w_Name = '$welfarename'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品编号<?php echo $welfareid,' 与名称 ：',$welfarename;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select w_Id from `t_Welfare` where w_Id = '$welfareid' && w_Name = '$welfarename' && w_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除产品编号为<?php echo $welfareid;?>的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
//删除image文件
$delete_image = mysql_query("select w_Image from `t_Welfare` where w_Id = '$welfareid' && w_Name = '$welfarename' && w_GroupId <= '$group'");
$delete_image_file = mysql_fetch_array($delete_image);
$file_image = $delete_image_file['w_Image'];
if (file_exists($file_image))
{
    $delete_image_ok = unlink ($file_image);
}
//删除Android文件
$delete_Android = mysql_query("select w_Android from `t_Welfare` where w_Id = '$welfareid' && w_Name = '$welfarename' && w_GroupId <= '$group'");
$delete_Android_file = mysql_fetch_array($delete_Android);
$file_Android = $delete_Android_file['w_Android'];
if (file_exists($file_Android))
{
    $delete_Android_ok = unlink ($file_Android);
}
//删除Ios文件
$delete_Ios = mysql_query("select w_Ios from `t_Welfare` where w_Id = '$welfareid' && w_Name = '$welfarename' && w_GroupId <= '$group'");
$delete_Ios_file = mysql_fetch_array($delete_Ios);
$file_Ios = $delete_Ios_file['w_Ios'];
if (file_exists($file_Ios))
{
    $delete_Ios_ok = unlink ($file_Ios);
}
//删除Pc文件
$delete_Pc = mysql_query("select w_Pc from `t_Welfare` where w_Id = '$welfareid' && w_Name = '$welfarename' && w_GroupId <= '$group'");
$delete_Pc_file = mysql_fetch_array($delete_Pc);
$file_Pc = $delete_Pc_file['w_Pc'];
if (file_exists($file_Pc))
{
    $delete_Pc_ok = unlink ($file_Pc);
}
//删除Web文件
$delete_Web = mysql_query("select w_Web from `t_Welfare` where w_Id = '$welfareid' && w_Name = '$welfarename' && w_GroupId <= '$group'");
$delete_Web_file = mysql_fetch_array($delete_Web);
$file_Web = $delete_Web_file['w_Web'];
if (file_exists($file_Web))
{
    $delete_Web_ok = unlink ($file_Web);
}
//删除数据
$welfare_delete_sql = "DELETE FROM `t_Welfare` WHERE w_Id = '$welfareid' && w_Name = '$welfarename' && w_GroupId <= '$group'";
if(mysql_query($welfare_delete_sql,$con))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">产品删除成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
else
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
break;
case 90:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:180px">伙伴名称</td>
    <td style = "width:160px">伙伴LOGO</td>
    <td style = "width:180px">伙伴网址</td>
    <td style = "width:100px">发表IP</td>
    <td style = "width:120px">发表日期</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from t_Cooperation'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$Cooperation_select_sql = "SELECT `c_Id`,`c_Name`,`c_Image`,`c_Url`,`c_PublishIp`,`c_Publishtime` FROM `t_Cooperation` order by c_Id limit $offset,$Page_size";
  	$Cooperation_result = mysql_query($Cooperation_select_sql) or die("合作伙伴查询失败!");
	while ($Cooperation_row = mysql_fetch_array($Cooperation_result)) 
	{
		?>
<tr>
    <td><?php echo $Cooperation_row['c_Id'];?></td>
    <td><?php echo $Cooperation_row['c_Name'];?></td>
    <td><a target="_blank" href="<?php echo $Cooperation_row['c_Image']?>"><?php echo mb_substr($Cooperation_row['c_Image'],25,100,'utf-8');?></a></td>
    <td><?php echo mb_substr($Cooperation_row['c_Url'],8,100,'utf-8');?></td>
    <td><?php echo $Cooperation_row['c_PublishIp'];?></td>
    <td><?php echo $Cooperation_row['c_Publishtime'];?></td>
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
<div style="text-align:center;">
    <a href = "?i=91" class="dilog_bmit">添加信息</a>
    <a href = "?i=92" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($Cooperation_result);
break;
case 91:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=96" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">伙伴名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "c_Name" type = "text" class = "table_Name"  required = "required" maxlength = 12/></td>
  </tr>
  <tr>
    <td>伙伴LOGO<a style = "float:right">*</a></td>
    <td><input name = "c_Image" type = "file">(200 KB max)</td>
  </tr>
  <tr>
    <td>伙伴网址</td>
    <td><input name = "c_Url" type = "text"  class = "table_Name" maxlength = 64/></td>
  </tr>
  <tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 92:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=97" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "c_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>伙伴名称<a style = "float:right">*</a></td>
    <td><input name = "c_Name" type = "text" class = "table_Name" required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 96:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$Cooperationname = $_REQUEST['c_Name'];
$Cooperation_image_path = "../file/CooperationImage/";        //上传路径  
if(!file_exists($Cooperation_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$Cooperation_image_path", 0700);  
} 
//允许上传的文件格式  
$Cooperation_image_type = array("image/gif","image/jpeg","image/pjpeg","image/png","image/x-png","image/bmp");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["c_Image"]["type"],$Cooperation_image_type))
{  
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴LOGO格式不正确，只可上传gif、jpg、png、bmp格式图像文件</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php  
	break;  
} 
if($_FILES["c_Image"]["name"])  
{  
		$Cooperation_image_type1 = $_FILES["c_Image"]["name"];  
		$Cooperation_image_type2 = $Cooperation_image_path.time().$Cooperation_image_type1;
}
if($_FILES["c_Image"]["size"]>200000)  
{ 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴LOGO文件大小不得超过200KB</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
if(@preg_match("/[\x7f-\xff]/","$Cooperation_image_type2"))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴LOGO文件名称不能含有中文字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}else{
	$Cooperation_image_type = move_uploaded_file($_FILES["c_Image"]["tmp_name"],$Cooperation_image_type2);
}
$url = $_REQUEST['c_Url'];
if('' == $url)
{
	$url = 'href="#"';
	}else{
			$url = ' href = "http://'.$url.'"';
		}
$check_query = mysql_query("select c_Name from t_Cooperation where c_Name = '$Cooperationname' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴信息<?php echo $Cooperationname;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
$Cooperation_into_sql = "INSERT INTO `t_Cooperation`(c_Name,c_Image,c_Url,c_PublishIp,c_Publishtime,c_GroupId)
VALUES('$Cooperationname','$Cooperation_image_type2','$url','$ip','$regdate','$group')";

if(mysql_query($Cooperation_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">合作伙伴添加成功</h4>
        <a href = "?i=90" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 97:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$Cooperationid = $_REQUEST['c_Id'];
$Cooperationname = $_REQUEST['c_Name'];
//验证ID
$check_query = mysql_query("select c_Id from t_Cooperation where c_Id = '$Cooperationid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴编号<?php echo $Cooperationid;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应作者
$check_query = mysql_query("select c_Id from t_Cooperation where c_Id = '$Cooperationid' && c_Name = '$Cooperationname'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴编号<?php echo $Cooperationid,' 与伙伴名称 ：',$Cooperationname;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select c_Id from t_Cooperation where c_Id = '$Cooperationid' && c_Name = '$Cooperationname' && c_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方,无法删除伙伴编号为<?php echo $Cooperationid;?>的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}

//删除的文件
$delete_image = mysql_query("select c_Image from t_Cooperation where c_Id = '$Cooperationid' && c_Name = '$Cooperationname' && c_GroupId <= '$group'");
$delete_file = mysql_fetch_array($delete_image);
$file = $delete_file['c_Image'];
if (file_exists($file))
{
    $delete_ok = unlink ($file);
}
//删除数据
$Cooperation_delete_sql = "DELETE FROM t_Cooperation WHERE c_Id = '$Cooperationid' && c_Name = '$Cooperationname' && c_GroupId <= '$group'";
if(mysql_query($Cooperation_delete_sql,$con))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">合作伙伴删除成功</h4>
        <a href = "?i=90" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
else
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
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
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$message_select_sql = "SELECT `m_Id`,`m_Name`,`m_Email`,`m_Subject`,`m_Content` FROM `t_Message` order by m_Id limit $offset,$Page_size";
  	$message_result = mysql_query($message_select_sql) or die("访客留言查询失败!");
	while ($message_row = mysql_fetch_array($message_result)) 
	{
	?>
<tr>
    <td><?php echo $message_row['m_Id'];?></td>
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
<div style="text-align:center;">
    <a href = "?i=102" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($message_result);
break;
case 102:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=107" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "m_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
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
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 107:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$messageid = $_REQUEST['m_Id'];
$messagename = $_REQUEST['m_Name'];
$subject = $_REQUEST['m_Subject'];
//验证ID
$check_query = mysql_query("select m_Id from t_Message where m_Id = '$messageid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">留言编号<?php echo $messageid;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
//验证ID所对应作者
$check_query = mysql_query("select m_Id from t_Message where m_Id = '$messageid' && m_Name = '$messagename'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">留言编号<?php echo $messageid,' 与主题 ：',$messagename;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
$check_query = mysql_query("select m_Id from t_Message where m_Id = '$messageid' && m_Name = '$messagename'&& m_Subject = '$subject'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">留言编号<?php echo $messageid,' 与内容 ：',$subject;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
//删除数据

	$message_delete_sql = "DELETE FROM t_Message WHERE m_Id = '$messageid' && m_Name = '$messagename' && m_Subject = '$subject'";
	if(mysql_query($message_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">留言删除成功</h4>
        <a href = "?i=100" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
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
    <td style = "width:135px">发表日期</td>
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
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$slide_select_sql = "SELECT `s_Id`,`s_Name`,`s_Author`,`s_PublishIp`,`s_Publishtime`,`s_Content` FROM `t_Slide` order by s_Id limit $offset,$Page_size";
  	$slide_result = mysql_query($slide_select_sql) or die("幻灯片查询失败!");
	while ($slide_row = mysql_fetch_array($slide_result)) 
{?>
<tr>
    <td><?php echo $slide_row['s_Id'];?></td>
    <td><?php echo mb_substr($slide_row['s_Name'],0,10,'utf-8');?></td>
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
<div style="text-align:center;">
    <a href = "?i=111" class="dilog_bmit">添加信息</a>
    <a href = "?i=112" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($slide_result);
break;
case 111:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=116" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">标题<a style = "float:right">*</a></td>
    <td style = "width:600px"><input name = "s_Name" type = "text" class = "table_Name"  class = "input_name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td>图片<a style = "float:right">*</a></td>
    <td><input name = "s_Image" type = "file">(500 KB max)</td>
  </tr>
  <tr>
  <td>内容<a style = "float:right">*</a></td>
    <td><textarea name = "s_Content" class = "table_Content" required = "required"></textarea></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 112:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=117" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>标题<a style = "float:right">*</a></td>
    <td><input name = "s_Name" type = "text" class = "table_Name"  required = "required" maxlength = 20 /></td>
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
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 116:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$slidename = $_REQUEST['s_Name'];
$slide_image_path = "../file/SlideImage/";        //幻灯片图片上传路径  
if(!file_exists($slide_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$slide_image_path", 0700);  
} 
//允许上传的文件格式  
$slide_image_type = array("image/gif","image/jpeg","image/pjpeg","image/bmp");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["s_Image"]["type"],$slide_image_type))
{ 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">幻灯片图片格式不正确</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php  
	break;  
} 
if($_FILES["s_Image"]["name"])  
{  
		$slide_image_type1 = $_FILES["s_Image"]["name"];  
		$slide_image_type2 = $slide_image_path.time().$slide_image_type1;
}
if($_FILES["s_Image"]["size"]>500000)  
{ 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">图片文件大小不得超过500KB</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$content = str_replace(chr(13),'<br>',$_REQUEST['s_Content']); 
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $slidename)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$check_query = mysql_query("select s_Name from t_Slide where s_Name = '$slidename' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章标题<?php echo $slidename;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
if(@preg_match("/[\x7f-\xff]/","$slide_image_type2"))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">图片文件名称不能含有中文字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}else{
	$slide_image_type = move_uploaded_file($_FILES["s_Image"]["tmp_name"],$slide_image_type2);
}
$slide_into_sql = "INSERT INTO `t_Slide`(s_Image,s_Name,s_Author,s_GroupId,s_PublishIp,s_Publishtime,s_Content)
VALUES('$slide_image_type2','$slidename','$name','$group','$ip','$regdate','$content')";

if(mysql_query($slide_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章发布成功</h4>
        <a href = "?i=110" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
break;
case 117:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$slideid = $_REQUEST['s_Id'];
$slidename = $_REQUEST['s_Name'];
$author = $_REQUEST['s_Author'];
//验证ID
$check_query = mysql_query("select s_Id from t_Slide where s_Id = '$slideid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章编号<?php echo $slideid;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//验证标题
$check_query = mysql_query("select s_Id from t_Slide where s_Id = '$slideid'  && s_Name = '$slidename'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章名称<?php echo $slidename;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//验证ID所对应作者
$check_query = mysql_query("select s_Id from t_Slide where s_Id = '$slideid' && s_Name = '$slidename' && s_Author = '$author'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章编号<?php echo $showname,' 与添加人员 ：',$author;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select s_Id from t_Slide where s_Id = '$slideid' && s_Name = '$slidename' && s_Author = '$author' && s_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除文章标题为<?php echo $slidename;?>的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//删除的文件
$delete_image = mysql_query("select s_Image from t_Slide where s_Id = '$slideid' && s_Name = '$slidename'");
$delete_file = mysql_fetch_array($delete_image);
$file = $delete_file['s_Image'];
if (file_exists($file))
{
    $delete_ok = unlink ($file);
}
//删除数据
	$slide_delete_sql = "DELETE FROM t_Slide WHERE s_Id = '$slideid' && s_Name = '$slidename' && s_Author = '$author' && s_GroupId <= '$group'";
	if(mysql_query($slide_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章删除成功</h4>
        <a href = "?i=110" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}

break;
case 120:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:90px">网站描述</td>
    <td style = "width:80px">网站关键字</td>
    <td style = "width:90px">添加时间</td>
    <td style = "width:90px">添加IP</td>
    <td style = "width:50px">添加人员</td>
  </tr>
    <?php
	$keyword_select_sql = "SELECT `k_Id`,`k_Description`,`k_Keywords`,`k_Publishtime`,`k_PublishIp`,`k_Author` FROM `t_Keyword` order by k_Id ";
  	$keyword_result = mysql_query($keyword_select_sql) or die("关键字查询失败!");
	while ($keyword_row = mysql_fetch_array($keyword_result)) 
{?>
<tr>
    <td><?php echo $keyword_row['k_Id'];?></td>
    <td><?php echo $keyword_row['k_Description'];?></td>
    <td><?php echo $keyword_row['k_Keywords'];?></td>
    <td><?php echo $keyword_row['k_Publishtime'];?></td>
    <td><?php echo $keyword_row['k_PublishIp'];?></td>
    <td><?php echo $keyword_row['k_Author'];?></td>
</tr>
  <?php
}
  ?>
</table>
<div style="text-align:center;">
    <a href = "?i=121" class="dilog_bmit">添加信息</a>
    <a href = "?i=122" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($keyword_result);
break;
case 121:
if($group < 100)
{
	 ?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
	$keyword_result = mysql_query("select * from t_Keyword");
	list($keyword_result_count) = mysql_fetch_row($keyword_result);
	if($keyword_result_count >= 5)
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字信息达到上限。请删除后在添加</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
?>
<form name = "RegForm" method = "post" action = "?i=126" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
    <td style = "width:80px">网站描述<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "k_Description" type = "text" class = "table_Name"  required = "required" maxlength = 256/></td>
  </tr>
  <tr>
    <td>网站关键字<a style = "float:right">*</a></td>
    <td><input name = "k_Keywords" type = "text" class = "table_Name"  maxlength = 32 required = "required" /></td>
  </tr>
<tr>
<td>提示！</td>
<td><input class = "table_Name" value = "多个关键字请用、符号分割" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 122:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=127" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "k_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>添加人名称<a style = "float:right">*</a></td>
    <td><input name = "k_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 126;
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}

$description = $_REQUEST['k_Description'];
$keywords = $_REQUEST['k_Keywords'];
$keyword_query = mysql_query("select k_Keywords from t_Keyword where k_Description = '$description' limit 1");
if(mysql_fetch_array($keyword_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">网站描述<?php echo $description;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$keyword_query = mysql_query("select k_Description from t_Keyword where k_Keywords = '$keywords' limit 1");
if(mysql_fetch_array($keyword_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">网站关键字<?php echo $keywords;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$keyword_into_sql = "INSERT INTO `t_Keyword`(k_Description,k_Keywords,k_Author,k_GroupId,k_PublishIp,k_Publishtime)
VALUES('$description','$keywords','$name','$group','$ip','$regdate')";

if(mysql_query($keyword_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字发布成功</h4>
        <a href = "?i=120" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 127;
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$keywordid = $_REQUEST['k_Id'];
$author = $_REQUEST['k_Author'];
//验证ID
$keyword_query = mysql_query("select k_Id from t_Keyword where k_Id = '$keywordid'");
if(!mysql_fetch_array($keyword_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字编号<?php echo $keywordid;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者
$keyword_query = mysql_query("select k_Id from t_Keyword where k_Id = '$keywordid' && k_Author = '$author'");
if(!mysql_fetch_array($keyword_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字编号<?php echo $keywordid,'与添加人员：',$author;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$keyword_query = mysql_query("select k_Id from t_Keyword where k_Id = '$keywordid' && k_Author = '$author' && k_GroupId > '$group'");
if(mysql_fetch_array($keyword_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除关键字编号为<?php echo $keywordid;?>的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//删除数据

	$keyword_delete_sql = "DELETE FROM t_Keyword WHERE k_Id = '$keywordid' && k_Author = '$author' && k_GroupId <= '$group'";
	if(mysql_query($keyword_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字删除成功</h4>
        <a href = "?i=120" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
break;
case 130:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:90px">ICP备案主体信息</td>
    <td style = "width:80px">ICP备案网站信息</td>
    <td style = "width:90px">添加时间</td>
    <td style = "width:90px">添加IP</td>
    <td style = "width:50px">添加人员</td>
  </tr>
    <?php
	$record_select_sql = "SELECT `r_Id`,`r_ICPmain`,`r_ICPweb`,`r_Publishtime`,`r_PublishIp`,`r_Author` FROM `t_Record` order by r_Id ";
  	$record_result = mysql_query($record_select_sql) or die("联系我们查询失败!");
	while ($record_row = mysql_fetch_array($record_result)) 
{?>
<tr>
    <td><?php echo $record_row['r_Id'];?></td>
    <td><?php echo $record_row['r_ICPmain'];?></td>
    <td><?php echo $record_row['r_ICPweb'];?></td>
    <td><?php echo $record_row['r_Publishtime'];?></td>
    <td><?php echo $record_row['r_PublishIp'];?></td>
    <td><?php echo $record_row['r_Author'];?></td>
</tr>
  <?php
}
  ?>
</table>
<div style="text-align:center;">
    <a href = "?i=131" class="dilog_bmit">添加信息</a>
    <a href = "?i=132" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($record_result);
break;
case 131:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
	$record_result = mysql_query("select * from t_Record");
	list($record_result_count) = mysql_fetch_row($record_result);
	if($record_result_count >= 5)
	{
		echo'备案信息达到上限。请删除后在添加';
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">提示</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
?>
<form name = "RegForm" method = "post" action = "?i=136" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
    <td style = "width:80px">ICP备案主体信息<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "r_ICPmain" type = "text" class = "table_Name"  maxlength = 32 required = "required" /></td>
  </tr>
  <tr>
    <td>ICP备案网站信息<a style = "float:right">*</a></td>
    <td><input name = "r_ICPweb" type = "text" class = "table_Name"  maxlength = 32 required = "required" /></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 132:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=137" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "r_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>ICP备案网站信息<a style = "float:right">*</a></td>
    <td><input name = "r_ICPweb" type = "text" class = "table_Name"  maxlength = 32 required = "required" /></td>
  </tr>
  <tr>
    <td>添加人名称<a style = "float:right">*</a></td>
    <td><input name = "r_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 136:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$recordmain = $_REQUEST['r_ICPmain'];
$recordweb = $_REQUEST['r_ICPweb'];

$record_query = mysql_query("select r_ICPweb from t_Record where r_ICPmain = '$recordmain' limit 1");
if(mysql_fetch_array($record_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">备案信息<?php echo $recordweb;?>已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$record_into_sql = "INSERT INTO `t_Record`(r_ICPmain,r_ICPweb,r_Author,r_GroupId,r_PublishIp,r_Publishtime)
VALUES('$recordmain','$recordweb','$name','$group','$ip','$regdate')";

if(mysql_query($record_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">备案信息发布成功</h4>
        <a href = "?i=130" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 137:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$recordid = $_REQUEST['r_Id'];
$recordweb = $_REQUEST['r_ICPweb'];
$author = $_REQUEST['r_Author'];
//验证ID
$record_query = mysql_query("select r_Id from t_Record where r_Id = '$recordid'");
if(!mysql_fetch_array($record_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">备案编号<?php echo $recordid;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者
$record_query = mysql_query("select r_Id from t_Record where r_Id = '$recordid' && r_ICPweb = '$recordweb'");
if(!mysql_fetch_array($record_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">ICP备案网站信息<?php echo $recordweb;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者
$record_query = mysql_query("select r_Id from t_Record where r_Id = '$recordid' && r_ICPweb = '$recordweb' && r_Author = '$author'");
if(!mysql_fetch_array($record_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">ICP备案网站信息<?php echo $recordweb,'与添加人员：',$author;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$record_query = mysql_query("select r_Id from t_Record where r_Id = '$recordid' && r_ICPweb = '$recordweb' && r_Author = '$author' && r_GroupId > '$group'");
if(mysql_fetch_array($record_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除ICP备案网站信息<?php echo $recordweb;?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//删除数据

	$record_delete_sql = "DELETE FROM t_Record WHERE  r_Id = '$recordid' && r_ICPweb = '$recordweb' && r_Author = '$author' && r_GroupId <= '$group'";
	if(mysql_query($record_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">备案信息删除成功</h4>
        <a href = "?i=130" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
break;
case 140:
$file_name="help.txt";
$fp=fopen($file_name,'r');
while(!feof($fp))
{
$buffer=fgets($fp);
if (preg_match("/^abc\s$/",$buffer))
{echo "OK";}
echo $buffer."<br>";
}

fclose($fp);
break;
case 150:
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
            echo '<h2>已成功注销登录<br><br>1 秒后页面自动关闭<h2>';
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
				var i=2 
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
        Copyright &copy; 2009 - <?php echo date("Y", time());?> 
        <a href="http://www.tdgeos.com/" target = "_blank">北京思行伟业数码科技有限公司</a> by 
        <a href="http://t.qq.com/wzxaini9" target = "_blank">"Powerless"</a> All Rights Reserved.
    </div>
</body>
</html>
