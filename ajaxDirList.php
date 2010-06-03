<?php
	/*
ajaxDirList.php: Read Directory
spit back contents of user's directory.
	*/
	
include_once('namecheck.php');
	
	if ($_POST['currDir']){
		get_dirlist_folders($_POST['currDir'], $_POST['relDir'] );
	}
	
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

		natcasesort($tempfilearray); //sorts   array alphabetically
			
		$filearray = array_slice($tempfilearray, 0); //reassigns array keys so directory list will be alphabetical
		
		
		for($a=0;$a<count($filearray);$a++)
		{
			if(is_dir($currDir."/".$filearray[$a]))
			{
				$filenum++;
			}
		}
		if ($relDir && !strstr($relDir,'.')){
				echo "<li><a href=\"javascript: navigate('".preg_replace('/\/[^\/]*\/$/','',$currDir)."/','".preg_replace('/[^\/]*\/$/','',$relDir)."');\"><strong>"  . "Back" . "</strong></a></li><br />";
				
		}
		if($filenum > 2)
		{	
		echo "<script type='text/javascript'>
 Droppables.drops = [];Draggables.drags=[];
</script>";
			for($i=0; $i < count($filearray); $i++)
			{
				if ($filearray[$i] != "." && $filearray[$i] != "..")
				{
					if(is_dir($currDir."/".$filearray[$i]))
					{
						
								echo "<li id='".$relDir.$filearray[$i]."/'>
								<a href=\"javascript:delPopUp('".str_replace("_", " ", $filearray[$i])."','".$relDir."');\" onclick=\"return dragCheck('".$relDir.$filearray[$i]."/');\"><img src=\"img/delete.png\" alt=\"delete\" title=\"delete\"></a>";
								echo "<a href=\"javascript:renPopUp('".str_replace("_", " ", $filearray[$i])."','".$relDir."')\" onclick=\"return dragCheck('".$relDir.$filearray[$i]."/');\"><img src=\"img/folder_rename.png\" alt=\"rename\" title=\"rename\"></a>";
								echo "<a href=\"javascript:navigate('".$currDir.$filearray[$i]."/','".$relDir.$filearray[$i]."/')\" onclick=\"return dragCheck('".$relDir.$filearray[$i]."/');\" ><strong>" . str_replace("_", " ", $filearray[$i]) . "</strong></a></li>\n";
								echo "<script type='text/javascript'>dragDrop('".$relDir.$filearray[$i]."/','droppable');</script>";
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
?>
