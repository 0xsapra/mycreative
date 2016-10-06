<?php
session_start();
if(!isset($_SESSION["uname"]))
	header("Location: home.html");
include("connection_users.php");
$result=mysql_query("select user1,user2 from conversations where user1='".$_SESSION["uname"]."' OR user2='".$_SESSION["uname"]."'",$con);
while($row=mysql_fetch_row($result))
{

	if($row[0]!=$_SESSION["uname"])
		echo "<a href='chat_box.php?send_to=$row[0]'>$row[0]</a><br><br><br>";
	else
		echo "<a href='chat_box.php?send_to=$row[1]'>$row[1]</a><br><br><br>";
}	
?>