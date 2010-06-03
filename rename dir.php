<?php
//script for recursively replacing ' ' with '_' in all filenamess in $uploaddir
//only needs to be run once

$uploaddir = "E:/xampplite/htdocs/SaePennTheta/uploaded_files";
rnDir($uploaddir);
function rnDir($dir){
$dh = opendir($dir);
		while ($file = readdir($dh))
		{
			$filearray[] = $file;
		}
		closedir($dh);
		
		for($a=0;$a<count($filearray);$a++)
		{
			if ($filearray[$a]!='.' && $filearray[$a]!='..')
			{
				if (is_dir($dir.'/'.$filearray[$a]))
					rnDir($dir.'/'.$filearray[$a]);
				if (rename($dir.'/'.$filearray[$a], $dir.'/'.str_replace(" ", "_", $filearray[$a]))){
					echo "$dir succesfully renamed\n";
				}
			}
		}
}

?>
