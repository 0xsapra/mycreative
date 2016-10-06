<?php
session_start();
if(!isset($_SESSION["uname"]))
	header("Location: home.html");
include("connection_users.php");
$from=$_SESSION["uname"];
$to=$_GET["send_to"];
$result=mysql_query("select cid from conversations where (user1='$from' AND user2='$to') OR (user2='$from' AND user1='$to') ",$con) or die(mysql_error());
if($row=mysql_fetch_row($result))
	$cid=$row[0];
?>
<html>
<head>
	<title>chat</title>
	<script src="js/jq.js"></script>
	<script>
	function msg(){
		var x = new XMLHttpRequest();	
		var cid = document.getElementById("cid").value;
		var msg = document.getElementById("msg").value;
		if(msg)
			document.getElementById("msg").value = "";
		x.open("GET","insert_msg.php?cid="+cid+"&msg="+msg,true);
		x.setRequestHeader("content-type","application /x-wwww-form-urlencoded");
		x.send();
		x.onreadystatechange = function(){
		if(x.readyState === 4 && x.status == 200)
			document.getElementById("d").innerHTML = x.responseText;
		}
	}
	 $(document).ready(function(){
	 		var cid = $("#cid").val();
	  		$.ajaxSetup({cache:false});
	  		setInterval(function(){$('#d').load('logs.php',{'cid':cid});}, 1000);
	  	});
	 </script>
</head>
<body>
	<input type="hidden" id="cid" value="<?php echo htmlentities($cid)?>"> 
	Msg:<TEXTAREA id="msg" ROWS="6" COLS="70" name="x" required></TEXTAREA><br><br>
	<input type="button" value="send" onClick="msg()"><br><br><br>
	<div id="d"></div>
</body>
</html>