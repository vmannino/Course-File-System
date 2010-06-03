<?php
	/*
ajaxDirList.php: Read Directory
spit back contents of user's directory.
	*/
	
	get_dirlist_folders($_POST['currDir'], $_POST['relDir'] );

	
function get_dirlist_folders($currDir, $relDir){
	
	//Reads all directories in the current folder and checks to make sure its valid
	if(dirCheck($currDir))
	{
		$dh = opendir($currDir);
		while ($file = readdir($dh))
		{
			$tempfilearray[] = $file;
		}
		closedir($dh);

		natcasesort($tempfilearray); //sorts array alphabetically
			
		$filearray = array_slice($tempfilearray, 0); //reassigns array keys so directory list will be alphabetical
		
		
		for($a=0;$a<count($filearray);$a++)
		{
			if(is_dir($currDir."/".$filearray[$a]))
			{
				$filenum++;
			}
		}
		echo $relDir;
		if ($relDir && !strstr($relDir,'.')){
				echo "<li>  <a href=\"" .$reldir . "user.php?dir=". preg_replace('/\/[^\/]*$/','',$relDir) . "\"><strong>"  . "Back" . "</strong></a></li><br />";
				
		}
		if($filenum > 2)
		{		
			for($i=0; $i < count($filearray); $i++)
			{
				if ($filearray[$i] != "." && $filearray[$i] != "..")
				{
					if(is_dir($currDir."/".$filearray[$i]))
					{
						if($formatted)
						{
								echo "<li id='".$relDir."/".$filearray[$i]."'><a href=\"" .$reldir . "user.php?dir=" . $relDir . "&delfilerequest=" . $filearray[$i] . "\"><img src=\"img/delete.png\" alt=\"delete\" title=\"delete\"></a>  <a href=\"user.php?dir=".$_GET['dir']."&rename=".$filearray[$i]."\"><img src=\"img/folder_rename.png\" alt=\"rename\" title=\"rename\"></a>  <a href=\"" .$reldir . "user.php?dir=" . $relDir .'/' . $filearray[$i] . "\"><strong>" . str_replace("_", " ", $filearray[$i]) . "</strong></a></li>\n";
						}
						if(!$formatted)
						{
							echo "<option name=\"" . str_replace("_", " ", $filearray[$i]) . "\" value=\"" . str_replace("_", " ", $filearray[$i]) . "\">" . str_replace("_", " ", $filearray[$i]) . "</option>\n";
						}
						echo "<script type='text/javascript'>new Draggable('".$relDir."/".$filearray[$i]."', {revert:true});";
						echo "Droppables.add('".$relDir."/".$filearray[$i]."', {onDrop: function(dragged,dropped){
						
if (window.XMLHttpRequest)
  {//  for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// for IE6, IE5
  xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		alert(xmlhttp.responseText);
    if(xmlhttp.responseText=='sucess'){
		
		dragged.parentNode.removeChild(dragged);
	}
    }
  }
xmlhttp.open('POST','moveFile.php',true);
xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
xmlhttp.send('dragFile='+dragged.id+'&dropFol='+dropped.id); 
}
							});
</script>";
					}
					
				}
			}
		}
		else
		{
			echo "<li>There are no directories in this folder</li>";
		}
	}
	else
	{
		echo "<p>That directory is restricted for security purposes.</p>";
	}
}

function get_dirlist_files($currDir, $relDir)
{

	//Goes through directory and reads files and folders in that directory
	if(dirCheck($currDir))
	{
		$dh = opendir($currDir);
		while ($file = readdir($dh))
		{
			$tempfilearray[] = $file;
		}
		closedir($dh);

		natcasesort($tempfilearray); //sorts array alphabetically
			
		$filearray = array_slice($tempfilearray, 0); // reassigns array keys so directory list will be alphabetical
		
		for($a=0;$a<count($filearray);$a++)
		{
			if(! is_dir($dir."/".$filearray[$a]))
			{
				$filenum++;
			}
		}
		if($filenum > 0)
		{
			for($i=0; $i < count($filearray); $i++)
			{
				if($filearray[$i] != "." AND $filearray[$i] != "..")
				{
					if(! is_dir($currDir."/".$filearray[$i]))
					{
						if($_GET['dir']){
							$fh = fopen($currDir."/".$filearray[$i], "r");
							$fileinfo = fstat($fh);
							$kbsize = round(($fileinfo['size']/1024),2);
							
								echo "<li id='".$relDir."/".$filearray[$i]."'><a href=\"" .$reldir . "user.php?dir=" . $relDir . "&delfilerequest=" . $filearray[$i] . "\"><img src=\"img/delete.png\" alt=\"delete\" title=\"delete\"></a>  <a href=\"user.php?dir=".$_GET['dir']."&rename=".$filearray[$i]."\"><img src=\"img/rename.png\" alt=\"rename\" title=\"rename\"></a><a href=\"" .$reldir . "user.php?dir=" . $relDir . "&movefilebox=" . $filearray[$i] . "\"><img src=\"img/move.png\" alt=\"move\" title=\"move\"></a>  ";
								
							echo "<a href=\"readfile.php?file=". $relDir . "/" . $filearray[$i] . "\"><strong>" . $filearray[$i] . "</strong></a>  ";
							if($kbsize<1024)
							{
								echo "(".round(($fileinfo['size']/1024),2)." KB)  ";
							}
							else
							{
								echo "(".round((($fileinfo['size']/1024)/1024),2)." MB)  ";
							}
					echo "</li>\n";
					echo "<script type='text/javascript'>new Draggable('".$relDir."/".$filearray[$i]."', {revert:true});</script>";
						}
					}
				}
			}
		}
		else
		{
			echo "<li>There are no files in this folder</li>";
		}
	}
}
?>