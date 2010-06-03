<?php
/*
MeltingIce File System copyright Ryan LeFevre.
Feel free to modify this script, but please leave this comment here.

modalbox.php: Custom modal box windows that are only outputted when needed to save bandwidth and slightly lessen loading times
*/
	include_once('dirlist.php');
	include_once('usersearch.php');
	
	function delFileConfirm()
	{
		echo "<!-- Delete file/folder confirmation -->\n";
		echo "<div id=\"delfilebox\" style=\"display: none\">\n";
		
		echo "<p style=\"padding-top: 40px\">Are you sure you want to delete " . str_replace("_"," ",$_GET['delfileconfirm']) ."?</p>\n";
		if(isset($_SESSION['frienddir']))
		{
			if($_SESSION['perms'] == "rw")
			{
				if(is_dir("users/".$_SESSION['frienddir'].$_GET['dir']."/".$_GET['delfileconfirm']))
				{
					echo "<p><a href=\"" .$reldir . "user.php?dir=" . $_GET['dir'] . "&delfolder=" . $_GET['delfileconfirm'] . "\" style=\"background-color: #40eb48\">Yes</a>&nbsp;&nbsp;\n";
				}
				else
				{
					echo "<p><a href=\"" .$reldir . "user.php?dir=" . $_GET['dir'] . "&delfile=" . $_GET['delfileconfirm'] . "\" style=\"background-color: #40eb48\">Yes</a>&nbsp;&nbsp;\n";
				}
			}
			else
			{
				echo "<p>You don't have permission to perform this action</p>";
			}
		}
		else
		{
			if(is_dir("users/".$_SESSION['username'].$_GET['dir']."/".$_GET['delfileconfirm']))
			{
				echo "<p><a href=\"" .$reldir . "user.php?dir=" . $_GET['dir'] . "&delfolder=" . $_GET['delfileconfirm'] . "\" style=\"background-color: #40eb48\">Yes</a>&nbsp;&nbsp;\n";
			}
			else
			{
				echo "<p><a href=\"" .$reldir . "user.php?dir=" . $_GET['dir'] . "&delfile=" . $_GET['delfileconfirm'] . "\" style=\"background-color: #40eb48\">Yes</a>&nbsp;&nbsp;\n";
			}
		}
		
		echo '<a href="user.php?dir=' . $_GET['dir'] . '" style="background-color: #b43232">No</a></p>';
		
		echo "</div>\n";
		echo "<!-- End delete file/folder confirmation -->\n";
	}
	
	function renameFileBox()
	{
		echo "<!-- Rename file modal box -->\n";
		echo "<div id=\"renamefile\" style=\"display: none\">\n";
		echo "<p>Old name: " . str_replace("_"," ",$_GET['rename']) . "<br />\n";
		echo "<strong>File extension will be preserved unless a new one is specified.</strong></p>\n";
		echo "<form enctype='multipart/form-data' action='rename.php' method='post'>\n";
		echo "New Name: <input type='text' name='newname'>\n";
		if(isset($_SESSION['frienddir']))
		{
			if($_SESSION['perms'] == "rw")
			{
				$renameuser = $_SESSION['frienddir'];
			}
		}
		else
		{
			$renameuser = $_SESSION['username'];
		}
		if($_GET['dir']){
			echo "<input type='hidden' name='basedir' value='".$renameuser.$_GET['dir']."' />";
		}
		else{
			echo "<input type='hidden' name='basedir' value='".$renameuser."' />";
		}

		echo "<input type='hidden' name='returndir' value='" . $_GET['dir'] . "' />\n";
		echo "<input type='hidden' name='oldname' value='" . $_GET['rename'] . "'/><br />\n";
		echo "<div class=\"centeritem\"><input type=submit value='Rename'></div>\n";
		echo "</form>";
		echo "<div class=\"functioncancel\"><a href=\"user.php";
		if($_GET['dir']){echo "?dir=".$_GET['dir'];}
		echo "\">Cancel</a></div>\n</div>\n";
		echo "<!-- End rename file modal box -->\n";
	}
	
	function uploadFileBox()
	{
		echo "<!-- Upload file/folder modal box -->\n";
		echo "<div id=\"uploadbox\" style=\"display:none;\">\n";
		echo "<p>Upload a File</p>\n";
		echo "<div id=\"uploadform\" style=\"height: 100px;\">\n";

		if($_GET['dir'])
		{
			echo "<form enctype='multipart/form-data' action='user.php?dir=".$_GET['dir']."' method='post'>\n";
		}
		else
		{
			echo "<form enctype='multipart/form-data' action='user.php' method='post'>\n";
		}
		if(isset($_SESSION['perms']))
		{
			if($_SESSION['perms'] == "rw")
			{
				echo "File: <input type='file' name='UploadFile' /><br />\n";
				echo "<div class=\"centeritem\"><input type=submit value='Upload' onClick=\"new Effect.SlideUp('uploadform', {queue: 'front'}); new Effect.SlideDown('uploadbar', {queue: 'end'})\"></div>\n";
			}
			else
			{
				echo "<p style=\"margin-top:-50px\">You do not have write access to this directory</p>\n";
			}
		}
		else
		{
			echo "File: <input type='file' name='UploadFile' /><br />\n";
			echo "<div class=\"centeritem\"><input type=submit value='Upload' onClick=\"new Effect.SlideUp('uploadform', {queue: 'front'}); new Effect.SlideDown('uploadbar', {queue: 'end'})\"></div>\n";
		}
		echo "<input type='hidden' name='upload' value='file' />\n";

		if($_GET['dir']){
			echo "<input type='hidden' name='uploaddir' value=".$_GET['dir']." />\n";
		}

		
		echo "</form>\n</div>\n";
		echo "<div id=\"uploadbar\" style=\"display:none; height: 19px; margin: 2px;\"><img src=\"img/loader_bar.gif\" alt=\"uploading\"></div>\n";
		echo "<div class=\"functioncancel\"><a href=\"user.php";
		if($_GET['dir']){echo "?dir=".$_GET['dir'];}
		echo "\">Cancel</a></div>\n</div>\n";
		echo "<!-- End upload modal box -->\n";
	}
	
	function makeDirBox()
	{
		echo "<!-- Create directory modal box -->\n";
		echo "<div id=\"mkdirbox\" style=\"display:none;\">\n";
		echo "<p>Create a New Class Folder</p>\n";
		echo "<form enctype='multipart/form-data' action='mkdir.php' method='post'>\n";
		echo "Name: <input type='text' name='createdir'>\n";

		if($_GET['dir']){
			echo "<input type='hidden' name='basedir' value=".$_GET['dir']." />\n";
		}
		echo "<input type=submit value='Create'>\n";
		echo "</form>\n";
		echo "<div class=\"functioncancel\"><a href=\"user.php";
		if($_GET['dir']){echo "?dir=".$_GET['dir'];}
		echo "\">Cancel</a></div>\n</div>\n";
		echo "<!-- End create directory modal box -->\n";
	}
	
	function moveFileBox($userdir, $viewurl, $uploaddir)
	{
		echo "<!-- Move file modal box -->\n";
		echo "<div id=\"movefilebox\" style=\"display:none;\">\n";
		echo "<p>Move " . str_replace("_"," ",$_GET['movefilebox']) . "</p>\n";
		echo "<form enctype='multipart/form-data' action='movefile.php' method='post'>\n<select name=\"folderlist\">\n";
		if($_GET['dir'] != "")
		{
			echo "<option name=\"upone\" value=\"upone\">Up one dir</option>\n";
		}
		get_dirlist_folders($userdir, $viewurl, $uploaddir, false);
		echo "</select>\n";
		if(isset($_SESSION['frienddir']))
		{
			if($_SESSION['perms'] == "rw")
			{
				echo "<input type=\"hidden\" name=\"origloc\" value=\"" . $_SESSION['frienddir'] . $_GET['dir']."/".$_GET['movefilebox']."\" />";
			}
		}
		else
		{
			echo "<input type=\"hidden\" name=\"origloc\" value=\"" . $_SESSION['username'] . $_GET['dir']."/".$_GET['movefilebox']."\" />";
		}
		echo "<input type=\"hidden\" name=\"dir\" value=\"".$_GET['dir']."\" />";
		echo "<input type='submit' value='Move'>\n";
		echo "</form>\n";
		echo "<div class=\"functioncancel\"><a href=\"user.php";
		if($_GET['dir']){echo "?dir=".$_GET['dir'];}
		echo "\">Cancel</a></div>\n</div>\n";
		echo "<!-- End move file modal box -->\n";
	}
	
	function requestSearchBox()
	{
		echo "<!-- User request search modal box -->\n";
		echo "<div id=\"usersearch\" style=\"display: none\">\n";
		echo "<p style=\"margin: -30px 0 0 0;\">Search for a registered user</p>\n";
		echo "<p style=\"margin: -30px 0 0 0\"><strong>Use % for a wildcard.</strong></p>\n";
		echo "<form enctype='multipart/form-data' action='processform.php' method='post'>\n";
		echo "Username: <input type='text' name='usersearch'>\n";
		echo "<div class=\"centeritem\"><input type=submit value='Submit'></div>\n";
		echo "</form>\n";
		echo "<div class=\"functioncancel\"><a href=\"friends.php\">Cancel</a></div>\n";
		echo "</div>\n";
		echo "<!-- End user request search modal box -->\n";
	}
	
	function userSearchResults()
	{
		echo "<!-- User search results modal box -->\n";
		echo "<div id=\"usersearch\" style=\"display:none;\">\n";
		echo "<p>Search Results</p>\n";
		echo "<form enctype='multipart/form-data' action='friendmgmt.php' method='post'>\n";
		getSearchResults($_GET['s']);
		echo "</form>\n";
		echo "<div class=\"functioncancel\"><a href=\"friends.php\">Cancel</a></div>\n";
		echo "</div>\n";
		echo "<!-- User search results modal box end -->\n";
	}
	
	function addFriendBox()
	{
		echo "<!-- Add friend modal box -->\n";
		echo "<div id=\"addfriend\" style=\"display:none;\">\n";
		if($_GET['add']){ echo "<p>Set Permissions for ".$_GET['add']."</p>\n"; }
		if($_GET['edit']){ echo "<p>Edit Permissions for ".$_GET['edit']."</p>\n"; }
		echo "<form enctype='multipart/form-data' action='friendmgmt.php' method='post'>\n<select name=\"perms\">\n";
		echo "<option name=\"#r\" value=\"#r\">Read Only</option>\n";
		echo "<option name=\"#rw\" value=\"#rw\">Read + Write</option>\n";
		echo "</select><br /><br />\n";
		if($_GET['add'])
		{
			echo "<input type='hidden' name='addfriend' value='".$_GET['add']."' />";
			echo "<input type='hidden' name='mutual' value='".$_GET['mutual']."' />";
			echo "<input type='submit' value='Add Friend' />\n";
		}
		if($_GET['edit'])
		{
			echo "<input type='hidden' name='editfriend' value='".$_GET['edit']."' />";
			echo "<input type='hidden' name='oldperms' value='".$_GET['oldperms']."' />";
			echo "<input type='submit' value='Edit Friend' />\n";
		}
		echo "</form>\n";
		echo "<div class=\"functioncancel\"><a href=\"friends.php\">Cancel</a></div>\n";
		echo "</div>\n";
		echo "<!-- Add friend modal box end -->\n";
	}
	
	function aboutFriends()
	{
		echo "<!-- About friends system modal box -->\n";
		echo "<div id=\"aboutfriends\" style=\"display:none;\">\n";
		echo "<p style=\"margin:5px;\">When you request a friend, you are asking permission to view their files.";
		echo "  This friendship is one-way unless the \"Mutual\" checkbox is checked when the friend request is sent,";
		echo " meaning that although you can view their files, they can't view yours.";
		echo "  The friendship can be made mutual later if the other person requests you as a friend and you accept.</p>\n";
		echo "<p style=\"margin:5px;\">Once friendships are established, you can remove friends access to your files, your access to friends files,";
		echo " and change access permissions to your files per friend.</p>";
		echo "<div class=\"functioncancel\" style=\"width: 400px\"><a href=\"friends.php\">Return</a></div>\n";
		echo "</div>\n";
		echo "<!-- About friends system modal box end -->\n";
	}
?>