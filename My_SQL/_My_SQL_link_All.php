<?php
	$DB_HOST = "localhost";
	$DB_USER = "tdgeos";
	$DB_PASS = "tdgeos";
	$DB_NAME = "tdgeos";
	$con = mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
	mysql_select_db($DB_NAME);
	mysql_query('set names utf8');
	if (!$con)
	  {
	  	die('数据库连接错误: '.mysql_error());
	  }
	/*关键字*/
	$Keyword_sql = "SELECT `k_Description`,`k_Keywords` FROM `t_Keyword` order by `k_Id` DESC LIMIT 1";
  	$Keyword_sql_result = mysql_query($Keyword_sql) or die("关键字查询失败!");
	$Keyword_sql_row = mysql_fetch_array($Keyword_sql_result);
	/*第一张幻灯片*/
	$Slide_sql1 = "SELECT `s_Image`,`s_Name`,`s_Publishtime`,`s_Content` FROM `t_Slide` order by `s_Id` DESC LIMIT 0,1";
  	$Slide_sql_result1 = mysql_query($Slide_sql1) or die("第一张幻灯片查询失败!");
	$Slide_sql_row1 = mysql_fetch_array($Slide_sql_result1);
	/*第二张幻灯片*/
	$Slide_sql2 = "SELECT `s_Image`,`s_Name`,`s_Publishtime`,`s_Content` FROM `t_Slide` order by `s_Id` DESC LIMIT 1,1";
  	$Slide_sql_result2 = mysql_query($Slide_sql2) or die("第二张幻灯片查询失败!");
	$Slide_sql_row2 = mysql_fetch_array($Slide_sql_result2); 
	/*第三张幻灯片*/
	$Slide_sql3 = "SELECT `s_Image`,`s_Name`,`s_Publishtime`,`s_Content` FROM `t_Slide` order by `s_Id` DESC LIMIT 2,2";
  	$Slide_sql_result3 = mysql_query($Slide_sql3) or die("第三张幻灯片查询失败!");
	$Slide_sql_row3 = mysql_fetch_array($Slide_sql_result3);
	/*第四张幻灯片*/
	$Slide_sql4 = "SELECT `s_Image`,`s_Name`,`s_Publishtime`,`s_Content` FROM `t_Slide` order by `s_Id` DESC LIMIT 3,3";
  	$Slide_sql_result4 = mysql_query($Slide_sql4) or die("第四张幻灯片查询失败!");
	$Slide_sql_row4 = mysql_fetch_array($Slide_sql_result4);
	/*产品展示*/ 
    $Show_sql_num = mysql_num_rows(mysql_query("select * from `t_Show`"));
	$Show_sql = "SELECT `s_Name`,`s_Publishtime`,`s_Content` FROM `t_Show` order by `s_Id` DESC LIMIT 1";
  	$Show_sql_list = mysql_query($Show_sql) or die("产品展示板块查询失败!");
	$Show_row = mysql_fetch_array($Show_sql_list);
	/*技术支持*/
    $Support_sql_num = mysql_num_rows(mysql_query("select * from `t_Support`"));
	$Support_sql = "SELECT `s_Name`,`s_Publishtime`,`s_Content` FROM `t_Support` order by `s_Id` DESC LIMIT 1";
    $Support_sql_list = mysql_query($Support_sql) or die("技术支持板块查询失败!");
	$Support_row = mysql_fetch_array($Support_sql_list);
  	/*关于我们*/
    $About_sql_num = mysql_num_rows(mysql_query("select * from `t_About`"));
	$About_sql = "SELECT `a_Name`,`a_Publishtime`,`a_Content` FROM `t_About` order by `a_Id` DESC LIMIT 1";
	$About_sql_result = mysql_query($About_sql) or die("关于我们板块查询失败!");
	$About_row = mysql_fetch_array($About_sql_result);
  	/*经典案例*/
    $Product_sql_num = mysql_num_rows(mysql_query("select * from `t_Product`"));
	$Product_sql = "SELECT `p_Name`,`p_Image`,`p_Publishtime`,`p_Address`,`p_Introduction` FROM `t_Product` order by `p_Id` DESC LIMIT 4";
  	$Product_sql_list = mysql_query($Product_sql) or die("经典案例板块查询失败!");
  	/*公益产品*/
	$Welfare_sql = "SELECT `w_Name`,`w_Content`,`w_Publishtime`,`w_Image`,`w_Android`,`w_Ios`,`w_Pc`,`w_Web` FROM `t_Welfare` order by `w_Id` DESC LIMIT 1";	
	$Welfare_sql_result = mysql_query($Welfare_sql) or die("公益产品板块查询失败!");
	$Welfare_sql_row = mysql_fetch_array($Welfare_sql_result); 
  	/*合作伙伴*/
	$Cooperation_sql = "SELECT `c_Name`,`c_Image`,`c_Url` FROM `t_Cooperation` order by `c_Id` DESC";
  	$Cooperation_sql_list = mysql_query($Cooperation_sql) or die("合作伙伴板块查询失败!");
	/*联系我们*/
	$Contact_sql = "SELECT `c_Phone`,`c_Blog`,`c_Crowd`,`c_Public` FROM `t_Contact` order by `c_Id` DESC LIMIT 1";
	$Contact_sql_result = mysql_query($Contact_sql) or die("联系我们板块查询失败!");
	$Contact_row = mysql_fetch_array($Contact_sql_result);
	/*版权信息*/
	$Record_sql = "SELECT `r_ICPmain`,`r_ICPweb` FROM `t_Record` order by `r_Id` DESC LIMIT 1";
	$Record_sql_result = mysql_query($Record_sql) or die("版权信息查询失败!");
	$Record_row = mysql_fetch_array($Record_sql_result);

	$name = 0;
	$str = '';
?>