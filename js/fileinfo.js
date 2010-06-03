function getFileInfo($filedir) {
    new Ajax.Updater('fileinfo','fileinfo.php' + '?finfo=' + $filedir ,{method:'get', asynchronous:true});
}