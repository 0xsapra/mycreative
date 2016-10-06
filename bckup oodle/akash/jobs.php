<?php
session_start();
if(!isset($_SESSION["uname"]))
	header("Location: home.html");
$i=1;
include("connection_users.php");
$result=mysql_query("SELECT job,posted_by,dates,job_id,posted_by FROM jobs WHERE status='pending'");
while($row=mysql_fetch_array($result)){
	echo "<br>".$row[0]."----<a href='profile.php?uname=$row[1]'>".$row[1]."</a>----".$row[2];
	if($row[1]!=$_SESSION["uname"]){
		echo "----<a href='msg.php?send_to=$row[1]'>msg</a>----";
?>
		<html>
		<head>
			<title>REQUEST JOBS</title>
			<script>
				function aju(job_id,posted_by){
					var x = new XMLHttpRequest();
					x.open("GET","jobs_ajax.php?job_id="+job_id,true);
					x.setRequestHeader("content-type","application /x-wwww-form-urlencoded");
					x.send(null);
					x.onreadystatechange = function(){
					if(x.readyState === 4 && x.status == 200)
						document.getElementById("t").innerHTML = x.responseText;
					}
				}
			</script>
		</head>
		<body>
			<input type="hidden" id="job_id<?php echo $i; ?>" value="<?php echo $row[3]; ?>">
			<?php
				$q=mysql_query("SELECT req_by FROM job_requests WHERE job_id='$row[3]'");
					$numrows=mysql_num_rows($q);
					if($numrows > 0)
						echo "<input type='button' value='Requested'>";
					else{
			?>
			<input type='button' value='Request' onClick='aju(job_id<?php echo $i; ?>.value)'><br>
		</body>
	</html>
<?php
}
$i++;
	}
}
echo "<br><br><div id='t'></div>";
?>
