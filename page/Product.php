<?php
require_once("../My_SQL/_My_SQL_link_All.php");
if(isset($_POST["Productpage"])){
    @$Productpage = max(1, intval($_POST["Productpage"]));
    $Productpagesize=20;
    $startindex=($Productpage-1)*$Productpagesize;
    $Product_sql_limit="SELECT `p_Name`,`p_Image`,`p_Publishtime`,`p_Address`,`p_Introduction` FROM `t_Product` order by p_Id DESC LIMIT $startindex,$Productpagesize";
    $Product_limit=mysql_query($Product_sql_limit);
    while($Product_row=mysql_fetch_array($Product_limit)){
			$name++;
		?>
			<a href="javascript:void(0)" onclick="moreopen('ProductContent<?php  echo $name;?>')">
				<h4 class="Title">
				<?php
					echo $Product_row['p_Name'];
				?>
				</h4>
				<h3 class="Title">
					<?php
						echo mb_substr($Product_row['p_Publishtime'],0,10,'utf-8');
					?>
				</h3>
			</a>
			  <div id="ProductContent<?php  echo $name;?>" class="page_content">
				  <div class="close">
						<a href="javascript:void(0)" onclick="morehide('ProductContent<?php  echo $name;?>')"> 关闭</a>
				  </div>
				  <div class="con"> 
						<h2><?php echo $Product_row['p_Name'];?></h2> 
						<h6><?php echo '发布时间：',$Product_row['p_Publishtime'];?></h6>
						<h5><?php echo '&nbsp;',htmlspecialchars_decode($Product_row['p_Introduction']);?></h5>
                        <h5><a target="_blank" href="<?php echo mb_substr( $Product_row['p_Address'],3,96,'utf-8');?>" style="margin-left:75%">产品下载</a></h5>
                        <img src="<?php echo mb_substr($Product_row['p_Image'],3,96,'utf-8');?>" onerror="nofind();" onload="if(this.width >= 715){this.width = 715}/>
				  </div>
			  </div>
			<?php

    }
		
    $Productpagenum=@ceil($Product_sql_num/$Productpagesize);
    for($i=1;$i<=$Productpagenum;$i++){
        if($Productpage==$i){
            $str.="<a href='javascript:void(0)' onclick=changeProductpage(".$i.")>[".$i."]</a>&nbsp;&nbsp;&nbsp;";
        }else{
            $str.="<a href='javascript:void(0)' onclick=changeProductpage(".$i.")>".$i."</a>&nbsp;&nbsp;&nbsp;";
        }
    }
    echo "<div  class='page'><a href='javascript:void(0)' onclick=changeProductpage(1)>[首页]</a>&nbsp;&nbsp;&nbsp;";
    echo $str;
    echo "<a href='javascript:void(0)' onclick=changeProductpage(".$Productpagenum.")>[尾页]</a></div>&nbsp;&nbsp;&nbsp;";
}else{
    die();
}
?>