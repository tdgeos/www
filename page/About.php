<?php
require_once("../My_SQL/_My_SQL_link_All.php");
if(isset($_POST["Aboutpage"])){
    @$Aboutpage = max(1, intval($_POST["Aboutpage"]));
    $Aboutpagesize=20;
    $startindex=($Aboutpage-1)*$Aboutpagesize;
    $About_sql_limit="SELECT `a_AboutName`,`a_Publishtime`,`a_Content` FROM `t_About` order by a_AboutId DESC LIMIT $startindex,$Aboutpagesize";
    $About_limit=mysql_query($About_sql_limit);
		$name = 0;
		$str = '';
    while($Aboutrow=mysql_fetch_array($About_limit)){
			$name++;
		?>
			<a href="javascript:void(0)" onclick="moreopen('AboutContent<?php  echo $name;?>')">
				<h4 class="Title">
				<?php
					echo $Aboutrow['a_AboutName'];
				?>
				</h4>
				<h3 class="Title">
					<?php
						echo mb_substr($Aboutrow['a_Publishtime'],0,10,'utf-8');
					?>
				</h3>
			</a>
			  <div id="AboutContent<?php  echo $name;?>" class="page_content">
				  <div class="close">
						<a href="javascript:void(0)" onclick="morehide('AboutContent<?php  echo $name;?>')"> 关闭</a>
				  </div>
				  <div class="con"> 
						<h2><?php echo $Aboutrow['a_AboutName'];?></h2> 
						<h6><?php echo '发布时间：',$Aboutrow['a_Publishtime'];?></h6>
						<h5><?php echo '&nbsp;',$Aboutrow['a_Content'];?></h5>
				  </div>
			  </div>
			<?php

    }
		
    $About_sql_num=mysql_num_rows(mysql_query("select * from t_About"));
    $Aboutpagenum=@ceil($About_sql_num/$Aboutpagesize);
    for($i=1;$i<=$Aboutpagenum;$i++){
        if($Aboutpage==$i){
            $str.="<a href='javascript:void(0)' onclick=changeAboutpage(".$i.")>[".$i."]</a>&nbsp;&nbsp;&nbsp;";
        }else{
            $str.="<a href='javascript:void(0)' onclick=changeAboutpage(".$i.")>".$i."</a>&nbsp;&nbsp;&nbsp;";
        }
    }
    echo "<div  class='page'><a href='javascript:void(0)' onclick=changeAboutpage(1)>[首页]</a>&nbsp;&nbsp;&nbsp;";
    echo $str;
    echo "<a href='javascript:void(0)' onclick=changeAboutpage(".$Aboutpagenum.")>[尾页]</a></div>&nbsp;&nbsp;&nbsp;";
}else{
    die();
}
?>