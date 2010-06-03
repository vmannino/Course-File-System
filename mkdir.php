<?php
/*
MeltingIce File System copyright Ryan LeFevre.
Feel free to modify this script, but please leave this comment here.

mkdir.php: creates a directory at a user defined location.
*/
include_once('config.php');

include_once('namecheck.php');

if (isset($_POST['createdir']))
{
	$createdir = str_replace(" ", "_", $_POST['createdir']);
	
		if($_POST['basedir'])
		{
			if(isValid($createdir, true))
			{
				
					if(! is_dir($uploaddir."/".$_POST['basedir']."/".$createdir)) //if the directory doesn't exist, make it
					{
						mkdir($uploaddir."/".$_POST['basedir']."/".$createdir);
						header( "Location: user.php?dir=".$_POST['basedir']."&mkdir=true" );
					}
					else
					{
						header( 'Location: user.php?dir='.$_POST['basedir'].'&mkdir=false' );
					}

			}
			
			else
			{
				header( 'Location: user.php?dir='.$_POST['basedir'].'&mkdir=false' );
			}
		}
		
		else{
			if(isValid($createdir, true))
			{
					if(! is_dir($uploaddir."/".$createdir)){ //does user directory exist?  if not, make it!
					mkdir($uploaddir."/".$createdir);
					header( 'Location: user.php?mkdir=true' );
					}
					else
					{
						header( 'Location: user.php?mkdir=false' );
					}
				
			}
			
			else
			{
				header( 'Location: user.php?mkdir=false' );
			}
		}
}
?>