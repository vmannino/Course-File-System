<?php

	include_once('config.php');
	include_once('namecheck.php');
	$folder = "";
	

	/*
	File Upload
	*/
if (isset($_POST['upload']))
{	
		if(is_uploaded_file($_FILES['UploadFile']['tmp_name'])){
			if(!filetypeCheck($_FILES['UploadFile']['name']) || !isValid($_FILES['UploadFile']['name'], true))
				{
					if($_GET['dir'])
					{
						header( 'Location: user.php?dir='.$_GET['dir'].'&upload=fail2' );
					}
					else
					{
						header( 'Location: user.php?upload=fail2' );
					}
				}
			else
			{
				if($_POST['uploaddir'])
				{
					if(uploadCheck($uploaddir.$_POST['uploaddir']))
					{
								move_uploaded_file($_FILES['UploadFile']['tmp_name'],
									$uploaddir.$_POST['uploaddir'].'/'.$_FILES['UploadFile']['name']);
							
							if(UPLOAD_ERR_OK){
								header( 'Location: user.php?dir='.$_POST['uploaddir'].'&upload=fail' );
							}
							else{
							//	header( 'Location: user.php?dir='.$_POST['uploaddir'].'&upload=success' );
							}
						}
					else
					{
						header( 'Location: user.php?upload=fail' );
					}
				}
				else
				{
							move_uploaded_file($_FILES['UploadFile']['tmp_name'],
								$uploaddir."/".$_FILES['UploadFile']['name']); 
						
				
						if(UPLOAD_ERR_OK){
							header( 'Location: user.php?upload=fail' );
						}
						else{
						//	header( 'Location: user.php?upload=success' );
						}
					}
				}
		}
	}
?>