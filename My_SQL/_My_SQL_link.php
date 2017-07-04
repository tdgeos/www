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
?>
