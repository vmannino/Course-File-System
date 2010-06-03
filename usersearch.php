<?php
/*
MeltingIce File System copyright Ryan LeFevre.
Feel free to modify this script, but please leave this comment here.

usersearch.php: parses through users for friend request search query
*/
	function getSearchResults($search)
	{
		GLOBAL $mysqlpre;
		$usernamequery = "SELECT username FROM " . $mysqlpre . "_users WHERE username LIKE '".$search."'";
		$result = mysql_query($usernamequery);
		
		$count=0;
		echo "<select name=\"friendreq\">\n";
		while(list($username) = mysql_fetch_row($result))
		{
			echo "<option name=\"".$username."\" value=\"".$username."\">".$username."</option>\n";
			$count++;
		}
		echo "</select><br />\n";
		if($count==0)
		{
			echo "<p style=\"margin-top: -90px\">User not found</p>";
		}
		else
		{
			echo "<input type='checkbox' name='mutual' value='mutual'>Mutual friendship?</input><br /><br />\n";
			echo "<input type='submit' value='Send Friend Request' />\n";
		}
	}
?>