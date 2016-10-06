<?php 
	session_start();
	if(!isset($_SESSION["uname"]))
		{header("Location: index.php"); exit;}
	require_once('../private/includes/functions.php');
	require_once("../private/includes/clas.php");
	if(!isset($db)){
		echo "DUE TO SOME ERROR CANNOT PROCESS THE PAGE<BR>SORRY FOR INCONVIENIENECE";
	}
?>

<?php
	
	$file_error='';
	$file_error1='';
	$file_error2='';
	$x=0;
	if(isset($_POST['submit'])){
		
		$file_error=file_upload_check($_FILES['image']);
		$file_error1=file_upload_check($_FILES['image1']);
		$file_error2=file_upload_check($_FILES['image2']);
		echo $file_error;
		echo $file_error1;
		echo $file_error2;
		
		if(!$file_error && !$file_error1 && !$file_error2 ){
			
			move_uploaded_file($_FILES["image"]["tmp_name"], "img/" . $_FILES["image"]["name"]);
			move_uploaded_file($_FILES["image1"]["tmp_name"], "img/" . $_FILES["image1"]["name"]);
			move_uploaded_file($_FILES["image2"]["tmp_name"], "img/" . $_FILES["image2"]["name"]);
				$x+=3;
				
		}
		
 		// make a logic for more than 1 file par next page here...
		if($x===3){
		$sno='';
		$un=$db->secure($_SESSION["uname"]);
		$query='SELECT sno from clients_detail where uname="'.$un.'" limit 1';
		
		$res=$db->query($query);

		if(!$res){
		echo "huh";	
		//$_SESSION=null; header('Location: index.php');exit; 
		}
		else{$sno=mysqli_fetch_row($res)[0];}

		mysqli_free_result($res);
	
		$img_nam=array($_FILES["image"]["name"],$_FILES["image1"]["name"],$_FILES["image2"]["name"]);
		foreach ($img_nam as $par) {
			$par=$db->secure($par);
		}

		$query="INSERT INTO pictures(sno_id,pic1,pic2,pic3) values({$sno},'{$img_nam[0]}', '{$img_nam[1]}',  '{$img_nam[2]}')";
		if(!($res=$db->query($query))){
			header("Location: error.php");
		}
		else{

			$all_of_it=$_SESSION['oody_detail'];
			
			$q='SELECT id from tags where category="'.$all_of_it['field'].'" limit 1';
			$tagid=$db->get_one_value_back($q);
			
			// -----------------------------------------------------//
			// 					VERY IMPORTANT NOTE         		|
			// THE PIC _ID IN PICTURES IS BASICALYY SAME AS JOB_ID	\
			// 				SO USE THT AS A REFRENCE 				\
			//  ----------------------------------------------------

			$query='INSERT INTO job(sno_client,title,description,category,tag_id,extra,price,delivery_time,extra_fast,shipping)';
			$query.=' values('.$sno.',"'.$all_of_it["title"].'","'.$all_of_it["desc"].'","'.$all_of_it["field"].'", "';
			$query.=$tagid.'", "';
			$query.=$all_of_it["extra"].'","'.$all_of_it["price"].'","'.$all_of_it["day"].'","'.$all_of_it["fast-del"].'","'.$all_of_it["ship"].'") ';
			
			
			if($result_of_main=$db->query($query)){
				$qu="select jobs_given from clients_detail where sno=".$sno."";
				$oldjob=$db->get_one_value_back($qu);
				$oldjob++;
				$qu="UPDATE clients_detail set jobs_given =".$oldjob." where sno=".$sno."";
				
				$db->query($qu);
				//Loading icon here///

				?><script>top.location.href="jobs.php"</script><?php
			}


		}
		}
		else {
			echo "error, dude by js,PUT whtever here";

		}
		
	}

	
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <link href="css/font-awesome-4.6.1/css/font-awesome.min.css" rel="stylesheet">
	 <script src="js/vendor/external/jquery/jquery.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="js/vendor/jquery-ui.js"></script>
	
	<title></title>
	<link type="text/css" href="css/gallery.css" rel="stylesheet"></style>
</head>
<body style="height:1000vh">
	<div class="main-body" style="height:100vh">
		<div class="main">
			<div style="text-align: center;opacity: 0.8;"><h2>PhotoBomb The OoDee</h2></div>
		<hr width="80%">

		<form action="#" method="post"  enctype="multipart/form-data">
			
			<div style="text-align: left;margin:0 auto;width:80vw;">
					<p class="p_adjust">Add photo to describe your Oody</p>
			</div>
		<div class="inside-main">
					
			<div id=middle>		
				<div id="far_left" class="position-on" style="visibility:hidden"></div>
				<div><input type="file" name="image" id="image" class="inputfile">
				<label for="image" id="galery-img" class="position-on"><span style="margin-top: 2vh;line-height:20vh;">Browse A File</span></label></div>

				<div><input type="file" name="image1" id="image1" class="inputfile">
				<label for="image1" id="galery-img-right" class="position-on"><span style="margin-top: 2vh;line-height:20vh;">Browse A File</span></label></div>

				<div><input type="file" name="image2" id="image2" class="inputfile">
				<label for="image2" id="galery-img-left" class="position-on"><span style="margin-top: 2vh;line-height:20vh;">Browse A File</span></label></div>
				<div id="far_right" class="position-on" style="visibility:hidden"></div>
			</div>
		</div>

			<hr width="80%" style="opacity:0.6">
		
		</div>
		
		<div style="font-size:4vh;text-align:center;opacity:0.9;">Gallery</div>
	
				<input TYPE="submit" name="submit" VALUE="UPLOAD">
		</div>
				</form>

	</div>	
</body>

<!--script from here and end of html -->

<?php $db->close_conn(); ?>
<script src="js/gallery.js"></script>
</html>
