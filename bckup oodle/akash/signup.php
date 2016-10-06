<?php
	include("connection_users.php");
	$uname=$_POST["uname"];
	$password=$_POST["password"];
	$email=$_POST["email"];
	if(mysql_query("INSERT into users VALUES('','$uname','$password','$email')",$con)){
		if(mysql_query("INSERT into user_details(uname) VALUES('$uname')",$con)){ 
		session_start();
		$_SESSION["uname"]=$uname;
		header('Location: signup_1.php');
		}
		else
			echo "a";
	}	
	else
		die(mysql_error());
?>