<?php
if(isset($_POST['submit']))
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("user",$con); 
	$file=addslashes($_FILES['image']['tmp_name']); 
	//var_dump($file);
	if(!isset($file))
		echo "chutiye image toh uplaod karle<br>";
	 else{
		$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_size=getimagesize($_FILES['image']['tmp_name']);
		if($image_size==FALSE)
			echo "chutiye image daal chutiyapa mat kar";
		else{
			if(!($query=mysql_query("UPDATE user_details set dp='$image' where uname='akash'",$con)))
				echo "chutiyapa hua";
			else{
				echo "image: <img src=get.php?id='akash236'>";
			}
		}

	 }
}
?>
<html>
<head><title>DP LAGAUNGA</title></head>
<body>
<form action="profile_pic.php" method="post" enctype="multipart/form-data">
	FILE :	<input type="file" name="image">
	<br><br>
	<INPUT TYPE="submit" name="submit" VALUE="Upload">
</form>
<br><br><br>
<A HREF="index.php">SKIP DP</A>
</body>
</html>
