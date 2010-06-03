<?php
include_once('config.php');
include_once('dirsize.php');

function getUserSize($username, $basedir, $justsize=false)
{
	GLOBAL $mysqlpre;
	$sizequery = "SELECT quota FROM " . $mysqlpre . "_users WHERE username = '".$username."'";
	$sizeresult = mysql_query($sizequery);
	$totalsize = mysql_fetch_row($sizeresult);
	if(! $justsize)
	{
		$returndata = round(((directory_size($basedir.$username)/1024)/1024),2) . "MB of " . $totalsize[0] . "MB";
		return $returndata;
	}
	else
	{
		$returndata[] = round(((directory_size($basedir.$username)/1024)/1024),2);
		$returndata[] = $totalsize[0];
		return $returndata;
	}
}
?>