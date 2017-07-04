<?php
require_once("../My_SQL/_My_SQL_link_All.php");
if(isset($_POST["Showpage"])){
    @$Showpage = max(1, intval($_POST["Showpage"]));
    $Showpagesize=20;
    $startindex=($Showpage-1)*$Showpagesize;
    $Show_sql_limit="SELECT `s_Name`,`s_Publishtime`,`s_Content` FROM `t_Show` order by s_Id DESC LIMIT $startindex,$Showpagesize";
    $Show_limit=mysql_query($Show_sql_limit);
    while($Show_row=mysql_fetch_array($Show_limit)){
			$name++;
		?>
			<a href="javascript:void(0)" onclick="moreopen('ShowContent<?php  echo $name;?>')">
				<h4 class="Title">
				<?php
					echo $Show_row['s_Name'];
				?>
				</h4>
				<h3 class="Title">
					<?php
						echo mb_substr($Show_row['s_Publishtime'],0,10,'utf-8');
					?>
				</h3>
			</a>
			  <div id="ShowContent<?php  echo $name;?>" class="page_content">
				  <div class="close">
						<a href="javascript:void(0)" onclick="morehide('ShowContent<?php  echo $name;?>')"> 关闭</a>
				  </div>
				  <div class="con"> 
						<h2><?php echo $Show_row['s_Name'];?></h2> 
						<h6><?php echo '发布时间：',$Show_row['s_Publishtime'];?></h6>
						<h5><?php echo '&nbsp;',htmlspecialchars_decode($Show_row['s_Content']);?></h5>
				  </div>
			  </div>
			<?php

    }
    $Showpagenum=@ceil($Show_sql_num/$Showpagesize);
    for($i=1;$i<=$Showpagenum;$i++){
        if($Showpage==$i){
            $str.="<a href='javascript:void(0)' onclick=changeShowpage(".$i.")>[".$i."]</a>&nbsp;&nbsp;&nbsp;";
        }else{
            $str.="<a href='javascript:void(0)' onclick=changeShowpage(".$i.")>".$i."</a>&nbsp;&nbsp;&nbsp;";
        }
    }
    echo "<div  class='page'><a href='javascript:void(0)' onclick=changeShowpage(1)>[首页]</a>&nbsp;&nbsp;&nbsp;";
    echo $str;
    echo "<a href='javascript:void(0)' onclick=changeShowpage(".$Showpagenum.")>[尾页]</a></div>&nbsp;&nbsp;&nbsp;";
}else{
    die();
}
?>