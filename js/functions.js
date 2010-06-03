// JavaScript Functions

function delPopUp(fileName, relDir){
	new Effect.Appear('functionboxwrap');
	document.getElementById('delFileName').innerHTML="Request Deletion of "+fileName+"?";
	document.getElementById('delFileName').value=relDir;
	new Effect.Appear('delfilebox');
}
function renPopUp(fileName, relDir){
	new Effect.Appear('functionboxwrap');
	document.getElementById('renFileName').innerHTML="Rename "+fileName+":";
	document.getElementById('renFileName').value=relDir;
	new Effect.Appear('renamefile');
}
function navigate(currDir, relDir){
	new Ajax.Updater(
	{success: document.getElementById('DirList'),
	failure: this.parentNode}, //failed ajax call
	'ajaxDirList.php', 
	{ method: 'post',
	evalScripts: true, 
	parameters: {currDir: currDir, relDir: relDir}});
	new Ajax.Updater(
	{success: document.getElementById('FileList'),
	failure: this.parentNode}, //failed ajax call
	'ajaxFileList.php', 
	{ method: 'post',
	evalScripts: true, 
	parameters: {currDir: currDir, relDir: relDir}});
}
function dragDrop(relDir, droppable){
	new Draggable(relDir, {revert:'failure',
	 ghosting: true, scroll: window, 
	 onEnd: dragFunc});
	 if (droppable){
	Droppables.add(relDir, {onDrop: dropFunc, 
	overlap: 'horizontal',hoverclass: 'dropHover'});
	 }
}
function dragFunc(dragged, mouseEvent){
	beingDragged=dragged.element.id;
	dragTime=new Date();
}

function dropFunc(dragged,dropped){
new Ajax.Request('moveFile.php', {
	method: 'post',
	parameters: {dragFile: dragged.id, dropFol: dropped.id},
    onSuccess: succDrop});
    function succDrop(transport){
      if(transport.responseText=='sucess'){
		dragged.parentNode.removeChild(dragged);
	  }
	  else{
		  alert("There was an error moving the file.\nDragged FileName: "+dragged.id+"\nDrop FolderName: "+droppped.id);// move error
	  }
}
}
function dragCheck(relDir){
	 //fix for annoying bug where a drag and drop would count as a 'click' and nagigate. Now, page only navigates if the object being clicked hasnt been dragged in the last 100ms.
	if (relDir==beingDragged && (new Date().getTime()-dragTime.getTime()) < 100)
		return false;
		else
		return true;
}