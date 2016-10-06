<?php
session_start();
if(!isset($_SESSION["uname"]))
	header("Location: home.html");
?>
<html>
	<head>
		<title>HOME</title>
	</head>
	<body>
		<h1>COMMON HOME PAGE OODLES WALA</h1><br>
		<h3>WELCOME <?php echo $_SESSION["uname"] ?></h3><br><br><br>
		<hr>
		Click <a href="post_job.php">here</a> to POST a job and FIND  a FREELANCER<br><br>
		<br>
		<?php
			include("connection_users.php");
			$result=mysql_query("SELECT worker FROM user_details WHERE uname='".$_SESSION["uname"]."'",$con);
			if($row=mysql_fetch_row($result)){
				if($row[0]=='not_yet')
					echo "Click <a href='worker_details.php'>here</a> to JOIN us as A FREELANCER<br><br>";
				else
					echo "Click <a href='jobs.php'>here</a> to FIND jobs";
			}
		?>
		<br><br><br>
		Click <a href="chat.php">here</a> to CHAT
	</body>
</html>