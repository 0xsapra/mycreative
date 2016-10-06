<?php
session_start();
if(!isset($_SESSION["uname"]))
		header("Location: home.html");
//include("connection_users.php");
?>
<html>
	<head>
		<title>JOIN US</title>
	</head>
	<body>
		<h2>JOIN US HERE AS A FREELANCER!!</h2>
		<form method="POST" action="worker_details_insert.php">
			TITLE: <input type="text" name="title" size="70"><br><br>
			About You:<TEXTAREA NAME="about" ROWS="4" COLS="70"></TEXTAREA><br><br>
			Tags: <input type="text" name="tags" size="70"><br><br>
			<input type="submit">
		</form>
	</body>
</html>