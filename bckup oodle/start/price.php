<?php
require_once("../private/includes/functions.php");
session_start();
$oody=$_SESSION['oody_detail'];
if(!(isset($oody) && count($oody)>=5))
	{header("Location: info.php");
	exit;	
		}
?>
<?php
	$nex=0;
	if(isset($_POST['submit']) && isset($oody) && $_POST['submit']==="NEXT"){
		
		if(emptyCheck($_POST['option-value'])!="error"){
			$_SESSION['oody_detail']['price']=$_POST["option-value"];
			$nex++;
		}
		if(emptyCheck($_POST['option-value1'])!="error"){
			
			$_SESSION['oody_detail']['day']=$_POST["option-value1"];
			$nex++;
		}
		if(isset($_POST['option-value2']) && emptyCheck($_POST['option-value2']!='error')){
				
			$_SESSION['oody_detail']['fast-del']=$_POST["option-value2"];
			$nex++;
		}
		if(isset($_POST['option-value3']) && emptyCheck($_POST['option-value3']!='error')){
				
			$_SESSION['oody_detail']['ship']=$_POST["option-value3"];
			$nex++;
		}
		if($nex>=2){
				
				 header('Location: gallery.php');
				 exit;
			}
		
	}
	
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/price.css">
	 <script src="js/vendor/external/jquery/jquery.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="js/vendor/jquery-ui.js"></script>
	<link href="css/font-awesome-4.6.1/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php 
//array_push($_SESSION['oody_detail'], "another vall");
//echo "<pre>"; print_r($_SESSION); echo "</pre>";

?>
    <div id=main>
	<div style="text-align: center;opacity: 0.8;"><h2>Price Your OoDee</h2></div>
	<hr width="80%">
        <div class="frame">
            <form action="#" method="post">
            <table>
                <tr><td class="lhs">PRICE</td>
                    <td class="rhs">
                    <select name="option-value" class="dropdown" id="price-drop">
					<option value="0">PRICE&nbsp;(in rupees)</option>
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<option value="200">200</option>
					<option value="300">300</option>
					<option value="400">400</option>
					<option value="500">500</option>
					<option value="600">600</option>
					<option value="700">700</option>
					<option value="800">800</option>
					<option value="900">900</option>
					<option value="1000">1000</option>
					<option value="1100">1100</option>
					<option value="1200">1200</option>
					<option value="1300">1300</option>
					<option value="1400">1400</option>
					<option value="1500">1500</option>
					<option value="1600">1600</option>
					<option value="1700">1700</option>
					<option value="1800">1800</option>
					<option value="1900">1900</option>
					<option value="2000">2000</option>
				</select>
                    </td>
                </tr>
                <tr><td class="lhs">DELIVERY TIME</td>
                    <td class="rhs">
                    <select name="option-value1" class="dropdown" id="time-drop">
					<option value="0">Delivery Time</option>
					<option value="1">1 DAY</option>
					<option value="2">2 DAYS</option>
					<option value="3">3 DAYS</option>
					<option value="4">4 DAYS</option>
					<option value="5">5 DAYS</option>
					<option value="6">6 DAYS</option>
					<option value="7">7 DAYS</option>
					<option value="8">8 DAYS</option>
					<option value="9">9 DAYS</option>
					<option value="10">10 DAYS</option>
					<option value="11">11 DAYS</option>
					<option value="12">12 DAYS</option>
					<option value="13">13 DAYS</option>
					<option value="14">14 DAYS</option>
					<option value="15">15 DAYS</option>
					<option value="16">16 DAYS</option>
					<option value="17">17 DAYS</option>
					<option value="18">18 DAYS</option>
					<option value="19">19 DAYS</option>
					<option value="20">20 DAYS</option>
					<option value="21">21 DAYS</option>
					<option value="22">22 DAYS</option>
					<option value="23">23 DAYS</option>
					<option value="24">24 DAYS</option>
					<option value="25">25 DAYS</option>
				</select>
                    </td>
                </tr>
                <tr>
                <td class="lhs diff"><input type="checkbox" class="checky" id="efd">&nbsp;EXTRA FAST DELIVERY</td>
                <td class="rhs">
                    <select name="option-value2" class="dropdown" id="checkyefd">
					<option value="0">PRICE&nbsp;(in rupees)</option>
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="75">75</option>
					<option value="100">100</option>
					<option value="150">150</option>
					<option value="200">200</option>
				</select>
                    </td>
                </tr>
                <tr>
                <td class="lhs diff"><input type="checkbox" class="checky" id="ship">&nbsp;SHIPPING</td>
                <td class="rhs">
                    <select name="option-value3" class="dropdown" id="checkyship">
					<option value="0">PRICE&nbsp;(in rupees)</option>
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="75">75</option>
					<option value="100">100</option>
					<option value="150">150</option>
					<option value="200">200</option>
				</select>
                    </td>
                </tr>
                <tr><td class="lhs diff"><input type="checkbox" class="checky" id="add-extra">&nbsp;ADD EXTRA</td></tr>
            </table>  
                <span id="btnss">
                <input type="submit" name="prev" target="open" class="form-btn" value="PREVIOUS" style="position:absolute;left:1vh;">
                <input type="submit" name="submit" target="open" class="form-btn" value="NEXT" style="position:absolute;right:0;">
                </span>
            </form>
    </div></div>
    <script type="text/javascript" src="js/price.js"></script>
    </body>
</html>