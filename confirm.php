<?
include('functions.php');

$code=cleanString($_GET['code']);
$query="SELECT * FROM temp_members WHERE cnfrm='$code'";

if(mysql_num_rows(mysql_query($query))){
$row=mysql_fetch_array($query);
$email=$rows['email'];
$pswd=$rows['password'];
$query="INSERT INTO $members(email, password) VALUES('$email', '$pswd')";
mysql_query($query) or die(mysql_error());
echo "You have been succesfully registered. You will be automatically logged in.";

// Delete information of this user from table "temp_members_db" that has this passkey
mysql_query("DELETE FROM temp_members WHERE confirm_code = '$code'") or die(mysql_error());
}

}
?>