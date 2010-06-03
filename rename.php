<?php
	include_once('namecheck.php');
	include_once('config.php');
	if($_POST['newname'])
	{
		if(isValid($_POST['newname'], true) && filetypeCheck($_POST['newname']))
		{
			$loc = "uploaded_files/".$_POST['basedir'];

					if(is_dir($uploaddir.$_POST['basedir']."/".$_POST['oldname']))
					{
						$newname = str_replace(" ", "_", $_POST['newname']);
					}
					else
					{
						$extension = pathinfo($_POST['oldname'], PATHINFO_EXTENSION);
						$newname = $_POST['newname'].".".$extension;
					}
			
				
			$renameresult = rename($loc."/".$_POST['oldname'], $loc."/".$newname);
			if($renameresult)
			{
				header( "Location: user.php?dir=".$_POST['returndir']."&renameres=success" );
			}
			else
			{
				header( "Location: user.php?dir=".$_POST['returndir']."&renameres=fail" );
			}
		}
		else
		{
			header( "Location: user.php?dir=".$_POST['returndir']."&renameres=notallowed" );
		}
	}
?>