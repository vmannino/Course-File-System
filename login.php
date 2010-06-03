<?php
include_once 'functions.php';
$error=$email=$pswd="";
			 if (isset($_POST['email'])){
				 $email=cleanString($_POST['email']);
				 $pswd=cleanString($_POST['pswd']);
				 if ($email=='' || $pswd==''){
					 $error='Not all fields were entered<br \>';
				 }
				 else{
					 $query="SELECT email, password FROM members WHERE email='$email' AND password='$pswd'";
					 if (!mysql_num_rows(mysql_query($query))){
						 $error="Username/Password invalid <br />";
					 }
					 else{
						// $_SESSION['user']=$email;
						 $_SESSION['pswd']=$pswd;
						 header('Location: user.php');
					 }
				 }
			 }
			 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The True Gentlemen of SAE Penn Theta - Login</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<?php 
include_once 'header.php';
?>
		<div class="content">
			 <h1> Login </h1>
	
			 
				<?php		 
			 
			 echo <<<END
			 <table id=login_wrapper>
				 <td>
					 <form method='post' id='login_form' action='login.php'>$error
						 Username: <input type='text' maxlength='30' name='email'  value="$email" /><br />
						 Password : <input type='password' maxlength='30' name='pswd' value="$pswd" /><br />
						 <input type='submit' value='Login' />
					 </ form>
				</td>
			<table>
END;
			 ?>
             <br />
             To get your password, please register below:<br/>
             <a href="registration.php">Register</a>
		 </div>
         
</body>
</html>