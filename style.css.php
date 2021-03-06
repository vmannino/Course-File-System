<?php
header("Content-Type: text/css");
include_once('user.php');
?>

body{
	font-family: Calibri, arial, sans-serif;
	font-size:16px;
	font-weight: 500;
	background-color: #888888;
	margin: 0;
	padding: 0;
	min-width: 1000px;
}

#background{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: url("img/background_grunge.png") no-repeat top right;
	min-width: 1065px;
}

#status{
	background-color: #b43232;
	border: #000000 1px dashed;
	margin: 0px auto 0 auto;
	width: 350px;
	font-size: 18px;
	text-align: center;
}

#status p{
	color: #FFFFFF;
	margin-top: 2px;
	margin-bottom: 5px;
}

#status a {
	color: #FFFFFF;
}

#header{
	background-image: url("img/title.png");
	background-repeat: no-repeat;
	width: 350px;
	height: 78px;
	margin: 100px auto 0 auto;
	text-align: center;
}

#header img{
	margin-top: 50px;
}

#header p{
	color: #FFFFFF;
}


#loginform{
	background-color: #FFFFFF;
	width: 400px;
	text-align: center;
	margin: auto;
	border: #a5b6c8 10px solid;
}

#loginform  input{
	height: 30px;
	font-size: 20px;
	margin: 5px 0 5px 0;
	width: 100%;
}

#loginform form{
	margin: 10px;
}

#loginform a{
	color: #b43232;
	text-decoration: none;
}

#loginform a:hover{
	text-decoration: underline;
}

#loginform table{
	margin: auto;
	width: 325px;
}

#loginform p{
	margin-bottom: 5px;
}

#loginstrip{
	width: 100%;
	min-width: 320px;
	margin-top: 0;
}

#loginstrip img{
	border: none;
}

.submitbutton{
	background-color: #ededed;
	border: 2px #a5b6c8 solid;
	width: 100px !important;
}

.submitbutton:hover{
	background-color: #c3c3c3;
}

.loginfield:focus, .loginfield:hover{
	background-color: #dde5ee;
	border: #919191 1px solid;
	padding: 1px 0 3px 1px;
}

#footer{
	position: absolute;
	bottom: 0px;
	width:100%;
	text-align: center;
	font-size: 11px;
}

#footer p{
	color: #FFFFFF;
}

#footer a{
	color: #FFFFFF;
	text-decoration: none;
}

#footer a:hover{
	color: #FFFFFF;
	text-decoration: underline;
}



#userheader{
	background-color: #a5b6c8;
	height: 30px;
	width: 100%;
	text-align: right;
	min-width: 510px;
	border-bottom: #919294 1px solid;
}

#userheader p{
	margin: 0 10px 0 10px;
	padding-top: 5px;
	color: #FFF;
}

#userheader a{
	color: #FFF;
	text-decoration: none;
}

#userheader a:hover{
	background-color: #cedeec;
}

#dirpath{
	background-color: #FFF;
	width: 800px;
	margin: 10px 0 10px 20px;
	float: left;
	border: #919294 1px solid;
}

#dirpath p{
	font-size: 16px;
	padding: 5px 0 5px 5px;
	margin: 0;
	float: left;
}

#dirpath a{
	color: #000000;
	text-decoration: none;
	padding: 5px 0 5px 0;
	margin: 0;
}

#dirpath a:hover{
	background-color: #e1e1e1;
}

#dirpath img{
	border: none;
	float: right;
	margin: 6px 10px 0 0;
}

#dirpathtitle{
	margin: 10px 0 -10px 20px;
	padding: 0;
	font-size: 14px;
}

#dirpathtitle p{
	margin:0;
	padding: 0;
	color: #FFF;
}

#userstatus{
	background-color: #ffffcc;
	border: #feec30 1px solid;
	margin: 10px 10px 0 10px;
	float: right;
	max-width:500px;
	font-size: 18px;
	text-align: center;
}

#userstatus p{
	color: #000000;
	margin: 2px 10px 5px 10px;
}

.content{
	width: 800px;
	min-height: 120px;
	margin: 5px 0 5px 20px;
	background-color: #FFF;
	border: #919294 1px solid;
	float: left;
}

.content p{
	margin: 0 10px 0 10px;
}

.content li{
	list-style: none;
}

.content li:hover{
	background-color: #e3e3e3;
}

.content a{
	color: #30353a;
	text-decoration: none;
}

.content a:hover{
	text-decoration: underline;
}

.content img{
	border: none;
}

.contentheader{
	width: 760px;
	margin: 0 auto 0 auto;
	padding: 0;
	border-bottom: #cfcfcf 1px solid;
}

.contentheader p{
	margin: 10px 5px 0 5px;
}

#buttoncontainer{
	margin: 0;
	position: absolute;
	top: 110px;
	left: 822px;
	width: 200px;
}

.button{
	float: left;
	height: 40px;
	width: 200px;
	margin: 0 0 1px 0;
	text-align: center;
	background-color: #656565;
	border-top: #919294 1px solid;
	border-right: #919294 1px solid;
	border-bottom: #919294 1px solid;
}

.button:hover{
	background-color: #7e7e7e;
}

.button p{
	margin: 0px 5px 3px 5px;
	color: #FFF;
}

.button a{
	color: #FFF;
	text-decoration: none;
	display: block;
	height: 30px;
	width: 200px;
	padding-top:10px;
}

#functionboxwrap{
	position: absolute;
	top: 0px;
	left: 0;
	height: 100%;
	width: 100%;
	background-image: url("img/dim_bk.png");
	background-repeat: repeat;
	z-index: 2;
}
#closeIcon{
	padding:2 2 2 2;
	opacity:.6;
	float:right;
}
#closeIcon:hover{
	opacity:1;
}
#renamefile{
	width: 300px;
	height: 300px;
	margin: 100px auto 0 auto;
	background-color: #dadada;
	text-align: center;
	border: #404040 10px solid;
}

#renamefile p{
	padding-top: 80px;
}

#renamefile form{
	margin-top: 60px;
}

#uploadbox{
	width: 300px;
	height: 300px;
	margin: 100px auto 0 auto;
	background-color: #dadada;
	text-align: center;
	border: #404040 10px solid;
}

#uploadbox p{
	padding-top: 80px;
}

#uploadbox form{
	padding-top: 0;
	padding-bottom: 50px;
}

#mkdirbox{
	width: 300px;
	height: 300px;
	margin: 100px auto 0 auto;
	background-color: #dadada;
	text-align: center;
	border: #404040 10px solid;
}

#mkdirbox p{
	padding-top: 80px;
}

#mkdirbox form{
	padding-top: 10px;
	padding-bottom: 50px;
}

#delfilebox{
	width: 400px;
	height: 280px;
	margin: 100px auto 0 auto;
	background-color: #dadada;
	text-align: center;
	border: #404040 10px solid;
}


#delfilebox a:hover{
	text-decoration: underline;
}


#usersearch{
	width: 300px;
	height: 300px;
	margin: 100px auto 0 auto;
	background-color: #dadada;
	text-align: center;
	border: #404040 10px solid;
}

#usersearch p{
	padding-top: 80px;
}

#searchres{
	width: 300px;
	height: 300px;
	margin: 100px auto 0 auto;
	background-color: #dadada;
	text-align: center;
	border: #404040 10px solid;
}

#searchres p{
	padding-top: 80px;
}



#userfooter{
	position: fixed;
	width: 100%;
	background-image: url("img/dim_bk.png");
	right: 0;
	bottom: 0;
	text-align: right;
	font-size: 12px;
}

#userfooter p{
	color: #FFF;
	margin: 0 5px 2px 0;
}

#userfooter a{
	color: #FFF;
	text-decoration: none;
}

#userfooter a:hover{
	text-decoration: underline;
}

.centeritem{
	text-align: center;
}
