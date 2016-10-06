<?php
session_start();
include("connection_users.php");
$cid=$_POST["cid"];
$result1=mysql_query("select user_from,msg from messages where cid='$cid' ORDER BY msg_id DESC") or die(mysql_error());
while($row=mysql_fetch_array($result1))
	echo "<span>$row[0]</span>:<span>$row[1]</span><br>";
?>