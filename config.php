<?php

	$paths = pathinfo($_SERVER['PHP_SELF']);
	$reldir = "http://".$_SERVER['SERVER_NAME'].$paths['dirname']."/"; //Sets relative script directory for links in directory listing
	
	$data = pathinfo($_SERVER['SCRIPT_FILENAME']);
	$uploaddir = $data['dirname']."/uploaded_files/"; //Sets absolute upload directory.  If you wish to change default, only change the word "users" to a different folder name
	
	$allowregistration = true; //set false if you wish to prevent new user registration
	$mimepath = 'E:\xampplite\apache\conf\mime.types';

$adminEmail="vincemannino@gmail.com";
$mysqlhost = "localhost";
$mysqluser = "root";
$mysqlpass = "ASammRpjHvQJJuNH";
$mysqldb = "saepenntheta";
$mysqlpre = "mfs";
@mysql_pconnect($mysqlhost, $mysqluser, $mysqlpass) or die('Could not connect to MySQL Server!');
@mysql_select_db($mysqldb)or die('Could not select database!');
?>