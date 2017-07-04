<?php
	$DB_HOST = "localhost";
	$DB_USER = "root";
	$DB_PASS = "";
	$DB_NAME = "sxwy_db";
	$con = mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
	mysql_select_db($DB_NAME);
	mysql_query('set names utf8');
	if (!$con)
	  {
	  	die('错误: ' . mysql_error());
	  }
?>
