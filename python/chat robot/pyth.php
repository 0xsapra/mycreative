
<?php 
	if(isset($_GET['data'])){
		$data=(string)$_GET['data'];
		$data="python full.py ".$data;
		system($data);
	}
?>
