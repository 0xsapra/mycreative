<?php
session_start();
include("connection_users.php");
$from=$_SESSION["uname"];
$cid=$_GET["cid"];
$msg=$_GET["msg"];
mysql_query("insert into messages values('','$cid','$from','$msg')",$con) or die(mysql_error());
$result1=mysql_query("select user_from,msg from messages where cid='$cid' ORDER BY msg_id DESC") or die(mysql_error());
while($row=mysql_fetch_array($result1))
	echo "<span>$row[0]</span>:<span>$row[1]</span><br>";
?>