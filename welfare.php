<?php

	require_once("My_SQL/_My_SQL_link.php");

	$Welfare_sql = "SELECT `w_Web` FROM `t_Welfare` order by `w_Id` DESC LIMIT 1";	
	$Welfare_sql_result = mysql_query($Welfare_sql) or die("公益产品查询失败!");
	$Welfare_sql_row = mysql_fetch_array($Welfare_sql_result); 
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>北京思行伟业数码科技有限公司</title>
		<link rel="shortcut icon" href="images/ico.png" type="Styles/res/x-icon">
		<script type="text/javascript" src="http://webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/UnityObject.js"></script>
        
		<script type="text/javascript">
		<!--
		function GetUnity() {
			if (typeof unityObject != "undefined") {
				return unityObject.getObjectById("unityPlayer");
			}
			return null;
		}
		if (typeof unityObject != "undefined") {
			var params = {
				disableContextMenu: true
			};
			unityObject.embedUnity("unityPlayer", "<?php echo mb_substr( $Welfare_sql_row['w_Web'],3,96,'utf-8');?>", 1024, 768, params);
			
		}
		-->
		</script>
		<style type="text/css">
		<!--
		body {
			font-family: Helvetica, Verdana, Arial, sans-serif;
			background-color: white;
			color: black;
			text-align: center;
		}
		a:link, a:visited {
			color: #000;
		}
		a:active, a:hover {
			color: #666;
		}
		p.header {
			font-size: small;
		}
		p.header span {
			font-weight: bold;
		}
		p.footer {
			font-size: x-small;
		}
		div.content {
			margin: auto;
			width: 1024px;
		}
		div.missing {
			margin: auto;
			position: relative;
			top: 50%;
			width: 193px;
		}
		div.missing a {
			height: 63px;
			position: relative;
			top: -31px;
		}
		div.missing img {
			border-width: 0px;
		}
		div#unityPlayer {
			cursor: default;
			height: 768px;
			width: 1024px;
		}
		-->
		</style>
	</head>
	<body>
		<div class="content">
			<div id="unityPlayer">
				<div class="missing">
					<a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now!">
						<img alt="Unity Web Player. Install now!" src="http://webplayer.unity3d.com/installation/getunity.png" width="193" height="63" />
					</a>
				</div>
			</div>
		</div>
	</body>
</html>
