
<?php
include_once('config.php');
include_once('process.php');
include_once('namecheck.php');
include_once('dirsize.php');
include_once('ajaxFileList.php');
include_once('ajaxDirList.php');
if($_GET['delfolder'])
{	
	if(dirCheck("/".$_GET['delfolder']))
	{
			$delfolderres = deleteDirectory("uploaded_files/".$_GET['dir']."/".$_GET['delfolder']);
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-trans.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Class Repository</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/scriptaculous.js" type="text/javascript"></script>
<script src="js/functions.js" type="text/javascript"></script>
</head>
<div id="background">
<body>

<div id="functionboxwrap" style="display: none">

<?php
include_once('diagBoxes.html');
?>
</div>

<div id="userheader"><p style=" text-align:center;">Class Repository
</p><p style="float: right;">[<a href="logout.php">sign out</a>]

</div>
<!-- Begin directory path code -->
<div id="dirpathtitle"><p>Class List</p></div>
<div id="dirpath">
<?php
echo "<a href='user.php?dir=".$_GET['dir']."&dir2=".$_GET['dir']."&split=true'>";
?>
<img src="img/house.png" alt="Split File View" style="float: left" />
</a>
<p><a href="user.php"></a></p>
<a href="user.php"><img src="img/house.png" alt="home" style="float: right" /></a>
<p style="float: right; margin-right: 5px;"> 
size
</p>
</div>
<!-- End directory path code -->


<div id='contentWrapper'>

<!-- Begin status display -->
	<div id='userstatus' style='display: none'>
<?php
if($_GET['upload'] == "fail")
{
	echo "<p><strong>Upload Failed.</strong></p>";
}
if($_GET['upload'] == "fail2")
{
	echo "<p><strong>Filetype not allowed!</strong></p>";
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
    <?php
	echo "<div id='leftSubContent' style=";
if ($_GET['split']){
echo "'width:395px'>";
}
else{
echo "'width:800px'>";
}?>
    <div class='content'>
	<div class="subContentHeader"><p>Classes</p></div>
	<ul id='DirList'>
<?php
get_dirlist_folders($uploaddir, '');
?>
</ul>
</div>
<div class='content'>
<div class='subContentHeader'>
<p>Files</p>
</div>
<ul id='FileList'>
<?php
get_dirlist_files($uploaddir, '');
echo "</ul>";
echo "</div>";
echo "</div>";

if ($_GET['split']){
	echo <<<_HTML
	<div id="rightSubContent">
	<div class='content'>
	<div class="subContentHeader"><p>Classes</p></div><ul>
_HTML;

	$relDir2=$_GET['dir2'];
	$currDir2=$uploaddir . $relDir2;
	get_dirlist_folders($uploaddir, '');
	
	echo <<<_HTML
	</ul>
	</div>
	
	<div class='content'>
	<div class="subContentHeader"><p>Files</p></div>
	<ul>
_HTML;
	get_dirlist_files($uploaddir, '');
	echo <<<_HTML
	</ul>
	</div>
	</div>
_HTML;
}
else{
	echo <<<_HTML
	<div id='buttoncontainer'>
	<div class="button">
	<a href='javascript:void(0)' onClick="new Effect.Appear('functionboxwrap');new Effect.Appear('uploadbox')"><p>Upload a File</p></a>
	</div>
	<div class="button">
	<a href='javascript:void(0)' onClick="new Effect.Appear('functionboxwrap');new Effect.Appear('mkdirbox')"><p>
	
_HTML;
	
	if ($_GET['dir']){echo "Add a Folder";}
		else{echo "Add a Class";}
	echo "</p></a></div></div>";

}
?>
</div>
</body>
</html>