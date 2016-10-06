<?php
session_start();
if(!isset($_SESSION["uname"]))
		header("Location: home.html");
include("connection_users.php");
$title=$_POST["title"];
$about=$_POST["about"];
$keywords=$_POST["tags"];
if(mysql_query("INSERT INTO worker VALUES('','".$_SESSION["uname"]."','$title','$about','$keywords','0')",$con)){
	if(mysql_query("UPDATE user_details SET worker='yes' WHERE uname='".$_SESSION["uname"]."'",$con))
		header("Location: profile.php");
	else
		die(mysql_error());
}
else
	die(mysql_error());
?>