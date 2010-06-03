<?php
function directory_size($directory)
{
	$directorySize=0;
	
	if($dh = @opendir($directory)){
	
		while (($filename = readdir ($dh))) {
			if($filename != "." && $filename !="..")
			{
				if(is_file($directory."/".$filename))
				{
					$directorySize += filesize($directory."/".$filename);
				}
				if(is_dir($directory."/".$filename))
				{
					$directorySize += directory_size($directory."/".$filename);
				}
			}
		}
	}
	@closedir($dh);
	return $directorySize;
}
?>