CREATE DATABASE IF NOT EXISTS tdgeos default charset utf8 COLLATE utf8_general_ci; 
use tdgeos;
/* 用户表 */
create table t_user(
	u_Id int primary key not  null  auto_increment,
	u_Name varchar(16) not null,
	u_Sex varchar(4),
	u_Password varchar(64) not null,
	u_GroupId int(3) not null,
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
	s_Id int primary key not  null  auto_increment,
	s_Name varchar(96) not null,
	s_Author varchar(16) not null,
	s_GroupId int(3)  not null,
	s_PublishIp varchar(16) not null,
	s_Publishtime datetime not null,
	s_Content TEXT not null
);
/* 技术支持 */ 
create table t_Support(
	s_Id int primary key not  null  auto_increment,
	s_Name varchar(96) not null,
	s_Author varchar(16) not null,
	s_GroupId int(3) not null,
	s_PublishIp varchar(16) not null,
	s_Publishtime datetime not null,
	s_Content TEXT not null
);
/* 联系我们 */
create table t_Contact(
	c_Id int primary key not  null  auto_increment,
	c_Phone long  not null,
	c_Blog varchar(32) not null,
	c_Crowd long not null,
	c_Public varchar(96) not null,
	c_code int(3) not null,
	c_Author varchar(16) not null,
	c_GroupId int not null
);
/* 关于我们 */
create table t_About(
	a_Id int primary key not  null  auto_increment,
	a_Name varchar(96) not null,
	a_Author varchar(16) not null,
	a_GroupId int(3) not null,
	a_PublishIp varchar(16) not null,
	a_Publishtime datetime not null,
	a_Content TEXT not null
);
/* 产品下载 */
create table t_Product(
	p_Id int primary key not  null  auto_increment,
	p_Name varchar(16) not null,
	p_Image varchar(64) not null,
	p_Author varchar(16) not null,
	p_GroupId int(3) not null,
	p_PublishIp varchar(16) not null,
	p_Publishtime datetime not null,
	p_Address varchar(96) not null,
	p_Introduction TEXT not null
);
/* 公益产品 */
create table t_Welfare(
	w_Id int primary key not  null  auto_increment,
	w_Name varchar(32) not null,
	w_Image varchar(96) not null,
	w_Content TEXT not null,
	w_GroupId int(3) not null,
	w_PublishIp varchar(16) not null,
	w_Publishtime datetime not null,
	w_Android varchar(96) not null,
	w_Ios varchar(96) not null,
	w_Pc varchar(96) not null,
	w_Web varchar(96) not null
);
/* 合作伙伴 */
create table t_Cooperation(
	c_Id int primary key not  null  auto_increment,
	c_Name varchar(16) not null,
	c_Image varchar(96) not null,
	c_Url varchar(128),
	c_PublishIp varchar(16) not null,
	c_Publishtime datetime not null,
	c_GroupId int(3) not null
);
/* 邮件信息 */
create table t_Message(
	m_Id int primary key not  null  auto_increment,
	m_Name varchar(16) not null,
	m_Email varchar(32),
	m_Subject varchar(96),
	m_PublishIp varchar(16) not null,
	m_Publishtime datetime not null,
	m_Content TEXT not null
);
/* 幻灯片 */
create table t_Slide(
	s_Id int primary key not  null  auto_increment,
	s_Image varchar(96) not null,
	s_Name varchar(96) not null,
	s_Author varchar(16) not null,
	s_GroupId int(3) not null,
	s_PublishIp varchar(16) not null,
	s_Publishtime datetime not null,
	s_Content TEXT not null
);

/* 备案信息 */
create table t_Record(
	r_Id int primary key not  null  auto_increment,
	r_ICPmain varchar(32) not null,
	r_ICPweb varchar(32) not null,
	r_Author varchar(16) not null,
	r_GroupId int(3) not null,
	r_PublishIp varchar(16) not null,
	r_Publishtime datetime not null
);

/* 关键字 */
create table t_Keyword(
	k_Id int primary key not  null  auto_increment,
	k_Description varchar(256) not null,
	k_Keywords varchar(64) not null,
	k_Author varchar(16) not null,
	k_GroupId int(3) not null,
	k_PublishIp varchar(16) not null,
	k_Publishtime datetime not null
);

INSERT INTO t_user (u_Name,u_Sex,u_Password,u_GroupId,u_CreateDate,u_Address,u_QQ,u_Phone,u_Mailbox,u_Number)
VALUES ('admin', '男', 'aeb8f3de0a3bfea6595305654d51631c7a1a572a', '255', '1970-01-01 0:0:0', '北京市-北京市-海淀区', '83117850', '13409597709', 'wzxaini9@vip.qq.com','0')
;
