<html>
	<head>
		<title></title>
	<script>
		function aju(t){
			alert(t);
		}
	</script>
	</head>
	<body>
		<?php $i=1; ?>
		<input type='text' id='t1' value='a'>
		<input type='button' onclick='aju(t<?php echo $i; ?>.value)'>
		<?php $i++; ?>
		<input type='text' id='t2' value='aa'>
		<input type='button' onclick='aju(t<?php echo $i; ?>.value)'>
	</body>
</html>
