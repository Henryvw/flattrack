<?php

	//***** CONFIGURATION DETAILS *****//

	$DBServer = "mysqlsdb.co8hm2var4k9.eu-west-1.rds.amazonaws.com";  // the location your mysql server
	$DBUser = "dep4rzzz68q"; // the database username
	$DBPass = "QGc5kHFsbnLr"; // the database password
	$DBName = "dep4rzzz68q"; //the name of the database
	

	$dbh=mysql_connect ($DBServer, $DBUser, $DBPass) or die ("I cannot connect to the database because: " . mysql_error());

	mysql_select_db ($DBName);
	
	//include_once("session.class.php");
	//$session = new Session();
	
	session_start();

	$facebookAppID = "525841804174117";
	$facebookAppSecret = "52f8a62fc5839558b4b5ec40de9c614e";
	
?>
