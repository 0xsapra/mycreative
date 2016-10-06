<?php
require_once('../private/includes/functions.php');
session_start();
// js sei dont let page send until all fields r filled.
if(!isset($_SESSION['uname'])){
	header("Location: index.php");
	exit;
}
	$val=0;

if(isset($_POST['submit'])){
	?><script>top.location.href="google.com"</script><?php
	$title=check($_POST['t1']);
	$desc=check($_POST['t2']);
	$field=check($_POST['option-value']);
	$tag=check($_POST['t3']);
	$req=check($_POST['t4']);
	
}
if($val===5){
	$_SESSION['oody_detail']= array('title'=>$title,'desc'=>$desc,'field'=>$field,'tag'=>$tag,'extra'=>$req);
	print_r($_SESSION['oody_detail']);
	header("Location: price.php");
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
	html,body{
    	color: #222;
	    line-height: 1.4;
	    position: relative;
	    margin: 0;
	  	padding: 0;
	}
	textarea{
		font-size: 26px;
		box-shadow: 1px 1px 2px gray,-2px -2px 1px whitesmoke;
        resize: none;
        border-radius: 1vh;
        padding: 1vh;
        outline: none;
        border: 0;
	}
	#tt,textarea{
		width: 90%;
	}
	td select{
	 	border: none;
	    box-shadow: 1px 1px 2px gray,2px 2px 1px whitesmoke;
	    border-radius: 0px;
	    height: 50%;
	    width: 50%;
        letter-spacing: 0.3vh;
            word-spacing: 0.5vh; 
        font-size: 2vh;
        font-weight: 600;
        padding: 1vh;
	    font-family: helvetica, tahoma, sans-serif, serif,monospace;
		background-color: #fff;
        
	}	
        select {
            outline: none;
        }
	.space-tr{
		height: 10px;
	}
	span{
		
		opacity: 0.7;
	}
        td {
            color: black;
            font-weight: bold;
            letter-spacing: 0.2vh;
            font-family: helvetica, tahoma, sans-serif, serif;
            text-indent: 1.3vh;
        }
        .diff {
            text-align: left;
            text-indent: 1.6vh;
        }
        .form-btn {
	-moz-box-shadow:inset -12px -39px 33px -25px #23395e;
	-webkit-box-shadow:inset -12px -39px 33px -25px #23395e;
	box-shadow:inset -12px -39px 33px -25px #23395e;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #2e466e), color-stop(1, #415989));
	background:-moz-linear-gradient(top, #2e466e 5%, #64B5F6 100%);
	background:-webkit-linear-gradient(top, #2e466e 5%, #64B5F6 100%);
	background:-o-linear-gradient(top, #2e466e 5%, #64B5F6 100%);
	background:-ms-linear-gradient(top, #2e466e 5%, #64B5F6 100%);
	background:linear-gradient(to bottom, #2e466e 5%, #64B5F6 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#2e466e', endColorstr='#64B5F6',GradientType=0);
	background-color:#2e466e;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:2px solid #1f2f47;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:'Open Sans', tahoma, helvetica,Verdana, sans-serif, serif;
	font-size:15px;
	font-weight:bold;
	padding:8px 76px;
	text-decoration:none;
	text-shadow:4px 0px 12px #1b2d45;
}

.form-btn:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #415989), color-stop(1, #2e466e));
	background:-moz-linear-gradient(top, #415989 5%, #2e466e 100%);
	background:-webkit-linear-gradient(top, #415989 5%, #2e466e 100%);
	background:-o-linear-gradient(top, #415989 5%, #2e466e 100%);
	background:-ms-linear-gradient(top, #415989 5%, #2e466e 100%);
	background:linear-gradient(to bottom, #415989 5%, #2e466e 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#415989', endColorstr='#2e466e',GradientType=0);
	background-color:#415989;
}
.form-btn:active {
	position:relative;
	top:1px;
}
        option {
            font-family: helvetica, tahoma, sans-serif, serif;
        }
	</style>
</head>
<body>

	<div class="frame"><form id="title" action="#" method="post">
		<div style="text-align: center;opacity: 0.8;"><h2>Create Oody</h2></div>
			<hr width="80%" style="opacity: 0.6;">

		<table>
			<tr class="space-tr"></tr>

			<tr>
				<td><span>TITLE</span></td>
				<td id="tt"><textarea name="t1" form="title" id="t1"  cols="30" rows="2" placeholder="I WILL CREATE THIS OODY FOR YOU"></textarea></td>
			</tr>
			<tr class="space-tr"></tr>
			<tr>
				<td><span>DESCRIPTION</span></td>
				<td><textarea name="t2" style="font-size:18px" id="t2" cols="30" rows="3"></textarea></td>
			</tr>
			<tr style="height:8vh">
				<td><span>CATEGORIES</span></td>
				<td class="diff"><select name="option-value">
					<option value="website design">WEB TECHNOLOGY</option>
					<option value="programming">PROGRAMMING AND IT</option>
					<option value="data entry">DATA ENTRY</option>
					<option value="audio/video">AUDIO/VIDEO</option>
					<option value="mobile app">MOBILE</option>
					<option value="graphics design">GRAPHIC DESIGN</option>

				</select></td>
				<td></td>
			</tr>
			<tr>
				<td><span>TAGS</span></td>
				<td><textarea name="t3" id="t3" style="font-size:16px" cols="30" rows="2"></textarea></td>
			</tr>
			<tr class="space-tr"></tr>

			<tr>
				<td><span class="diff2">EXTRA&nbsp;REQUIREMENT</span></td>
				<td><textarea name="t4" id="t4" cols="30" rows="3"></textarea></td>
			</tr>
		</table><div style="text-align:center;padding-top:4vh;">
			<input type="submit" name="submit" target="open" class="form-btn" value="NEXT"></div>
		</form>
	</div>
</body>
</html>