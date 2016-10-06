<?php
	session_start();
	if(!isset($_SESSION["uname"]))
		header("Location: home.html");
	include("connection_users.php");
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$mob=$_POST["mob"];
	$city=$_POST["city"];
	$state=$_POST["state"];
	$dob=$_POST["dob"];
	if(mysql_query("UPDATE user_details set fname='$fname', lname='$lname', mobile='$mob', city='$city', state='$state', dob='$dob' WHERE uname='".$_SESSION["uname"]."'",$con))
		header("Location: profile_pic.php");
	else
		die(mysql_error());
?>
