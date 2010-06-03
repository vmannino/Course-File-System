<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The True Gentlemen of SAE Penn Theta - Registration</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<?php 
include_once 'header.php' ;
include_once 'functions.php'; 
$error=$email=$pswd="";
$salt1='%#fkd';
$salt2='wec!@';
if (isset($_SESSION['user']))
	destroySession();
if (isset($_POST['email'])){ 
	$email=cleanString($_POST['email']);
	$pswd=cleanString($_POST['pswd1']);
	if ($email=='' || $pswd=='' || ($_POST['pswd2'])=='')
		$error="<br />Not all fields were entered<br />";
	else if ($pswd!=$_POST['pswd2'])
		$error="<br />Password fields do not match <br />";
	else if (mysql_num_rows(mysql_query("select * from validEmails where Email='$email'"))==0)
		$error="<br />Email is not in our database. Please make sure you enter the same email used on the SAE Penn Theta listserv.<br /> Contact the website Admin if you have any issues.<br />";
	else{
		$pswd=sha1("$salt1$pswd$salt2");
		$cnfrm=sha1(uniqid(rand()));
		mysql_query("INSERT INTO temp_members(email,password,confirm_code) VALUES('$email','$pswd','$cnfrm')") or die(mysql_error());
		$to=$email;
		$ccto='vincemannino@gmail.com';
		$subject="SAE Registration Confirmation";
		$header="from: SAE Penn Theta <vincemannino@gmail.com>";
		$message="Your Comfirmation link \r\n
		Click on this link to activate your account \r\n
		http://localhost/SaePennTheta/confirm.php?code=$cnfrm";
		if (mail($to,$subject,$message,$header))
			die("Confirmation Email has been sent to $email. Please check your email and follow the instructions.");
		else 
			die("Confirmation email cannot be sent, please re-register");
	}
}

?>

<h2>Create an Account</h2>(Brothers only)

<?php 
			 echo <<<END
			 $error
			 <table id=login_wrapper>
					 <form method='post' id='reg form' action='registration.php'>
						 <tr><td>Email Address: <input type='text' maxlength='30' name='email'  value="$email" /></ td></ tr>
						 <br />(must be an email registered with SAE Lions)
						 <tr><td>Choose a Password : <input type='password' maxlength='15' name='pswd1'  /></ td></ tr>
						 <tr><td>Re-enter your Password : <input type='password' maxlength='15' name='pswd2' /><br /></ td></ tr>
						 <input type='submit' value='Submit' /></ td></ tr>
					 </ form>
				</td>
			<table>
END;
?>
</body>
</html>