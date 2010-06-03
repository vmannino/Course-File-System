<?php
/*

user.php: personal directory listing and management
*/
	include_once('config.php');
	include_once('process.php');
	include_once('namecheck.php');
	include_once('dirlist.php');
	include_once('deldir.php');
	include_once('dirsize.php');
	include_once('getsize.php');
	


/*Required for when you start browsing in folders you made*/	
if($_GET['dir'])
	{
		$var = explode("=", $_SERVER['QUERY_STRING']);
		$var2 = explode("&", $var[1]);
		$viewurl = $var2[0];
		$userdir = $uploaddir.$_SESSION['username']."/".$viewurl;
		
	}
else
{

		$userdir = $uploaddir.$_SESSION['username'];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-trans.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>meltingice file system - <?php

echo $_SESSION['username']."'s personal files";
?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/scriptaculous.js" type="text/javascript"></script>
</head>
<div id="background">
<?php
if($_GET['upload'] || $_GET['mkdir'] || $_GET['renameres'] || $_GET['edit'] || $_GET['moveres'])
{
	echo '<body onLoad="new Effect.Appear(\'userstatus\'); new Effect.Fade(\'userstatus\', {delay: 5});">';
}
elseif($_GET['rename'] && dirCheck("/".$_GET['rename']))
{
	echo '<body onLoad="new Effect.Appear(\'renamefile\')">';
}
elseif($_GET['uploadbox'] == "true")
{
	echo '<body onLoad="new Effect.Appear(\'uploadbox\')">';
}
elseif($_GET['mkdirbox'] == "true")
{
	echo '<body onLoad="new Effect.Appear(\'mkdirbox\')">';
}
elseif($_GET['delfileconfirm'])
{
	echo '<body onLoad="new Effect.Appear(\'delfilebox\')">';
}
elseif($_GET['movefilebox'])
{
	echo '<body onLoad="new Effect.Appear(\'movefilebox\')">';
}
else
{
	echo "<body>";
}
?>

<div id="functionboxwrap" style="<?php if(!$_GET['rename'] && !$_GET['uploadbox'] && !$_GET['mkdirbox'] && !$_GET['delfileconfirm'] && !$_GET['movefilebox']){ echo "display: none"; } ?>">

<?php

	if($_GET['rename']){ renameFileBox(); } 
	if($_GET['uploadbox']){ uploadFileBox(); }
	if($_GET['mkdirbox']){ makeDirBox(); }
	if($_GET['delfileconfirm']){ delFileConfirm(); }
	if($_GET['movefilebox']){ moveFileBox($userdir, $viewurl, $uploaddir); }
?>
</div>

<div id="userheader"><p style="float: left;">Class Repository: 
<?php

?></p><p style="float: right;">[<a href="logout.php">sign out</a>]

</div>
<!-- Begin directory path code -->
<div id="dirpathtitle"><p>Directory List</p></div>
<div id="dirpath">
<p><a href="user.php"></a><?php 

?></p>
<a href="user.php"><img src="img/house.png" alt="home" style="float: right" /></a>
<p style="float: right; margin-right: 5px;">Space used: 
<?php
echo getUserSize($_SESSION['username'], $uploaddir);
?></p>
</div>
<!-- End directory path code -->


<div class="content">
<!-- Begin status display -->
<div id="userstatus" style="display: none">
<?php 
if($_GET['upload'] == "fail")
{
	echo "<p><strong>Upload Failed.</strong></p>";
}
if($_GET['upload'] == "fail2")
{
	echo "<p><strong>Filetype not allowed!</strong></p>";
}
if($_GET['upload'] == "quotafail")
{
	echo "<p><strong>Space quota exceeded</strong></p>";
}
if($_GET['upload'] == "success")
{
	echo "<p><strong>File Sucessfully Uploaded!</strong></p>";
}
if($_GET['mkdir'] == "true")
{
	echo "<p><strong>Directory added.</strong></p>";
}
if($_GET['mkdir'] == "false")
{
	echo "<p><strong>Directory already exists or invalid name.</strong></p>";
}
if($_GET['renameres'] == "success")
{
	echo "<p><strong>File/folder renamed</strong></p>";
}
if($_GET['renameres'] == "fail")
{
	echo "<p><strong>File/folder rename failed</strong></p>";
}
if($_GET['renameres'] == "notallowed")
{
	echo "<p><strong>File/folder rename not allowed</strong></p>";
}
if($_GET['edit'] == "success")
{
	echo "<p><strong>File Sucessfully Edited!</strong></p>";
}
if($_GET['edit'] == "fail")
{
	echo "<p><strong>File edit fail.</strong></p>";
}
if($_GET['edit'] == "unable")
{
	echo "<p><strong>Unable to edit this type of file.</strong></p>";
}
if($_GET['moveres'] == "true")
{
	echo "<p><strong>File moved.</strong></p>";
}
if($_GET['moveres'] == "false")
{
	echo "<p><strong>File move failed.</strong></p>";
}
?>
</div>
<!-- End status display -->
<div class="contentheader"><p>Classes</p></div>
<ul>
<?php get_dirlist_folders($userdir, $viewurl, $uploaddir); ?>
</ul>
</div>
<div class="content">
<div class="contentheader"><p>Files</p></div>
<ul>
<?php get_dirlist_files($userdir, $viewurl, $uploaddir); ?>
</ul>
</div>
<div id="buttoncontainer">
<?php
	echo "<div class=\"button\"><p><a href=\"user.php?dir=".$_GET['dir']."&uploadbox=true\">Upload a File</a></p></div>\n";
	echo "<div class=\"button\"><p><a href=\"user.php?dir=".$_GET['dir']."&mkdirbox=true\">Create New Directory</a></p></div>\n";

?>
</div>
<div id="userfooter"><p>coding copyright <?php echo date("Y"); ?> <a href="http://meltingice.net">meltingice designs</a> - design concept by <a href="http://07designs.com">07 designs</a></p></div>
</div>
</body>
</html>