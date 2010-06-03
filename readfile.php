<?php
	include_once('namecheck.php');
	include_once('config.php');

if($_GET['file']){
	if(! dirCheck("/" . $_GET['file']))
	{
		echo "Stop hacking >.>";
	}
	else
	{
		$finfo = finfo_open(FILEINFO_MIME_TYPE); 
		$fullpath = $uploaddir . $_GET['file'];
		$urlinfo = pathinfo($fullpath);
		$mimeT=finfo_file($finfo, $fullpath);
			header('Content-Type: '.$mimeT);
			header('Content-Disposition: inline; filename="'. $urlinfo['basename'] . '"');
			header('Content-Length: '.filesize($fullpath));
			readfile($fullpath);
			finfo_close($finfo);
	}
}
else
{
	echo "<p>You must specify an input file!</p>";
}
?>