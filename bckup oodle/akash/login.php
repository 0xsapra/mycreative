<?php
$password=$_POST["t2"];
$uname=$_POST["t1"];
include("connection_users.php");
$query="select password from users where uname='$uname'";
	$result=mysqli_query($con,$query);
	if($row=mysqli_fetch_array($result))
	{
			session_start();
			$_SESSION["uname"]=$uname;
			mysql_close($con);
			if(isset($_SESSION["uname"]))
				header("Location: index.php");
	}
	else
	{
		echo "Invalid Login Id";
	}
	
?>