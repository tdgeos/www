<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理系统</title>
<link rel="shortcut icon" href="../images/ico.png" type="Styles/res/x-icon">
</head>
<link rel="stylesheet" href="css/index.css">
<script src="js/jquery-1.9.0.min.js"></script>
<script async="false" src="js/Load_Page_Top.js"></script>

<body onload="openwin()">
	<!--[if IE]>
    <h1 style=" margin-top:20%; text-align:center">这里是一个空白页。你想要干嘛？</h1>
    <script language="javascript"> 
    function clock(){
    if(i==0){ 
    clearTimeout(st); 
    window.opener=null; 
    window.close();} 
    i = i - 1; 
    st = setTimeout("clock()",1000);
    }
    var i=2 
    clock(); 
    </script>
    <![endif]-->
	<iframe src="enter.htm" id="iframepage" name="iframepage" frameborder="0" scrolling="no" width="100%" height="100%80px"onload="iFrameHeight()" ></iframe>
<script type="text/javascript" language="javascript">  

<!--自动高度--> 
	function iFrameHeight()
	{
		if(top.location != self.location)
		{
			top.location = self.location;
		}   
		var ifm= document.getElementById("iframepage");   
		var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument;   
	
		if(ifm != null && subWeb != null)
		{
		   ifm.height = subWeb.body.scrollHeight;
		}   
	}
	window.setInterval("iFrameHeight()", 100); 
</script>
</body>
</html>