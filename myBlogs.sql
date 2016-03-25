CREATE DATABASE `myBlogs` DEFAULT CHARSET utf8;

#后台管理员表
CREATE TABLE `mb_admin`(
	`userid` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
	`password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
	`lastloginip` int UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后登录IP',
	`lastlogintime` int UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后登录时间',
	`email` varchar(40) DEFAULT NULL COMMENT '邮箱',
	`realname` varchar(50) NOT NULL DEFAULT '' COMMENT '真实姓名',
	PRIMARY KEY (`userid`),
	KEY `username` (`username`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `mb_admin` (`username`, `password`, `email`) VALUES ('admin', md5(md5('123456')), '111111@aaa.com');


#用户登录失败次数表
CREATE TABLE `mb_times`(
	`username` char(40) NOT NULL COMMENT '用户名',
	`ip` char(15) NOT NULL DEFAULT '' COMMENT '登录客户端ip',
	`logintime` int UNSIGNED NOT NULL DEFAULT '0' COMMENT '登录时间',
	`isadmin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0表示后台用户',
	`times` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '登录失败次数',
	PRIMARY KEY (`username`, `isadmin`)
)ENGINE=MEMORY DEFAULT CHARSET=utf8 COMMENT '登录失败次数表';


#session信息存储表
CREATE TABLE `mb_session`(
	`sessionid` char(32) NOT NULL COMMENT 'session标识ID',
	`userid` mediumint(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '用户id',
	`ip` char(15) NOT NULL COMMENT 'ip地址',
	`lastvisit` int UNSIGNED NOT NULL DEFAULT '0' COMMENT '最后访问时间',
	`roleid` tinyint(3) UNSIGNED DEFAULT '0' COMMENT '角色ID',
	`groupid` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '组ID',
	`m` char(20) NOT NULL,
	`c` char(20) NOT NULL,
	`a` char(20) NOT NULL,
	`data` char(255) NOT NULL COMMENT '其他session信息',
	PRIMARY KEY (`sessionid`),
	KEY `lastvisit` (`lastvisit`)
)ENGINE=MEMORY DEFAULT CHARSET=utf8 COMMENT 'session信息存储表';