<?php
	/*
ajaxFileList.php: Read Directory
spit back contents of user's directory.
	*/
include_once('namecheck.php');

	if ($_POST['currDir'])
	get_dirlist_files($_POST['currDir'], $_POST['relDir'] );

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
							$fh = fopen($currDir."/".$filearray[$i], "r");
							$fileinfo = fstat($fh);
							$kbsize = round(($fileinfo['size']/1024),2);
							
								echo "<li id='".$relDir.$filearray[$i]."'>
								<a href=\"javascript:delPopUp('".str_replace("_", " ", $filearray[$i])."','".$relDir."');\" onclick=\"return dragCheck('".$relDir.$filearray[$i]."');\"><img src=\"img/delete.png\" alt=\"delete\" title=\"delete\"></a>";
								echo "<a href=\"javascript:renPopUp('".str_replace("_", " ", $filearray[$i])."','".$relDir."')\"  onclick=\"return dragCheck('".$relDir.$filearray[$i]."');\"><img src=\"img/folder_rename.png\" alt=\"rename\" title=\"rename\"></a>";
							echo "<a  target='_blank' href=\"readfile.php?file=". $relDir.$filearray[$i] . "\" onclick=\"return dragCheck('".$relDir.$filearray[$i]."');\"><strong>" . $filearray[$i] . "</strong></a>  ";
							if($kbsize<1024)
							{
								echo "(".round(($fileinfo['size']/1024),2)." KB)  ";
							}
							else
							{
								echo "(".round((($fileinfo['size']/1024)/1024),2)." MB)  ";
							}
					echo "</li>\n";
					echo "<script type='text/javascript'>dragDrop('".$relDir.$filearray[$i]."');</script>";
						
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