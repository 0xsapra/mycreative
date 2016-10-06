<?php
include("connection_users.php");
session_start();
if(mysql_query("INSERT INTO job_requests (job_id,req_by) VALUES ('".$_GET['job_id']."','".$_SESSION['uname']."')",$con))
	echo "REQUESTED";
 else
 	die(mysql_error());
mysql_close($con);
?>