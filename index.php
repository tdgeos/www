<?php
	require_once("My_SQL/_My_SQL_link_All.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-CN" />
<meta name="author" content="Powerless" /> 
<meta name="Copyright" content="北京思行伟业数码科技有限公司" /> 
<meta name="description" content="<?php echo $Keyword_sql_row['k_Description'];?>" /> 
<meta name="keywords" content="<?php echo $Keyword_sql_row['k_Keywords'];?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
	mysql_free_result($Keyword_sql_result);
?>
<title>北京思行伟业数码科技有限公司</title>
<link rel="shortcut icon" href="images/ico.png" type="Styles/res/x-icon">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" language="javascript">  
	function nofind(){
	var img=event.srcElement;
	img.src="images/loaded.gif";
	img.onerror=null; 
	}
</script>
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
		<a href="http://www.tdgeos.com/">
        	<img src="images/logo.png">
        </a>
</div>
<div id="slider-container">
<section id="jms-slideshow" class="jms-slideshow">
<?php
	if(!$Slide_sql_row1['s_Image'] == "")
	{
?>
<div class="step" data-image="<?php echo mb_substr($Slide_sql_row1['s_Image'],3,96,'utf-8');?>" data-image-w="1920" data-image-h="480" data-x="2000" data-y="1000" data-z="3000" data-rotate="-20">
<div class="jms-content">
<h2><?php echo mb_substr($Slide_sql_row1['s_Name'],0,7,'utf-8');?></h2>
<p><span><?php echo mb_substr($Slide_sql_row1['s_Content'],0,50,'utf-8');?></span></p>
<a class="jms-link button large" href="javascript:void(0)" onclick="more('Slide1')">查看</a>
</div>
</div>
<?php
	}
	if(!$Slide_sql_row2['s_Image'] == "")
	{
?>
<div class="step" data-image="<?php echo mb_substr( $Slide_sql_row2['s_Image'],3,96,'utf-8');?>" data-image-w="1920" data-image-h="480" data-x="1000" data-z="2000" data-rotate="20">
<div class="jms-content">
<h2><?php echo mb_substr($Slide_sql_row2['s_Name'],0,7,'utf-8');?></h2>
<p><span><?php echo mb_substr($Slide_sql_row2['s_Content'],0,50,'utf-8');?></span></p>
<a class="jms-link button large" href="javascript:void(0)" onclick="more('Slide2')">查看</a>
</div>
</div>
<?php
	}
	if(!$Slide_sql_row3['s_Image'] == "")
	{
?>
<div class="step" data-image="<?php echo mb_substr( $Slide_sql_row3['s_Image'],3,96,'utf-8');?>" data-image-w="1920" data-image-h="480" data-x="2000" data-y="1500" data-z="1000" data-rotate="20">
<div class="jms-content">
<h2><?php echo mb_substr($Slide_sql_row3['s_Name'],0,7,'utf-8');?></h2>
<p><span><?php echo mb_substr($Slide_sql_row3['s_Content'],0,50,'utf-8');?></span></p>
<a class="jms-link button large" href="javascript:void(0)" onclick="more('Slide3')">查看</a>
</div>
</div>
<?php
	}
	if(!$Slide_sql_row4['s_Image'] == "")
	{
?>
<div class="step" data-image="<?php echo mb_substr( $Slide_sql_row4['s_Image'],3,96,'utf-8');?>" data-image-w="1920" data-image-h="480" data-x="3000" data-y="2000">
<div class="jms-content">
<h2><?php echo mb_substr($Slide_sql_row4['s_Name'],0,7,'utf-8');?></h2>
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
	if(!$Slide_sql_row1['s_Image'] == "")
	{
?>
	<div id="Slide1" class="Slide_content">
          <div class="close">
                <a href="javascript:void(0)" onclick="hide('Slide1')"> 关闭</a>
          </div>
          <div class="con"> 
                <h2><?php echo $Slide_sql_row1['s_Name'];?></h2> 
                <h6><?php echo '发布时间：',$Slide_sql_row1['s_Publishtime'];?></h6>
                <h5><?php echo '&nbsp;',$Slide_sql_row1['s_Content'];?></h5>
          </div>
	</div>
<?php
	}
	mysql_free_result($Slide_sql_result1);
?>
<?php
	if(!$Slide_sql_row2['s_Image'] == "")
	{
?>
	<div id="Slide2" class="Slide_content">
          <div class="close">
                <a href="javascript:void(0)" onclick="hide('Slide2')"> 关闭</a>
          </div>
          <div class="con"> 
                <h2><?php echo $Slide_sql_row2['s_Name'];?></h2> 
                <h6><?php echo '发布时间：',$Slide_sql_row2['s_Publishtime'];?></h6>
                <h5><?php echo '&nbsp;',$Slide_sql_row2['s_Content'];?></h5>
          </div>
	</div>
<?php
	}
	mysql_free_result($Slide_sql_result2);
?>
<?php
	if(!$Slide_sql_row3['s_Image'] == "")
	{
?>
	<div id="Slide3" class="Slide_content">
          <div class="close">
                <a href="javascript:void(0)" onclick="hide('Slide3')"> 关闭</a>
          </div>
          <div class="con"> 
                <h2><?php echo $Slide_sql_row3['s_Name'];?></h2> 
                <h6><?php echo '发布时间：',$Slide_sql_row3['s_Publishtime'];?></h6>
                <h5><?php echo '&nbsp;',$Slide_sql_row3['s_Content'];?></h5>
          </div>
	</div>
<?php
	}
	mysql_free_result($Slide_sql_result3);
?>
<?php
	if(!$Slide_sql_row4['s_Image'] == "")
	{
?>
	<div id="Slide4" class="Slide_content">
          <div class="close">
                <a href="javascript:void(0)" onclick="hide('Slide4')"> 关闭</a>
          </div>
          <div class="con"> 
                <h2><?php echo $Slide_sql_row4['s_Name'];?></h2> 
                <h6><?php echo '发布时间：',$Slide_sql_row4['s_Publishtime'];?></h6>
                <h5><?php echo '&nbsp;',$Slide_sql_row4['s_Content'];?></h5>
          </div>
	</div>
<?php
	}
	mysql_free_result($Slide_sql_result4);
?>
<section class="jms-synth">
	<div class="grid-990">
    	<article class="product-item">
            <div class="img"><img src="images/product.png" style=" margin-left:120px;" onerror="nofind();" width="79" height="79"></div>
            <h1 style="margin-top:8px;">产品展示</h1>
            <div class="centerh3"><br>
                <a href="javascript:void(0)" onclick="more('Show')">
                        <h3>
                            <?php
                                 if(empty($Show_row))
                                    echo '暂无数据';
                                 else
                                    echo mb_substr($Show_row['s_Name'],0,11,'utf-8');
                            ?>
                        </h3>
                </a>
            </div>
            <a href="javascript:void(0)" onclick="more('Show')">
                <h5 class="synth" style="margin-top:-8px;">
                    <?php
                        echo htmlspecialchars_decode($Show_row['s_Content']);
                    ?>
                </h5>
            </a>
            <div id="Show" class="white_content" style="margin-top:562px;">
                  <div class="close">
                        <a href="javascript:void(0)" onclick="hide('Show')"> 关闭</a>
                  </div>
                  <div class="con"> 
                        <h2><?php echo $Show_row['s_Name'];?></h2> 
                        <h6><?php echo '发布时间：',$Show_row['s_Publishtime'];?></h6>
                        <h5><?php echo htmlspecialchars_decode($Show_row['s_Content']);?></h5>
                  </div>
            </div>
			<div style="text-align:right">
            	<a href="javascript:void(0)" onclick="more('Showmore')">更多</a>
            </div>
            <div id="Showmore" class="white_content" style="margin-top:562px;">
                  <div class="close">
                        <a href="javascript:void(0)" onclick="hide('Showmore')"> 关闭</a>
                  </div>
                  <div class="con">
					<script language="javascript">
                        $(document).ready(function(){
                            changeShowpage(1);
                        });
                        function changeShowpage(Showpage){
                            $.post("page/Show.php",{Showpage:Showpage},function(data){
                                $("#showpage").html(data);
                            });
                        }
                    </script>
                  	<ul id="showpage"></ul>
              </div>
          </div>
            <?php
				mysql_free_result($Show_sql_list);
			?>
        </article>
    	<article class="product-item">
            <div class="img"><img src="images/technology.png" style=" margin-left:120px;" onerror="nofind();" width="79" height="79"></div>
            <h1 style="margin-top:8px;">技术支持</h1>
            <div class="centerh3"><br>
                <a href="javascript:void(0)" onclick="more('Support')">
					<h3>
            			<?php
							if(empty($Support_row))
								echo '暂无数据';
							else
								echo mb_substr($Support_row['s_Name'],0,11,'utf-8');
						?>
					</h3>
				</a>
            </div>
                <a href="javascript:void(0)" onclick="more('Support')">
                <h5 class="synth" style="margin-top:-8px;">
                    <?php
                        echo htmlspecialchars_decode($Support_row['s_Content']);
                    ?>
                </h5>
            </a>
            <div id="Support" class="white_content" style="margin-top:562px;">
                  <div class="close">
                        <a href="javascript:void(0)" onclick="hide('Support')"> 关闭</a>
                  </div>
                  <div class="con"> 
                        <h2><?php echo $Support_row['s_Name'];?></h2> 
                        <h6><?php echo '发布时间：',$Support_row['s_Publishtime'];?></h6>
                        <h5><?php echo '&nbsp;',htmlspecialchars_decode($Support_row['s_Content']);?></h5>
                  </div>
            </div>
			<div style="text-align:right">
            	<a href="javascript:void(0)" onclick="more('Supportmore')">更多</a>
            </div>
            <div id="Supportmore" class="white_content" style="margin-top:562px;">
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
				mysql_free_result($Support_sql_list);
			?>
        </article>
    	<article class="product-item product-item-last">
           <div class="img"><img src="images/about.png" style=" margin-left:120px;" onerror="nofind();" width="79" height="79"></div>
            <h1 style="margin-top:8px;">关于我们</h1>
            <div class="centerh3"><br>
                <a href="javascript:void(0)" onclick="more('About')">
					<h3>
            			<?php
                        if(empty($About_row))
                            echo '暂无数据';
						else
							echo mb_substr($About_row['a_Name'],0,11,'utf-8');
						?>
					</h3>
				</a>
            </div>
            <a href="javascript:void(0)" onclick="more('About')">
                <h5 class="synth" style="margin-top:-8px;">
                    <?php
                        echo htmlspecialchars_decode($About_row['a_Content']);
                    ?>
                </h5>
            </a>
              <div id="About" class="white_content" style="margin-top:562px;">
                  <div class="close">
                        <a href="javascript:void(0)" onclick="hide('About')"> 关闭</a>
                  </div>
                  <div class="con"> 
                        <h2><?php echo $About_row['a_Name'];?></h2> 
                        <h6><?php echo '发布时间：',$About_row['a_Publishtime'];?></h6>
                        <h5><?php echo '&nbsp;',htmlspecialchars_decode($About_row['a_Content']);?></h5>
                  </div>
              </div>
                    <div style="text-align:right;">
                        <a href="javascript:void(0)" onclick="more('Aboutmore')">更多</a>
                    </div>
                <div id="Aboutmore" class="white_content" style="margin-top:562px;">
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
<div class="clear-synth"></div>
</section>
<section class="jms-product">
<div class="grid-990">
   		<div class="img">
        	<img src="images/product.png" onerror="nofind();" width="79" height="79">
        </div>
        <h1 style="margin-left:79px; margin-top:-52px;">经典案例</h1>
     <?php
    while ($Product_row=mysql_fetch_array($Product_sql_list)) 
	{
              if($name < 4)
              {
              $name++;
	?>
                <div class="item">
                    <a href="#"><img src="<?php echo mb_substr($Product_row['p_Image'],3,96,'utf-8');?>" width="238" height="174" onerror="nofind();"/></a>
                    <div class="caption">
                        <a href="javascript:void(0)" onclick="more('Product<?php  echo $name;?>')"><?php echo $Product_row['p_Name'];?></a>
                        <p><?php echo htmlspecialchars_decode(mb_substr($Product_row['p_Introduction'],0,100,'utf-8'));?></p>
                    </div>
                </div>
                <div id="Product<?php echo $name;?>" class="white_content"  style="margin-top:1042px;">
                    <div class="close">
                        <a href="javascript:void(0)" onclick="hide('Product<?php  echo $name;?>')"> 关闭</a>
                    </div>
                    <div class="con"> 
                        <h2><?php echo $Product_row['p_Name'];?></h2> 
                        <h6><?php echo '发布时间：',$Product_row['p_Publishtime'];?></h6>
                        <h5><?php echo '&nbsp;',htmlspecialchars_decode($Product_row['p_Introduction']);?></h5>
                        <h5><a target="_blank" href="<?php echo mb_substr( $Product_row['p_Address'],3,96,'utf-8');?>" style="margin-left:75%">产品下载</a></h5>
                        <img src="<?php echo mb_substr($Product_row['p_Image'],3,96,'utf-8');?>" onerror="nofind();" onload="if(this.width >= 715){this.width = 715}"/>
                    </div>
                </div>
<?php
			  }
	}
	if($name >= 4)
	{
?>
			<div style="text-align:right;">
            <a href="javascript:void(0)" onclick="more('Productmore')">更多</a>
            </div>
<?php
	}
?> 
              <div id="Productmore" class="white_content" style="margin-top:1040px;">
                  <div class="close">
                        <a href="javascript:void(0)" onclick="hide('Productmore')"> 关闭</a>
                  </div>
                  <div class="con">
					<script language="javascript">
                        $(document).ready(function(){
                            changeProductpage(1);
                        });
                        function changeProductpage(Productpage){
                            $.post("page/Product.php",{Productpage:Productpage},function(data){
                                $("#Productpage").html(data);
                            });
                        }
                    </script>
                  	<ul id="Productpage"></ul>
                  </div>
              </div>
            <?php
            mysql_free_result($Product_sql_list);
            ?>
<div class="clear"></div>
  </div>
</section>

<section class="jms-skill">    
	<div class="grid-990">
   		<div class="img">
        	<img src="images/welfare.png" onerror="nofind();" width="79" height="79">
        </div>
        <h1 style="margin-left:79px; margin-top:-52px;">公益产品</h1>
        <div class="welfareimage">
        	<a href="javascript:void(0)" onclick="more('welfare')">
            <?php
            if($Welfare_sql_row['w_Content'] != '')
			{
			?>
            	<img src="<?php echo mb_substr( $Welfare_sql_row['w_Image'],3,96,'utf-8');?>" width="990" height="160"  onerror="nofind();">
            <?php
            }
            ?>
            </a>
        </div>
        <div id="welfare" class="white_content" style="margin-top:1332px;">
              <div class="close">
                    <a href="javascript:void(0)" onclick="hide('welfare')"> 关闭</a>
              </div>
              <div class="con"> 
                    <h2><?php echo $Welfare_sql_row['w_Name'];?></h2> 
                    <h6><?php echo '发布时间：',$Welfare_sql_row['w_Publishtime'];?></h6>
                    <h5><?php echo '&nbsp;',htmlspecialchars_decode($Welfare_sql_row['w_Content']);?></h5>
              </div>
        </div>
        <div class="downimage">
            <div class="Android"> 
                <div class="links"> 
                    <a <?php echo  'href="',mb_substr( $Welfare_sql_row['w_Android'],3,96,'utf-8'),'"';?>></a> 
                </div>
            </div> 
            <div class="iPhone"> 
                <div class="links"> 
                    <a <?php echo 'href="',mb_substr( $Welfare_sql_row['w_Ios'],3,96,'utf-8'),'"';?>></a> 
                </div>	
            </div> 
            <div class="PC"> 
                <div class="links"> 
                    <a <?php echo 'href="',mb_substr( $Welfare_sql_row['w_Pc'],3,96,'utf-8'),'"';?>></a> 
                </div>	
            </div> 
            <div class="WEB"> 
                <div class="links"> 
                    <a target="_blank" href="welfare.php"></a> 
                </div>	
            </div> 
        </div>
            <?php
            mysql_free_result($Welfare_sql_result);
            ?>
<div class="clear"></div>
    </div>
</section>

<section class="jms-Cooperation">
	<div class="grid-990">
   		<div class="img">
        <img src="images/cooperation.png" onerror="nofind();" width="79" height="79">
        </div>
        <h1 style="margin-left:79px; margin-top:-52px;">合作伙伴</h1>
        <DIV id=rolling class="roll" style="OVERFLOW: hidden;">
        <TABLE cellPadding="0" border="0" cellspace="0">
          <TBODY>
          <TR>
            <TD id=rolling1>
              <TABLE cellPadding="4" border="0" id="tupian">
                <TBODY>
                <TR>
                
             <?php
                while ($Cooperation_row=mysql_fetch_array($Cooperation_sql_list)) 
                {
            ?>
                 <TD>
                 <img src="<?php echo mb_substr( $Cooperation_row['c_Image'],3,96,'utf-8');?>" width="190" height="170" onerror="nofind();"/>
                 <div style="margin-top:170px; width:190px; text-align:center">
                 <A target = "_blank" <?php echo $Cooperation_row['c_Url'];?>>
                 	<h5 style="margin:0px;"><?php echo $Cooperation_row['c_Name'];?></h5>
                 </A>
                 </div>
                 </TD>            
            <?php
                }
            ?>
                 </TR></TBODY></TABLE></TD>
                                   
            <TD id=rolling2 vAlign=top></TD></TR></TBODY></TABLE>
            <?php
            mysql_free_result($Cooperation_sql_list);
            ?>
      </DIV>
	<div class="clear"></div>
    </div>
</section>
<section class="jms-touch">  
	<div class="grid-990" id="contents">
			<div class="section">
			<div class="img">
            <img src="images/contact.png" onerror="nofind();" width="79" height="79">
            </div>
            <h1 style="margin-left:79px; margin-top:-52px;">联系我们</h1>
				<div class="introduce"><h5>如果你有什么好的意见或者建议可以通过<br>电子邮件、电话、通信地址等方式与我们联系.</h5></div>
            <?php $code = mb_substr(str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890"),0,4,'utf-8');?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="message">
        		<input name="Name" type="text" placeholder="Name" maxlength=4  required/>   
        		<input name="Email" type="text" placeholder="Email" maxlength=32 required/>  
        		<input name="Subject" type="text" placeholder="Subject" maxlength=16 onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"/>  
				<textarea name="Content" type="text" placeholder="Content" maxlength=128  ></textarea>
                <input name="Code" type="text" placeholder="Code" maxlength="4" required style="width:200px;">
				<?php echo '<h4 style=" margin-top:-33px;margin-left:250px;">',$code,'</h4>';?>
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
				$m_content = htmlspecialchars(strip_tags($_POST['Content']));
				$m_code =  strip_tags($_POST['Code']);
				if($code != $m_code)
				{
					echo "<script language=javascript>alert('验证码错误，请重新输入');history.back();</script>";
				}else
				{
				$check_query = mysql_query("select m_Id from t_Message where m_Name = '$m_name' && m_Email = '$m_email' && m_Subject = '$m_subject' &&m_Content = '$m_content'");
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
				<h6>查询请致电：</h6>
            <p>
            <span><?php echo $Contact_row['c_Phone'];?></span>
			</p>
				<h6>QQ群：</h6>
			<p><span>
				<?php echo $Contact_row['c_Crowd'];?>
            </span></p>
				<h6>微博：</h6>
			<p><span>
				<a target="_blank" href="http://<?php echo $Contact_row['c_Blog'];?>"><?php echo $Contact_row['c_Blog'];?></a>
            </span></p>
				<h6>公众号：</h6>
			<p><span>
            	<img src="<?php echo mb_substr($Contact_row['c_Public'],3,96,'utf-8');?>" width="120" height="120" onerror="nofind();" style="margin-left:-60px;"/>
            </span></p>
		<?php
        mysql_free_result($Contact_sql_result);
        ?>
		</div>
    </div> 
</section>
    <div class="bottominfo">
    	<br>
    		<p>Copyright &copy; 2009 - <?php echo date("Y", time());?>
        <a href="http://www.tdgeos.com/" target = "_blank">北京思行伟业数码科技有限公司</a> by 
        <a href="http://t.qq.com/wzxaini9" target = "_blank">"Powerless"</a> All Rights Reserved.<br>
        ICP备案主体信息：<a href="http://www.miitbeian.gov.cn" target="_blank">京ICP备<?php echo $Record_row['r_ICPmain']?></a>
        ICP备案网站信息：<a href="http://www.miitbeian.gov.cn" target="_blank">京ICP备<?php echo $Record_row['r_ICPweb']?></a>
        <div style="display:none">
		<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1000202067'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1000202067' type='text/javascript'%3E%3C/script%3E"));</script></p>
        <script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Ff6da2005ddb27682f55dd88669852893' type='text/javascript'%3E%3C/script%3E"));
</script></div>
    	<br>
		<?php
        mysql_free_result($Record_sql_result);
		mysql_close($con);
        ?>
    </div>
<script type="text/javascript" language="javascript">  
	//置顶
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
</script>
<script type="text/javascript" language="javascript">  
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
	//经典案例
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
</script>
<script type="text/javascript" language="javascript">  
  var speed1=20//速度数值越大速度越慢
  document.getElementById("rolling2").innerHTML=document.getElementById("rolling1").innerHTML
  function Marquee1(){
  if(document.getElementById("rolling2").offsetWidth-document.getElementById("rolling").scrollLeft<=0)
  document.getElementById("rolling").scrollLeft-=document.getElementById("rolling1").offsetWidth
  else{
  document.getElementById("rolling").scrollLeft++
  }
  }
  var MyMar1=setInterval(Marquee1,speed1)
  document.getElementById("rolling").onmouseover=function () {clearInterval(MyMar1)}
  document.getElementById("rolling").onmouseout=function () {MyMar1=setInterval(Marquee1,speed1)}
</script>
<script src="js/jquery.min.js"></script>
<script src="js/jmpress.min.js"></script>
<script src="js/jquery.jmslideshow.js"></script>
<script src="js/script.js"></script>
<div id="fade" class="black_overlay"></div>
<div id="more" class="black_overlay"></div>
</body>
</html>
