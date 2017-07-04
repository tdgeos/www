CREATE DATABASE IF NOT EXISTS sxwy_db default charset utf8 COLLATE utf8_general_ci; 
use sxwy_db;
/* 用户表 */
create table t_user(
	u_UserId int primary key not  null  auto_increment,
	u_UserName varchar(16) not null,
	u_Sex varchar(4),
	u_Password varchar(64) not null,
	u_GroupId int not null,
	u_CreateDate datetime not null,
	u_Address varchar(96),
	u_QQ long,
	u_Phone long,
	u_Mailbox varchar(32),
	u_Lasttime datetime,
	u_LastIp varchar(16),
	u_Thistime datetime,
	u_ThisIp varchar(16),
	u_Number int not null
	
);
/* 产品展示 */
create table t_Show(
	s_ShowId int primary key not  null  auto_increment,
	s_ShowName varchar(96) not null,
	s_Author varchar(16) not null,
	s_GroupId int  not null,
	s_PublishIp varchar(16) not null,
	s_Publishtime datetime not null,
	s_Content TEXT not null
);
/* 技术支持 */ 
create table t_Support(
	s_SupportId int primary key not  null  auto_increment,
	s_SupportName varchar(96) not null,
	s_Author varchar(16) not null,
	s_GroupId int  not null,
	s_PublishIp varchar(16) not null,
	s_Publishtime datetime not null,
	s_Content TEXT not null
);
/* 联系我们 */
create table t_Contact(
	c_ContactId int primary key not  null  auto_increment,
	c_Phone long  not null,
	c_Address1 varchar(32) not null,
	c_Address2 varchar(64) not null,
	c_Address3 varchar(32) not null,
	c_Address4 int not null,
	c_code int not null,
	c_Author varchar(16) not null,
	c_GroupId int not null
);
/* 关于我们 */
create table t_About(
	a_AboutId int primary key not  null  auto_increment,
	a_AboutName varchar(96) not null,
	a_Author varchar(16) not null,
	a_GroupId int  not null,
	a_PublishIp varchar(16) not null,
	a_Publishtime datetime not null,
	a_Content TEXT not null
);
/* 产品下载 */
create table t_Download(
	d_DownloadId int primary key not  null  auto_increment,
	d_DownloadName varchar(16) not null,
	d_DownloadImage varchar(64) not null,
	d_Author varchar(16) not null,
	d_GroupId int not null,
	d_PublishIp varchar(16) not null,
	d_Publishtime datetime not null,
	d_Address varchar(96) not null,
	d_Introduction TEXT not null
);
/* 紧急避险 */
create table t_Game(
	g_GameId int primary key not  null  auto_increment,
	g_GameName varchar(32) not null,
	g_GameImage varchar(96) not null,
	g_Content TEXT not null,
	g_GroupId int not null,
	g_PublishIp varchar(16) not null,
	g_Publishtime datetime not null,
	g_AndroidAddress varchar(96) not null,
	g_IosAddress varchar(96) not null,
	g_PcAddress varchar(96) not null,
	g_WebAddress varchar(96) not null
);
/* 企业员工 */
create table t_Staff(
	s_StaffId int primary key not  null  auto_increment,
	s_StaffName varchar(16) not null,
	s_StaffImage varchar(96) not null,
	s_GroupId int not null,
	s_PublishIp varchar(16) not null,
	s_Publishtime datetime not null,
	s_Address varchar(64),
	s_Introduction TEXT
);
/* 邮件信息 */
create table t_Message(
	m_MessageId int primary key not  null  auto_increment,
	m_Name varchar(16) not null,
	m_Email varchar(32),
	m_Subject varchar(96),
	m_PublishIp varchar(16) not null,
	m_Publishtime datetime not null,
	m_Content TEXT not null
);
/* 幻灯片 */
create table t_Slide(
	s_SlideId int primary key not  null  auto_increment,
	s_SlideImage varchar(96) not null,
	s_SlideName varchar(96) not null,
	s_Author varchar(16) not null,
	s_GroupId int not null,
	s_PublishIp varchar(16) not null,
	s_Publishtime datetime not null,
	s_Content TEXT not null
);

INSERT INTO t_user (u_UserName,u_Sex,u_Password,u_GroupId,u_CreateDate,u_Address,u_QQ,u_Phone,u_Mailbox,u_Number)
VALUES ('admin', '男', '560edbd23a46984600ca608db6e9d0ec6f2816f8', '255', '1970-01-01 0:0:0', '北京市-北京市-海淀区', '83117850', '13409597709', 'wzxaini9@vip.qq.com','0')
;
