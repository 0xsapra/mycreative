<?php
	session_start();
	// if(!isset($_SESSION["uname"]))
	// 	header("Location: home.html");
?>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="POST" action="signup_2.php">
			First Name:<input type="text" name="fname" required><br><br>
			Last Name:<input type="text" name="lname" required><br><br>
			Mob No:<input type="text" name="mob" required><br><br>
			City:<input type="text" name="city" required><br><br>
			State:<input type="text" name="state" required><br><br>
			DOB:<input type="date" name="dob" required><br><br>
			<input type="submit">
		</form>
	</body>
</html>