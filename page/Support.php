<?php
require_once("../My_SQL/_My_SQL_link_All.php");
if(isset($_POST["Supportpage"])){
    @$Supportpage = max(1, intval($_POST["Supportpage"]));
    $Supportpagesize=20;
    $startindex=($Supportpage-1)*$Supportpagesize;
    $Support_sql_limit="SELECT `s_SupportName`,`s_Publishtime`,`s_Content` FROM `t_Support` order by s_SupportId DESC LIMIT $startindex,$Supportpagesize";
    $Support_limit=mysql_query($Support_sql_limit);
		$name = 0;
		$str = '';
    while($Supportrow=mysql_fetch_array($Support_limit)){
			$name++;
		?>
			<a href="javascript:void(0)" onclick="moreopen('SupportContent<?php  echo $name;?>')">
				<h4 class="Title">
				<?php
					echo $Supportrow['s_SupportName'];
				?>
				</h4>
				<h3 class="Title">
					<?php
						echo mb_substr($Supportrow['s_Publishtime'],0,10,'utf-8');
					?>
				</h3>
			</a>
			  <div id="SupportContent<?php  echo $name;?>" class="page_content">
				  <div class="close">
						<a href="javascript:void(0)" onclick="morehide('SupportContent<?php  echo $name;?>')"> 关闭</a>
				  </div>
				  <div class="con"> 
						<h2><?php echo $Supportrow['s_SupportName'];?></h2> 
						<h6><?php echo '发布时间：',$Supportrow['s_Publishtime'];?></h6>
						<h5><?php echo '&nbsp;',$Supportrow['s_Content'];?></h5>
				  </div>
			  </div>
			<?php

    }
		
    $Support_sql_num=mysql_num_rows(mysql_query("select * from t_Support"));
    $Supportpagenum=@ceil($Support_sql_num/$Supportpagesize);
    for($i=1;$i<=$Supportpagenum;$i++){
        if($Supportpage==$i){
            $str.="<a href='javascript:void(0)' onclick=changeSupportpage(".$i.")>[".$i."]</a>&nbsp;&nbsp;&nbsp;";
        }else{
            $str.="<a href='javascript:void(0)' onclick=changeSupportpage(".$i.")>".$i."</a>&nbsp;&nbsp;&nbsp;";
        }
    }
    echo "<div  class='page'><a href='javascript:void(0)' onclick=changeSupportpage(1)>[首页]</a>&nbsp;&nbsp;&nbsp;";
    echo $str;
    echo "<a href='javascript:void(0)' onclick=changeSupportpage(".$Supportpagenum.")>[尾页]</a></div>&nbsp;&nbsp;&nbsp;";
}else{
    die();
}
?>