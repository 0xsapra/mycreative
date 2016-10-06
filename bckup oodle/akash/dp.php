<?php
	session_start();
	if(!isset($_SESSION["uname"]))
		header("Location: home.html");
?>
<html>
<head><title>DP LAGAUNGA</title></head>
<body>
<form action="dp.php" method="post" enctype="multipart/form-data">
	FILE :	<input type="file" name="image">
	<br><br>
	<INPUT TYPE="submit" name="submit" VALUE="Upload">
</form>
</body>
</html>