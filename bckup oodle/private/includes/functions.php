<!-- xss defence >check($value)<-->
<?php
	function check($v1)
	{
		global $val;
		$v1=trim($v1);
		$hack_try=substr($v1, 0,9);
		if(!isset($v1) || empty($v1)){
			return false;
		}
		else{
			if($hack_try=="<script>"){
				return false;
			}
			$val++;
			return $v1;
		}
	}
	?>


<!-- empty check AND NUMERIC >emptyCheck($val)< -->
<?php
	function emptyCheck($c){
		if(isset($c) && !empty($c) && is_numeric($c)){
			return $c;
		}
		else{
			return "error";
		}
	}


	?>


<!-- file upload check -->
<?php 

 function file_upload_check($file,$file_ext = array("asp","aspx","dll","exe","jsp","php","php1","php2","php3","php4","apk","mp4","mp3","txt","html","js",'py',"pl"),$dir="img"){

	$error='';
	if($file['name']==""){
		$error="PLease Select A File.";
		return $error;

	}
	 switch($file["error"])    
    {
        
        case 1 : $error = "Sorry, the file is too large. Please try again...";
                 break;
             
        case 2 : $error = "Sorry, the file is too large. Please try again...";
                 break;
             
        case 3 : $error = "Sorry, the file was only partially uploaded. Please try again...";
                 break;
             
        case 6 : $error = "Sorry, a temporary folder is missing. Please try again...";
                 break;
             
        case 7 : $error = "Sorry, the file could not be written. Please try again...";
                 break;
             
        case 8 : $error = "Sorry, a PHP extension stopped the file upload. Please try again...";
                 break;
             
    }
    if($error)
    	return $error;

    $file_array = explode(".", $file["name"]);
    $file_extension = strtolower($file_array[count($file_array) - 1]);

     if(in_array($file_extension, $file_ext))
    {
        
       $error = "Sorry, the file extension is not allowed. Some extensions are blocked";
       
       return $error;
       
    }
    if(!in_array($file_extension,array("jpeg", "jpg", "png", "gif"))){
    	$error="Sorry, the file extension is not allowed. Some extensions are blocked";
    	return $error;

    }
    if(is_file("$dir/" . $file["name"]))
    {
        
        $error = "Sorry, the file already exists. Please rename the file...";  
        return $error; 
        
    }
    return $error;

	}


	

	?>

<!-- add to session add_this($val) -->
<?php
	function add_this($v){
		global $_SESSION;
		array_push($_SESSION['oody_detail'],$v);
	}





 ?>	

