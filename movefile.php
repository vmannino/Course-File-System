<?php
/*
MeltingIce File System copyright Ryan LeFevre.
Feel free to modify this script, but please leave this comment here.

movefile.php: Moves a file from one folder to another
*/
	include_once('config.php');
	include_once('namecheck.php');
	if($_POST['dragFile'] && dirCheck($_POST['dropFol']))
			{
				//the posted dragfile variable: reldir/filename if file, reldir/foldername/ if folder
				
				$dragFileName=preg_replace('/(.*[\/])([^\/]*.$)/', '\2', $_POST['dragFile']);//to move the file (folder) we need just the name,no reldir
				
				$moveresult = rename($uploaddir.$_POST['dragFile'],$uploaddir.$_POST['dropFol'].$dragFileName);
			
			if($moveresult)
			{
				echo "sucess";
			}
			else
			{
				echo "move failed";
			}
	}
	else
	{
		echo "variables not posted";
	}
?>