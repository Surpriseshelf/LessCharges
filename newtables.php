<?php
    //connect to MySQL
	echo 'Trying to connect to PhoneSet!<br>';
    $mysql_server_name = "localhost"; //数据库服务器名称
    $mysql_username = "root"; // 连接数据库用户名
    $mysql_password = "root"; // 连接数据库密码
    $mysql_database = "TEST"; // 数据库的名字
    
	$db = mysql_connect($mysql_server_name, $mysql_username,
                        $mysql_password);
	if (!$db) {
 		die('Could not connect: ' . mysql_error());
 	}

	echo 'TEST database successfulingly connected!<br>';
	mysql_query("SET NAMES UTF8");

	//create the main database if it doesn't already exist
	$query = "CREATE DATABASE IF NOT EXISTS TEST
				CHARACTER SET 'utf8'
				COLLATE 'utf8_general_ci'";
	mysql_query($query, $db) or die(mysql_error($db));

	//make sure our recently created database is the active one
	mysql_select_db($mysql_database, $db) or die(mysql_error($db));

	//create the phoneset table
	$query = 'CREATE TABLE 3G套餐 (
		ID			CHAR(10)		NOT NULL DEFAULT 0,
		Type1		CHAR(2)			NOT NULL DEFAULT 0,
		Type2		CHAR(1)			NOT NULL DEFAULT 0,
		资费			INT				NOT NULL DEFAULT 0,
		内国内语音	INT				NOT NULL DEFAULT 0,
		套餐内流量 	INT				NOT NULL DEFAULT 0,
		套餐内短信	INT				NOT NULL DEFAULT 0,
		外国内语音	FLOAT			NOT NULL DEFAULT 0,
		外本地通话  	FLOAT			NOT NULL DEFAULT 0,
		外流量		FLOAT			NOT NULL DEFAULT 0.0003,
		外短信		FLOAT			NOT NULL DEFAULT 0.10,
		额外信息		INT				NOT NULL DEFAULT 0
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	mysql_query($query, $db) or die (mysql_error($db));

	$query = 'CREATE TABLE 4G全国套餐 (
		ID			CHAR(10)		NOT NULL DEFAULT 0,
		Type1		CHAR(2)			NOT NULL DEFAULT 0,
		Type2		CHAR(2)			NOT NULL DEFAULT 0,
		资费			INT				NOT NULL DEFAULT 0,
		内国内语音	INT				NOT NULL DEFAULT 0,
		套餐内流量 	INT				NOT NULL DEFAULT 0,
		套餐内短信	INT				NOT NULL DEFAULT 0,
		外国内语音	FLOAT 			NOT NULL DEFAULT 0.15,
		外本地通话  	FLOAT	 		NOT NULL DEFAULT 0.15,
		外流量		FLOAT			NOT NULL DEFAULT 0.0003,
		外短信		FLOAT			NOT NULL DEFAULT 0.10,
		额外信息		INT				NOT NULL DEFAULT 0
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	mysql_query($query, $db) or die (mysql_error($db));

	$query = 'CREATE TABLE 4G组合通话 (
		ID			CHAR(10)		NOT NULL DEFAULT 0,
		Type1		CHAR(2)			NOT NULL DEFAULT 0,
		Type2		CHAR(2)			NOT NULL DEFAULT 0,
		资费			INT				NOT NULL DEFAULT 0,
		国内通话		INT				NOT NULL DEFAULT 0,
		超出资费 	FLOAT			NOT NULL DEFAULT 0.15
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	mysql_query($query, $db) or die (mysql_error($db));

	$query = 'CREATE TABLE 4G组合流量 (
		ID			CHAR(10)		NOT NULL DEFAULT 0,
		Type1		CHAR(2)			NOT NULL DEFAULT 0,
		Type2		CHAR(2)			NOT NULL DEFAULT 0,
		资费			INT				NOT NULL DEFAULT 0,
		流量			INT				NOT NULL DEFAULT 0,
		超出资费 	FLOAT			NOT NULL DEFAULT 0.2
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	mysql_query($query, $db) or die (mysql_error($db));

	$query = 'CREATE TABLE 4G组合短信 (
		ID			CHAR(10)		NOT NULL DEFAULT 0,
		Type1		CHAR(2)			NOT NULL DEFAULT 0,
		Type2		CHAR(2)			NOT NULL DEFAULT 0,
		资费			INT				NOT NULL DEFAULT 0,
		短信			INT				NOT NULL DEFAULT 0,
		超出资费 	FLOAT			NOT NULL DEFAULT 0.1
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	mysql_query($query, $db) or die (mysql_error($db));

	$query = 'CREATE TABLE 4G组合附加 (
		ID			CHAR(10)		NOT NULL DEFAULT 0,
		Type1		CHAR(2)			NOT NULL DEFAULT 0,
		Type2		CHAR(2)			NOT NULL DEFAULT 0,
		资费			INT				NOT NULL DEFAULT 0,
		内容			INT				NOT NULL DEFAULT 0
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	mysql_query($query, $db) or die (mysql_error($db));


echo 'PhoneSet database successfully created!';
?>
