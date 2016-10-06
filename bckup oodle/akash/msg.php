<?php
session_start();
if(!isset($_SESSION["uname"]))
	header("Location: home.html");
?>
<html>
<head>
<title>msg</title>
<script>
	function msg(){
		var x = new XMLHttpRequest();	
		var user = document.getElementById("send_to").value;
		var msg = document.getElementById("msg").value;
		x.open("GET","post_msg_ajax.php?send_to="+user+"&msg="+msg,true);
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
	<INPUT TYPE="hidden" id="send_to" value="<?php echo htmlentities($_GET["send_to"])?>" >
	<BR><BR><BR>
	<TEXTAREA id="msg" ROWS="7" COLS="70"></TEXTAREA>
	<BR><BR><BR>
	<INPUT TYPE="button" VALUE="send" onClick="msg()">
	<BR><BR><BR>
	<div id='t'></div>
</body>
</html>