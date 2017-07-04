 <?php

	require_once("My_SQL/_My_SQL_link_All.php");
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>欢迎光临</title>

<link rel="shortcut icon" href="images/ico.png" type="Styles/res/x-icon">

<link rel="stylesheet" href="css/style.css">

<script src="js/modernizr.js"></script>

<script src="js/jquery-1.9.0.min.js"></script>
<!--[if IE]>
		<SCRIPT>
            function closeid()
            {
                document.getElementById("tips").style.display="none";
            }
        </SCRIPT>       
        <div id="tips">
            <div id="Xleft">TIPS：浏览器内核版本过低出现不支持CSS属性，请使用
                <a target="_blank" href="http://www.google.com/intl/zh-CN/chrome/browser/">Google Chrome10</a>
                及以上版本
                <a target="_blank" href="http://firefox.com.cn/">火狐浏览器20.0</a>
                及以上版本
                <a target="_blank" href="http://www.maxthon.cn/">Maxthon3</a>
                及以上版本浏览器浏览能达到最佳效果！
            </div>
            <div id="Xright"><a style="cursor: hand" onClick=closeid()>Ｘ关闭</a></td></div>
        </div>
<![endif]-->

<body>

    <div id="logo">
    
		<a href="index.php">
        
        <img src="images/logo.png">
        
        </a>
        
	</div>
	
<div id="slider-container">

<section id="jms-slideshow" class="jms-slideshow">
<?php
  	$Slide_sql_result1 = mysql_query($Slide_sql1) or die("查询失败!");
	$Slide_sql_row1=mysql_fetch_array($Slide_sql_result1);
	if(!$Slide_sql_row1['s_SlideImage'] == "")
	{
?>
<div class="step" data-image="<?php echo mb_substr($Slide_sql_row1['s_SlideImage'],3,96,'utf-8');?>" data-image-w="1920" data-image-h="480" data-x="2000" data-y="1000" data-z="3000" data-rotate="-20">

<div class="jms-content">

<h2><?php echo mb_substr($Slide_sql_row1['s_SlideName'],0,7,'utf-8');?></h2>

<p><span><?php echo mb_substr($Slide_sql_row1['s_Content'],0,50,'utf-8');?></span></p>

<a class="jms-link button large" href="javascript:void(0)" onclick="more('Slide1')">查看</a>

</div>

</div>
<?php
	}
  	$Slide_sql_result2 = mysql_query($Slide_sql2) or die("查询失败!");
	$Slide_sql_row2=mysql_fetch_array($Slide_sql_result2); 
	if(!$Slide_sql_row2['s_SlideImage'] == "")
	{
?>
<div class="step" data-image="<?php echo mb_substr( $Slide_sql_row2['s_SlideImage'],3,96,'utf-8');?>" data-image-w="1920" data-image-h="480" data-x="1000" data-z="2000" data-rotate="20">

<div class="jms-content">

<h2><?php echo mb_substr($Slide_sql_row2['s_SlideName'],0,7,'utf-8');?></h2>

<p><span><?php echo mb_substr($Slide_sql_row2['s_Content'],0,50,'utf-8');?></span></p>

<a class="jms-link button large" href="javascript:void(0)" onclick="more('Slide2')">查看</a>

</div>

</div>

<?php
	}
  	$Slide_sql_result3 = mysql_query($Slide_sql3) or die("查询失败!");
	$Slide_sql_row3=mysql_fetch_array($Slide_sql_result3);
	if(!$Slide_sql_row3['s_SlideImage'] == "")
	{
?>
<div class="step" data-image="<?php echo mb_substr( $Slide_sql_row3['s_SlideImage'],3,96,'utf-8');?>" data-image-w="1920" data-image-h="480" data-x="2000" data-y="1500" data-z="1000" data-rotate="20">

<div class="jms-content">

<h2><?php echo mb_substr($Slide_sql_row3['s_SlideName'],0,7,'utf-8');?></h2>

<p><span><?php echo mb_substr($Slide_sql_row3['s_Content'],0,50,'utf-8');?></span></p>

<a class="jms-link button large" href="javascript:void(0)" onclick="more('Slide3')">查看</a>

</div>

</div>

<?php
	}
  	$Slide_sql_result4 = mysql_query($Slide_sql4) or die("查询失败!");
	$Slide_sql_row4=mysql_fetch_array($Slide_sql_result4);
	if(!$Slide_sql_row4['s_SlideImage'] == "")
	{
?>
<div class="step" data-image="<?php echo mb_substr( $Slide_sql_row4['s_SlideImage'],3,96,'utf-8');?>" data-image-w="1920" data-image-h="480" data-x="3000" data-y="2000">

<div class="jms-content">

<h2><?php echo mb_substr($Slide_sql_row4['s_SlideName'],0,7,'utf-8');?></h2>

<p><span><?php echo mb_substr($Slide_sql_row4['s_Content'],0,50,'utf-8');?></span></p>

<a class="jms-link button large" href="javascript:void(0)" onclick="more('Slide4')">查看</a>

</div>

</div>
<?php
	}
?>
</section>
</div>
<?php
	if(!$Slide_sql_row1['s_SlideImage'] == "")
	{
?>
	<div id="Slide1" class="Slide_content">
          <div class="close">
                <a href="javascript:void(0)" onclick="hide('Slide1')"> 关闭</a>
          </div>
          <div class="con"> 
                <h2><?php echo $Slide_sql_row1['s_SlideName'];?></h2> 
                <h6><?php echo '发布时间：',$Slide_sql_row1['s_Publishtime'];?></h6>
                <h5><?php echo '&nbsp;',$Slide_sql_row1['s_Content'];?></h5>
          </div>
	</div>
<?php
	}
?>
<?php
	if(!$Slide_sql_row2['s_SlideImage'] == "")
	{
?>
	<div id="Slide2" class="Slide_content">
          <div class="close">
                <a href="javascript:void(0)" onclick="hide('Slide2')"> 关闭</a>
          </div>
          <div class="con"> 
                <h2><?php echo $Slide_sql_row2['s_SlideName'];?></h2> 
                <h6><?php echo '发布时间：',$Slide_sql_row2['s_Publishtime'];?></h6>
                <h5><?php echo '&nbsp;',$Slide_sql_row2['s_Content'];?></h5>
          </div>
	</div>
<?php
	}
?>
<?php
	if(!$Slide_sql_row3['s_SlideImage'] == "")
	{
?>
	<div id="Slide3" class="Slide_content">
          <div class="close">
                <a href="javascript:void(0)" onclick="hide('Slide3')"> 关闭</a>
          </div>
          <div class="con"> 
                <h2><?php echo $Slide_sql_row3['s_SlideName'];?></h2> 
                <h6><?php echo '发布时间：',$Slide_sql_row3['s_Publishtime'];?></h6>
                <h5><?php echo '&nbsp;',$Slide_sql_row3['s_Content'];?></h5>
          </div>
	</div>
<?php
	}
?>
<?php
	if(!$Slide_sql_row4['s_SlideImage'] == "")
	{
?>
	<div id="Slide4" class="Slide_content">
          <div class="close">
                <a href="javascript:void(0)" onclick="hide('Slide4')"> 关闭</a>
          </div>
          <div class="con"> 
                <h2><?php echo $Slide_sql_row4['s_SlideName'];?></h2> 
                <h6><?php echo '发布时间：',$Slide_sql_row4['s_Publishtime'];?></h6>
                <h5><?php echo '&nbsp;',$Slide_sql_row4['s_Content'];?></h5>
          </div>
	</div>
<?php
	}
?>
<section id="jms-slideshow" class="jms-slideshow">
	<div class="grid-990">
    	<article class="product-item">
            <div class="img"><img src="images/product-item1.png" style=" margin-left:120px;"></div>
            <h1 style="margin-top:8px;">产品展示</h1>
            <div class="centerh3"><br>
                <a href="javascript:void(0)" onclick="more('Show')">
                        <h3>
                            <?php
  								$Show_sql_result = mysql_query($Show_sql) or die("产品展示板块查询失败!");
                    			$Show_row=mysql_fetch_array($Show_sql_result);
								 if(empty($Show_row))
								 	echo '暂无数据';
               							
								 else
								 	echo mb_substr($Show_row['s_ShowName'],0,11,'utf-8');
                            ?>
                        </h3>
                </a>
            </div>
	<div id="Show" class="white_content">
          <div class="close">
                <a href="javascript:void(0)" onclick="hide('Show')"> 关闭</a>
          </div>
          <div class="con"> 
                <h2><?php echo $Show_row['s_ShowName'];?></h2> 
                <h6><?php echo '发布时间：',$Show_row['s_Publishtime'];?></h6>
                <h5><?php echo '&nbsp;',$Show_row['s_Content'];?></h5>
          </div>
	</div>
				 <?php
				 	$name = 0;
  					$Show_sql_result = mysql_query($Show_sql) or die("产品展示板块查询失败!");
                    while ($row=mysql_fetch_array($Show_sql_result)) 
                    {
                        if($name < 10)
                        {
                            $name++;
                            if($name > 1)
                            {
								?>
                        <a href="javascript:void(0)" onclick="more('Show<?php  echo $name;?>')">
                            <h5 class="Title" style="margin-top:-8px;">
                                <?php
                                  echo mb_substr($row['s_ShowName'],0,18,'utf-8');
                                ?>
                            </h5>
                        </a>
                          <div id="Show<?php  echo $name;?>" class="white_content">
                              <div class="close">
                                    <a href="javascript:void(0)" onclick="hide('Show<?php  echo $name;?>')"> 关闭</a>
                              </div>
                              <div class="con"> 
                                    <h2><?php echo $row['s_ShowName'];?></h2> 
                                    <h6><?php echo '发布时间：',$row['s_Publishtime'];?></h6>
                                    <h5><?php echo '&nbsp;',$row['s_Content'];?></h5>
                              </div>
                          </div>
       							<?php
                            }
                        }
                    }
                ?>
			<div style="text-align:right">
            	<a href="javascript:void(0)" onclick="more('Showmore')">更多</a>
            </div>
	
            <div id="Showmore" class="white_content">
                  <div class="close">
                        <a href="javascript:void(0)" onclick="hide('Showmore')"> 关闭</a>
                  </div>
                  <div class="con">
					<script language="javascript">
                        $(document).ready(function(){
                            changeShowpage(1);
                        });
                        function changeShowpage(Showpage){
                            $.post("page/show.php",{Showpage:Showpage},function(data){
                                $("#showpage").html(data);
                            });
                        }
                    </script>
                  	<ul id="showpage"></ul>
                    </div>
              </div>
            <?php
				mysql_free_result($Show_sql_result);
			?>
        </article>

    	<article class="product-item">
            <div class="img"><img src="images/product-item2.png" style=" margin-left:120px;"></div>
            <h1 style="margin-top:8px;">技术支持</h1>
            <div class="centerh3"><br>
                <a href="javascript:void(0)" onclick="more('Support')">
            	<h3>
					<?php
                        $Support_sql_result = mysql_query($Support_sql) or die("技术支持板块查询失败!");
                        $Support_row=mysql_fetch_array($Support_sql_result);
                        if(empty($Support_row))
                            echo '暂无数据';
                        else
                            echo mb_substr($Support_row['s_SupportName'],0,11,'utf-8');
                    ?>
                </h3>
				</a>
            </div>
	<div id="Support" class="white_content">
          <div class="close">
                <a href="javascript:void(0)" onclick="hide('Support')"> 关闭</a>
          </div>
          <div class="con"> 
                <h2><?php echo $Support_row['s_SupportName'];?></h2> 
                <h6><?php echo '发布时间：',$Support_row['s_Publishtime'];?></h6>
                <h5><?php echo '&nbsp;',$Support_row['s_Content'];?></h5>
          </div>
	</div>
        	<h5>
 				 <?php
				 	$name = 0;
  					$Support_sql_result = mysql_query($Support_sql) or die("技术支持板块查询失败!");
                    while ($row=mysql_fetch_array($Support_sql_result)) 
                    {
                        if($name < 10)
                        {
                            $name++;
                            if($name > 1)
                            {
								?>
           	<a href="javascript:void(0)" onclick="more('Support<?php  echo $name;?>')">
            <h5 class="Title" style="margin-top:-8px;">
                                <?php
                                	echo mb_substr($row['s_SupportName'],0,18,'utf-8');
								?>
			
            </h5>
			</a>
              <div id="Support<?php  echo $name;?>" class="white_content">
                  <div class="close">
                        <a href="javascript:void(0)" onclick="hide('Support<?php  echo $name;?>')"> 关闭</a>
                  </div>
                  <div class="con"> 
                        <h2><?php echo $row['s_SupportName'];?></h2> 
                        <h6><?php echo '发布时间：',$row['s_Publishtime'];?></h6>
                        <h5><?php echo '&nbsp;',$row['s_Content'];?></h5>
                  </div>
              </div>
       							 <?php
                            }
                        }
                    }
                ?>
            </h5>
			<div style="text-align:right">
            	<a href="javascript:void(0)" onclick="more('Supportmore')">更多</a>
            </div>
            <div id="Supportmore" class="white_content">
                  <div class="close">
                        <a href="javascript:void(0)" onclick="hide('Supportmore')"> 关闭</a>
                  </div>

                  <div class="con">
					<script language="javascript">
                        $(document).ready(function(){
                            changeSupportpage(1);
                        });
                        function changeSupportpage(Supportpage){
                            $.post("page/Support.php",{Supportpage:Supportpage},function(data){
                                $("#Supportpage").html(data);
                            });
                        }
                    </script>
                  	<ul id="Supportpage"></ul>
                  </div>
              </div>
            <?php
				mysql_free_result($Support_sql_result);
			?>
        </article>
    	<article class="product-item product-item-last">
           <div class="img"><img src="images/product-item3.png" style=" margin-left:120px;"></div>
            <h1 style="margin-top:8px;">关于我们</h1>
            <div class="centerh3"><br>
                <a href="javascript:void(0)" onclick="more('About')">
            	<h3>
            <?php
			$About_sql_result = mysql_query($About_sql) or die("关于我们板块查询失败!");
                        $About_row=mysql_fetch_array($About_sql_result);
                        if(empty($About_row))
                            echo '暂无数据';
						else
							echo mb_substr($About_row['a_AboutName'],0,11,'utf-8');
?>
            </h3>
			</a>
            </div>
                <a href="javascript:void(0)" onclick="more('About')">
            <h5 class="Title" style="margin-top:-8px;">
        <?php
		echo mb_substr($About_row['a_Content'],0,171,'utf-8');
		?>
            </h5>
            </a>
              <div id="About" class="white_content">
                  <div class="close">
                        <a href="javascript:void(0)" onclick="hide('About')"> 关闭</a>
                  </div>
                  <div class="con"> 
                        <h2><?php echo $About_row['a_AboutName'];?></h2> 
                        <h6><?php echo '发布时间：',$About_row['a_Publishtime'];?></h6>
                        <h5><?php echo '&nbsp;',$About_row['a_Content'];?></h5>
                  </div>
              </div>
              
			<div style="text-align:right;">
            <a href="javascript:void(0)" onclick="more('Aboutmore')">更多</a>
            </div>
              <div id="Aboutmore" class="white_content">
                  <div class="close">
                        <a href="javascript:void(0)" onclick="hide('Aboutmore')"> 关闭</a>
                  </div>
                  <div class="con">
                  
					<script language="javascript">
                        $(document).ready(function(){
                            changeAboutpage(1);
                        });
                        function changeAboutpage(Aboutpage){
                            $.post("page/About.php",{Aboutpage:Aboutpage},function(data){
                                $("#Aboutpage").html(data);
                            });
                        }
                    </script>
                  	<ul id="Aboutpage"></ul>
                  </div>
              </div>
              
            <?php
				mysql_free_result($About_sql_result);
			?>
        </article>
	</div>
</section>
<section class="jms-product ">
<div class="grid-990">
   		<div class="img"><img src="images/product-item1.png"></div><h1 style="margin-left:79px; margin-top:-52px;">产品下载</h1>
     <?php
	$name = 0;
  	$Download_sql_result = mysql_query($Download_sql) or die("产品下载板块查询失败!");
    while ($Download_row=mysql_fetch_array($Download_sql_result)) 
	{
              if($name < 8)
              {
                  $name++;
?>
                <div class="item">
                    <a href="#"><img src="<?php echo mb_substr( $Download_row['d_DownloadImage'],3,96,'utf-8');?>" alt="Cycliner" title="" width="238" height="180" onerror="nofind();"/></a>
                    <div class="caption">
                        <a href="javascript:void(0)" onclick="more('Download<?php  echo $name;?>')"><?php echo $Download_row['d_DownloadName'];?></a>
                        <p><?php echo mb_substr($Download_row['d_Introduction'],0,100,'utf-8');?></p>
                    </div>
                </div>
                <div id="Download<?php  echo $name;?>" class="white_content"  style="margin-top:1000px;">
                    <div class="close">
                        <a href="javascript:void(0)" onclick="hide('Download<?php  echo $name;?>')"> 关闭</a>
                    </div>
                    <div class="con"> 
                        <h2><?php echo $Download_row['d_DownloadName'];?></h2> 
                        <h6><?php echo '发布时间：',$Download_row['d_Publishtime'];?></h6>
                        <h5><?php echo '&nbsp;',$Download_row['d_Introduction'];?></h5>
                        <h5><a target="_blank" href="<?php echo mb_substr( $Download_row['d_Address'],3,96,'utf-8');?>" style="margin-left:75%">产品下载</a></h5>
                    </div>
                </div>
<?php
			  }
	}
	if($name >= 8)
	{
?>
			<div style="text-align:right;">
            <a href="javascript:void(0)" onclick="more('Downloadmore')">更多</a>
            </div>
<?php
	}
?> 
              <div id="Downloadmore" class="white_content" style="margin-top:1000px;">
                  <div class="close">
                        <a href="javascript:void(0)" onclick="hide('Downloadmore')"> 关闭</a>
                  </div>
                  <div class="con">
					<script language="javascript">
                        $(document).ready(function(){
                            changeDownloadpage(1);
                        });
                        function changeDownloadpage(Downloadpage){
                            $.post("page/Download.php",{Downloadpage:Downloadpage},function(data){
                                $("#Downloadpage").html(data);
                            });
                        }
                    </script>
                  	<ul id="Downloadpage"></ul>
                  </div>
              </div>
<div class="clear"></div>
    </div>
</section>

<section class="jms-skill ">    
	<div class="grid-990">
<?php

  	$game_sql_result = mysql_query($game_sql) or die("查询失败!");
	
	$game_sql_row = mysql_fetch_array($game_sql_result); 

?>
   		<div class="img">
        	<img src="images/gamelogo.png">
        </div>
        <h1 style="margin-left:79px; margin-top:-52px;"><?php echo $game_sql_row['g_GameName'];?></h1>
        <!--IMG border=0 SRC="images/game.png"-->
        <div class="gameimage">
        	<a href="javascript:void(0)" onclick="more('Game')">
            <?php
            if($game_sql_row['g_Content'] != ''){
				?>
            	<img src="<?php echo mb_substr( $game_sql_row['g_GameImage'],3,96,'utf-8');?>" width="990" height="325"  onerror="nofind();">
                <?php
                }
                ?>
            </a>
        </div>
        <div id="Game" class="white_content" style="margin-top:1400px;">
              <div class="close">
                    <a href="javascript:void(0)" onclick="hide('Game')"> 关闭</a>
              </div>
              <div class="con"> 
                    <h2><?php echo $game_sql_row['g_GameName'];?></h2> 
                    <h6><?php echo '发布时间：',$game_sql_row['g_Publishtime'];?></h6>
                    <h5><?php echo '&nbsp;',$game_sql_row['g_Content'];?></h5>
              </div>
        </div>
        <div class="downimage">
            <div class="Android"> 
                <div class="links"> 
                    <a <?php echo  'href="',mb_substr( $game_sql_row['g_AndroidAddress'],3,96,'utf-8'),'"';?>></a> 
                </div>
            </div> 
            <div class="iPhone"> 
                <div class="links"> 
                    <a <?php echo 'href="',mb_substr( $game_sql_row['g_IosAddress'],3,96,'utf-8'),'"';?>></a> 
                </div>	
            </div> 
            <div class="PC"> 
                <div class="links"> 
                    <a <?php echo 'href="',mb_substr( $game_sql_row['g_PcAddress'],3,96,'utf-8'),'"';?>></a> 
                </div>	
            </div> 
            <div class="WEB"> 
                <div class="links"> 
                    <a target="_blank" href="game.php"></a> 
                </div>	
            </div> 
        </div>
    </div>
</section>

<section class="jms-staff ">
<div class="grid-990">
   		<div class="img"><img src="images/product-item5.png"></div><h1 style="margin-left:79px; margin-top:-52px;">企业员工</h1>
 <?php
	$name = 0;
  	$Staff_sql_result = mysql_query($Staff_sql) or die("员工信息板块查询失败!");
    while ($row=mysql_fetch_array($Staff_sql_result)) 
	{
              if($name < 8)
              {
                  $name++;
?>
    <div class="item">
        <a href="#"><img src="<?php echo mb_substr( $row['s_StaffImage'],3,96,'utf-8');?>" alt="Cycliner" title="" width="238" height="180" onerror="nofind();"/></a>
        <div class="caption">
            <a <?php echo $row['s_Address'];?> ><?php echo $row['s_StaffName'];?></a>
            <p> <?php echo mb_substr($row['s_Introduction'],0,100,'utf-8');?></p>
        </div>
    </div>
<?php
			  }
			  else
			  break;
	}
?>
<div class="clear"></div>
    </div>
</section>

<section class="jms-touch">  
	<div class="grid-990" id="contents">
			<div class="section">
			<div class="img"><img src="images/product-item4.png"></div><h1 style="margin-left:79px; margin-top:-52px;">联系我们</h1>
				<div class="introduce"><h5>如果你有什么好的意见或者建议可以通过<br>电子邮件、电话、通信地址等方式与我们联系.</h5></div>
            <?php $code = mb_substr(str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890"),0,4,'utf-8');?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="message">
        		<input name="Name" type="text" placeholder="Name" maxlength=4  required/>   
        		<input name="Email" type="text" placeholder="Email" maxlength=32 required/>  
        		<input name="Subject" type="text" placeholder="Subject" maxlength=16 onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"/>  
				<textarea name="Content" type="text" placeholder="Content" maxlength=128  ></textarea>
                <input name="Code" type="text" placeholder="Code" maxlength="4" required style="width:200px;">
				<?php echo '<h4 style=" margin-top:-33px;margin-left:230px;">',$code,'<a href="javascript:document.location.reload()"style="margin-left:30px;">刷新一下</a></h4>';?>
				<input type="submit" name="submit" value="  发送  " style=" margin-top:-33px;"/>
			</form>
            <?php 
			if(isset($_POST['submit']))
			{
				$m_name = strip_tags($_POST['Name']);
				$m_email = strip_tags($_POST['Email']);
				$m_subject = strip_tags($_POST['Subject']);
				$myip=$_SERVER['REMOTE_ADDR'];
				$regdate = date("Y-m-d H:i:s", time());
				$m_content = strip_tags($_POST['Content']);
				$m_code =  strip_tags($_POST['Code']);
				if($code != $m_code)
				{
					echo "<script language=javascript>alert('验证码错误，请重新输入');history.back();</script>";
				}else
				{
				$check_query = mysql_query("select m_MessageId from t_Message where m_Name = '$m_name' && m_Email = '$m_email' && m_Subject = '$m_subject' &&m_Content = '$m_content'");
					if(!mysql_fetch_array($check_query))
					{
						$sql = "INSERT INTO t_Message(m_Name,m_Email,m_Subject,m_PublishIp,m_Publishtime,m_Content)
											VALUES('$m_name','$m_email','$m_subject','$myip','$regdate','$m_content')";
						if(mysql_query($sql,$con))
						{
							@header("refresh:0;url=index.php");
						}
						else
						{
							echo "<script language=javascript>alert('提交出现错误、请使用其它方式');history.back();</script>";
						}
					}
				}
			}
			?>
		</div>
		<div class="section contact">
        <?php
		  	$Contact_sql_result = mysql_query($Contact_sql) or die("联系我们板块查询失败!");
			while ($row=mysql_fetch_array($Contact_sql_result)) 
			{
		?>
				<h6>查询请致电：</h6>
            <p>
            <span><?php echo $row['c_Phone'];?></span>
			</p>
				<h6>或者你可以访问我们的公司：</h6>
			<p><span>
				<?php echo $row['c_Address1'];?><br>
				<?php echo $row['c_Address2'];?><br>
				<?php echo $row['c_Address3'];?><br>
				<?php echo $row['c_Address4'];?>室<br>
				邮编：<?php echo $row['c_code'];?>
            </span></p>
		<?php
                    break;
        }
        mysql_free_result($Contact_sql_result);
        ?>
		</div>
    </div> 
 </section>
 
    <div class="bottominfo">
    	<br>
    		<p>京ICP备X-ABCDEFG号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;京网文【2013】07-11ABCDEFG号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;新出网证&lt;京&gt;字123456号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;京ICP证ABCDEFG-123456号</p>
 <a href="admin/index.php">　.　</a>
    </div>

 <script type="text/javascript" language="javascript">  
<!-- 置顶 -->
    (function() {
    var $backToTopTxt = "▲返回顶部", $backToTopEle = $('<div class="backToTop"></div>').appendTo($("body"))
    .text($backToTopTxt).attr("title", $backToTopTxt).click(function() {
    $("html, body").animate({ scrollTop: 0 }, 120);
    }), $backToTopFun = function() {
    var st = $(document).scrollTop(), winh = $(window).height();
    (st > 0)? $backToTopEle.show(): $backToTopEle.hide();
    //IE6下的定位
    if (!window.XMLHttpRequest) {
    $backToTopEle.css("top", st + winh - 166);
    }
    };
    $(window).bind("scroll", $backToTopFun);
    $(function() { $backToTopFun(); });
    })();
	//弹出窗口
	function more(tag){
	 var light=document.getElementById(tag);
	 var fade=document.getElementById('fade');
	 light.style.display='block';
	 fade.style.display='block';
	 }
	//关闭弹窗
	function hide(tag){
	 var light=document.getElementById(tag);
	 var fade=document.getElementById('fade');
	 light.style.display='none';
	 fade.style.display='none';
	}
	//更多弹出窗口
	function moreopen(tag){
	 var light=document.getElementById(tag);
	 var more=document.getElementById('more');
	 light.style.display='block';
	 more.style.display='block';
	 }
	//关闭更多弹窗
	function morehide(tag){
	 var light=document.getElementById(tag);
	 var more=document.getElementById('more');
	 light.style.display='none';
	 more.style.display='none';
	}
	//相册
	$(document).ready(function() {

	//move the image in pixel
	var move = -15;
	
	//zoom percentage, 1.2 =120%
	var zoom = 1.2;

	//On mouse over those thumbnail
	$('.item').hover(function() {
		
		//Set the width and height according to the zoom percentage
		width = $('.item').width() * zoom;
		height = $('.item').height() * zoom;
		
		//Move and zoom the image
		$(this).find('img').stop(false,true).animate({'width':width, 'height':height, 'top':move, 'left':move}, {duration:200});
		
		//Display the caption
		$(this).find('div.caption').stop(false,true).fadeIn(200);
	},
	function() {
		//Reset the image
		$(this).find('img').stop(false,true).animate({'width':$('.item').width(), 'height':$('.item').height(), 'top':'0', 'left':'0'}, {duration:100});	

		//Hide the caption
		$(this).find('div.caption').stop(false,true).fadeOut(200);
	});

});

	function nofind(){
	
	var img=event.srcElement;
	
	img.src="images/Error.jpg";
	
	img.onerror=null; 
	
	}
</script>

<script src="js/jquery.min.js"></script>

<script src="js/jmpress.min.js"></script>

<script src="js/jquery.jmslideshow.js"></script>

<script src="js/script.js"></script>

<div id="fade" class="black_overlay"></div>

<div id="more" class="black_overlay"></div>

</body>

</html>
