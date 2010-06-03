<?php 
mysql_connect('localhost','root','ASammRpjHvQJJuNH') or die(mysql_error());
mysql_select_db('saepenntheta') or die(mysql_error());
function destroySession(){
$_SESSION=array();

if (session_id()!="" || isset($_COOKIE[session_name()])){
	setcookie(session_name(),'',time()-2592000,'/');
    
    session_destroy();
	}
}
function queryMysql($query){
	$result=mysql_query($query) or die(mysql_error());
	return $result;
}

function cleanString($string){
$string=strip_tags($string);
$string=htmlentities($string);
$string=stripslashes($string);
return mysql_real_escape_string($string);
}
?>