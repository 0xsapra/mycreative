<?php
session_start();
include("connection_users.php");
$user1=$_SESSION['uname'];
$user2=$_GET["send_to"];
$msg=$_GET["msg"];
$result=mysql_query("select cid from conversations where (user1='".$_SESSION['uname']."' AND user2='$user2') OR (user2='".$_SESSION['uname']."' AND user1='$user2') ",$con);
if(mysql_num_rows($result)!=1){
	mysql_query("INSERT into conversations values('','$user1','$user2')",$con) or die(mysql_error());
	$cid=mysql_insert_id();	
}
else{
	if($row=mysql_fetch_row($result))
		$cid=$row[0];
}
mysql_query("INSERT into messages value('','$cid','".$_SESSION["uname"]."','$msg')",$con) or die(mysql_error());
echo "msg chala gaya".$cid;
?>