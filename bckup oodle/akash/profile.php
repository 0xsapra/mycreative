<?php
session_start();
if(!isset($_SESSION["uname"]))
	header("Location: home.html");
echo "<a href='index.php'>HOME</a><br><br><hr>";
include("connection_users.php");
if(isset($_GET["uname"]))
	$uname=$_GET["uname"];
else
	$uname=$_SESSION["uname"];
$result=mysql_query("SELECT * FROM user_details where uname='$uname'",$con);
if($row=mysql_fetch_row($result)){
	echo $row[1]."<br>";
	echo $row[2]."<br>";
	echo $row[3]."<br>";
	echo $row[4]."<br>";
	echo $row[5]."<br>";
	echo $row[6]."<br>";
	echo $row[8]."<br>";
	if($row[9]=='not_yet')
		echo $row[9]."<br>";
	else{
		$result=mysql_query("SELECT * FROM worker where uname='".$_SESSION["uname"]."'",$con);
		if($row=mysql_fetch_row($result)){
			echo "DETAILS OF WORKERS";
		}
	}
}
?>