<?php
require_once("../My_SQL/_My_SQL_link_All.php");
if(isset($_POST["Downloadpage"])){
    @$Downloadpage = max(1, intval($_POST["Downloadpage"]));
    $Downloadpagesize=20;
    $startindex=($Downloadpage-1)*$Downloadpagesize;
    $Download_sql_limit="SELECT `d_DownloadName`,`d_Publishtime`,`d_Address`,`d_Introduction` FROM `t_Download` order by d_DownloadId DESC LIMIT $startindex,$Downloadpagesize";
    $Download_limit=mysql_query($Download_sql_limit);
		$name = 0;
		$str = '';
    while($Downloadrow=mysql_fetch_array($Download_limit)){
			$name++;
		?>
			<a href="javascript:void(0)" onclick="moreopen('DownloadContent<?php  echo $name;?>')">
				<h4 class="Title">
				<?php
					echo $Downloadrow['d_DownloadName'];
				?>
				</h4>
				<h3 class="Title">
					<?php
						echo mb_substr($Downloadrow['d_Publishtime'],0,10,'utf-8');
					?>
				</h3>
			</a>
			  <div id="DownloadContent<?php  echo $name;?>" class="page_content">
				  <div class="close">
						<a href="javascript:void(0)" onclick="morehide('DownloadContent<?php  echo $name;?>')"> 关闭</a>
				  </div>
				  <div class="con"> 
						<h2><?php echo $Downloadrow['d_DownloadName'];?></h2> 
						<h6><?php echo '发布时间：',$Downloadrow['d_Publishtime'];?></h6>
						<h5><?php echo '&nbsp;',$Downloadrow['d_Introduction'];?></h5>
                        <h5><a target="_blank" href="<?php echo mb_substr( $Downloadrow['d_Address'],3,96,'utf-8');?>" style="margin-left:75%">产品下载</a></h5>
				  </div>
			  </div>
			<?php

    }
		
    $Download_sql_num=mysql_num_rows(mysql_query("select * from t_Download"));
    $Downloadpagenum=@ceil($Download_sql_num/$Downloadpagesize);
    for($i=1;$i<=$Downloadpagenum;$i++){
        if($Downloadpage==$i){
            $str.="<a href='javascript:void(0)' onclick=changeDownloadpage(".$i.")>[".$i."]</a>&nbsp;&nbsp;&nbsp;";
        }else{
            $str.="<a href='javascript:void(0)' onclick=changeDownloadpage(".$i.")>".$i."</a>&nbsp;&nbsp;&nbsp;";
        }
    }
    echo "<div  class='page'><a href='javascript:void(0)' onclick=changeDownloadpage(1)>[首页]</a>&nbsp;&nbsp;&nbsp;";
    echo $str;
    echo "<a href='javascript:void(0)' onclick=changeDownloadpage(".$Downloadpagenum.")>[尾页]</a></div>&nbsp;&nbsp;&nbsp;";
}else{
    die();
}
?>