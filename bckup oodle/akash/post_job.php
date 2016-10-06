<?php
session_start();
if(!isset($_SESSION["uname"]))
	header("Location: home.html");
?>
<html>
<head>
	<title>POST JOBS HERE</title>
</head>
<body>
	POST A JOB<br>
	<FORM METHOD="POST" ACTION="search.php">
		<TEXTAREA NAME="job" ROWS="4" COLS="70"></TEXTAREA>
		<br><br><br><INPUT TYPE="submit">
	</FORM>
</body>
</html>