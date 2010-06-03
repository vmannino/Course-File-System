//


function delFileReq(Filename){
		document.write("
        <!-- Delete file/folder Request -->
		<div id='delfilebox' style='display: none'>
		<a id='closeIcon' href='javascript:void(0)' onclick=\"new Effect.Fade('functionboxwrap');new Effect.Fade('uploadbox')\">
        <img src='images/Close-icon.png'  width='20' height='20' border='0'/></a>
		<p style='padding-top: 20px'>Request Deletion of"+ Filename+"?</p>
		<p>Please submit a valid reason for deletion:<br>
        (i.e repetitive file, corrupt, etc)</p>
		<form method='post' action='delReq.php'> 
        <textarea cols='37' rows='5'></textarea><br>
        <input type='submit' value='Submit Request'>
        </form>
		</div>
		<!-- End delete file/folder Request -->");
}
    
		<!-- Rename file modal box -->
		<div id="renamefile" style="display: none">
		<a id='closeIcon' href='javascript:void(0)' onclick="new Effect.Fade('functionboxwrap');new Effect.Fade('renamefile')"><img src='images/Close-icon.png'  width='20' height='20' border='0'/></a>
		<p>Old name: " . str_replace("_"," ",$_GET['rename']) . "<br />
		<form enctype='multipart/form-data' action='rename.php' method='post'>
		New Name: <input type='text' name='newname'>
			<!--<input type='hidden' name='basedir' value='".$_GET['dir']."' />-->
        <br />
		<div class="centeritem"><input type=submit value='Rename'>
        </div>
		</form>
		</div>
		<!-- End rename file modal box -->
        
        
		<!-- Create directory modal box -->
		<div id="mkdirbox" style="display:none;">
		<a id='closeIcon' href='javascript:void(0)' onclick="new Effect.Fade('functionboxwrap');new Effect.Fade('mkdirbox')"><img src='images/Close-icon.png'  width='20' height='20' border='0'/></a>
		<p>Create a Directory</p>
		<form enctype='multipart/form-data' action='mkdir.php' method='post'>
		Name: <input type='text' name='createdir'>

		if($_GET['dir']){
			<input type='hidden' name='basedir' value=".$_GET['dir']." />
		}
		<input type=submit value='Create'>
		</form>
		</div>
		<!-- End create directory modal box -->
	
    
    
<?php
/*
	function uploadFileBox()
	{
		echo<<<_HTML
		<!-- Upload file/folder modal box -->\n
		<div id="uploadbox" style="display:none;">\n
		<a id='closeIcon' href='javascript:void(0)' onclick="new Effect.Fade('functionboxwrap');new Effect.Fade('uploadbox')"><img src='images/Close-icon.png'  width='20' height='20' border='0'/></a>
		<p>Upload a File</p>\n
		<div id=\"uploadform\" style=\"height: 100px;\">
_HTML;

		if($_GET['dir'])
		{
			echo "<form enctype='multipart/form-data' action='user.php?dir=".$_GET['dir']."' method='post'>\n";
		}
		else
		{
			echo "<form enctype='multipart/form-data' action='user.php' method='post'>\n";
		}
		
			echo "File: <input type='file' name='UploadFile' /><br />\n";
			echo "<div class=\"centeritem\"><input type=submit value='Upload' onClick=\"new Effect.SlideUp('uploadform', {queue: 'front'}); new Effect.SlideDown('uploadbar', {queue: 'end'})\"></div>\n";
		echo "<input type='hidden' name='upload' value='file' />\n";
		
		if($_GET['dir']){
			echo "<input type='hidden' name='uploaddir' value=". '/' . ltrim($_GET['dir'],'/')." />\n";
		}

		
		echo "</form>\n</div>\n";
		echo "</div>\n";
		echo "<div id=\"uploadbar\" style=\"display:none; height: 19px; margin: 2px;\"><img src=\"img/loader_bar.gif\" alt=\"uploading\"></div>\n";
		echo "<!-- End upload modal box -->\n";
	}
	

	
	
	function requestSearchBox()
	{
		echo "<!-- User request search modal box -->\n";
		echo "<div id=\"usersearch\" style=\"display: none\">\n";
		echo "<input type='image' src='images/Close-icon.png' width='20' height='20' style='float:right'>";
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
		echo "<input type='image' src='images/Close-icon.png' width='20' height='20' style='float:right'>";
		echo "<p>Search Results</p>\n";
		echo "<form enctype='multipart/form-data' action='friendmgmt.php' method='post'>\n";
		getSearchResults($_GET['s']);
		echo "</form>\n";
		echo "<div class=\"functioncancel\"><a href=\"friends.php\">Cancel</a></div>\n";
		echo "</div>\n";
		echo "<!-- User search results modal box end -->\n";
	}
	*/?>
</body>
</html>
	