<?php
	if(!isset($_COOKIE["worker"])){
		$et=24*60*60+time();
		echo "a<br>";
		include("connection_user.php");
		//$result=mysql_query("SELECT worker FROM user_details WHERE uname='".$_SESSION["uname"]."'",$con);
		$result=mysql_query("SELECT worker FROM user_details WHERE uname='akash'",$con);
			if($row=mysql_fetch_row($result)){
				setcookie("worker",$row[0],$et);
				}
		}
?>