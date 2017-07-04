<?php
	require_once("_My_SQL_link.php");
	/*幻灯片*/
	$Slide_sql1 = "SELECT `s_SlideImage`,`s_SlideName`,`s_Publishtime`,`s_Content` FROM `t_Slide` order by s_SlideId DESC LIMIT 0,1";
	$Slide_sql2 = "SELECT `s_SlideImage`,`s_SlideName`,`s_Publishtime`,`s_Content` FROM `t_Slide` order by s_SlideId DESC LIMIT 1,1";
	$Slide_sql3 = "SELECT `s_SlideImage`,`s_SlideName`,`s_Publishtime`,`s_Content` FROM `t_Slide` order by s_SlideId DESC LIMIT 2,2";
	$Slide_sql4 = "SELECT `s_SlideImage`,`s_SlideName`,`s_Publishtime`,`s_Content` FROM `t_Slide` order by s_SlideId DESC LIMIT 3,3";
	/*产品展示*/ 
	$Show_sql = "SELECT `s_ShowName`,`s_Publishtime`,`s_Content` FROM `t_Show` order by s_ShowId DESC";
	/*技术支持*/
	$Support_sql = "SELECT `s_SupportName`,`s_Publishtime`,`s_Content` FROM `t_Support` order by s_SupportId DESC";
  	/*关于我们*/
	$About_sql = "SELECT `a_AboutName`,`a_Publishtime`,`a_Content` FROM `t_About` order by a_AboutId DESC";
  	/*产品下载*/
	$Download_sql = "SELECT `d_DownloadName`,`d_DownloadImage`,`d_Publishtime`,`d_Address`,`d_Introduction` FROM `t_Download` order by d_DownloadId DESC";
  	/*公益*/
	$game_sql = "SELECT `g_GameName`,`g_Content`,`g_Publishtime`,`g_GameImage`,`g_AndroidAddress`,`g_IosAddress`,`g_PcAddress`,`g_WebAddress` FROM `t_Game` order by g_GameId DESC LIMIT 1";	
  	/*企业员工*/
	$Staff_sql = "SELECT `s_StaffName`,`s_StaffImage`,`s_Introduction`,`s_Address` FROM `t_Staff` order by s_StaffId DESC LIMIT 8";
	/*联系我们*/
	$Contact_sql = "SELECT `c_Phone`,`c_Address1`,`c_Address2`,`c_Address3`,`c_Address4`,`c_code` FROM `t_Contact` order by c_ContactId DESC LIMIT 1";
?>
