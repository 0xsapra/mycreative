<?php
session_start();
if(!isset($_SESSION["uname"]))
	header("Location: home.html");
include("connection_users.php");
$job=$_POST["job"];
$i=0;
if(mysql_query("INSERT INTO jobs(posted_by,job) VALUES('".$_SESSION["uname"]."','$job')",$con)){
	echo "YOUR JOB IS POSTED SUCCESSFULLY<br><br>";
	$tags=explode(" ", $job);
	$query="SELECT uname,title FROM worker WHERE ";
	foreach($tags as $each){
		$i++;
		if($i==1)
			$query.="keywords LIKE '%$each%' ";
		else
			$query.="OR keywords LIKE '%$each%' ";
	}
	$result=mysql_query($query,$con);
	while($row=mysql_fetch_array($result)){
		if($row[0]!=$_SESSION["uname"])
			echo "<br><a href='profile.php?uname=$row[0]'>".$row[0]."</a>-------------<a href='msg.php?send_to=$row[0]'>msg</a><br>".$row[1]."<br><br><hr>";
	}
}
else
	die(mysql_error());
?>