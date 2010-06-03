<?php
/*
namecheck.php: Security functions 
*/
	function isValid($varx, $file=false)
	{
		if(!$file)
		{
			if(ereg("([^a-zA-Z0-9])",$varx)) //makes sure usernames consist of only letters and/or numbers
			{
				$valid=false;
			}
			else
			{
				$valid=true;
			}
		}
		else
		{
			if(preg_match('/#|\*|<|>|\$|\||:|\"|\//',$varx)) //makes sure files and folders don't have these characters in them
			{
				$valid=false;
			}
			else
			{
				$valid=true;
			}
		}

		return $valid;
	}
	
	function filetypeCheck($name)
	{
		$allowed = true;
		$boom = explode(".",$name);
		
		
		if(ereg("(php+)",$boom[count($boom)-1])) //disallows upload of PHP files for security purposes
		{
			$allowed = false;
		}
		
		return $allowed;
	}
	
	function dirCheck($urlreq)
	{
		$allowed = true;
		
		$test = explode("/",$urlreq);
		if(array_search("..",$test))
		{
			$allowed = false;
		}
		return $allowed;
	}

	function uploadCheck($url)
	{
		$allowed = true;
		if(! is_dir($uploaddir . $url))
		{
			$allowed = false;
		}
		if(! dirCheck($url))
		{
			$allowed = false;
		}
		
		return $allowed;
	}
?>