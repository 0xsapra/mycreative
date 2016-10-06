<?php

ob_start();
require("connection_users.php");
session_start();

$et=time()+1*24*60*60;
if(isset($_COOKIE["uname"]) || isset($_SESSION["uname"])){$hid=1;}

if(isset($_POST['submit1']))
{$uname=mysqli_real_escape_string($con,$_POST["username"]);
$password=mysqli_real_escape_string($con,$_POST["password"]);

	$query="select uname from clients_detail where uname='{$uname}' and password='{$password}'";
    
	$result=mysqli_query($con,$query);

	if($row=mysqli_fetch_assoc($result))
	{
			setcookie("uname",$uname,$et);
			$_SESSION["uname"]=$uname;
			if(isset($_COOKIE["uname"]) || isset($_SESSION["uname"])){$hid=1;}
      
	}
	else
	{
        $error="not valid username/password";
        
	}}

if(isset($_POST['submit2'])){
    
    $check=0;
    $priority=5;
    $no_work=0;
    if(isset($_POST['username']) && !empty($_POST['username']))
        {$u=$_POST['username']; 
         $u=mysqli_real_escape_string($con,$u);
         $check++;}
    
    if(isset($_POST['name']) && !empty($_POST['name']))
       { $u_n=$_POST['name'];
        $u_n=mysqli_real_escape_string($con,$u_n);
        $check++;}
    
    if(isset($_POST['mobile']) && !empty($_POST['mobile']))
       { $m=$_POST['mobile']; 
        $m=mysqli_real_escape_string($con,$m);
        $check++;}
    
    if(isset($_POST['email']) && !empty($_POST['email']))
       { $e=$_POST['email']; 
        $e=mysqli_real_escape_string($con,$e);
        $check++;}
    
    if(isset($_POST['password']) && !empty($_POST['password']))
        {$p=$_POST['password'];
         $p=mysqli_real_escape_string($con,$p);
         $check++;}
    
    if($check===5)
    {
         $query=" insert into clients_detail(uname,name,mobile_no,work_no1,work_no2,email,password,priority) ";
    $query.= " values('{$u}','{$u_n}',{$m},{$no_work},{$no_work},'{$e}','{$p}','{$priority}')";
        $query1="Select * from clients_detail where uname={$u} or email={$e}";
        $result_for_check=mysqli_query($con,$query1);
        if(!$result_for_check){
            $result=mysqli_query($con,$query);
            if($result){
            $et=time()+1*24*60*60;

            setcookie("uname",$u,$et);
            $_SESSION["uname"]=$u;
              $hid=1;}
        }
        else{
            echo "user name or email taken";
            }
    }
    else{
        ?>
<!--yha kara lena jo chahie-->
<?php
    }
}
?>

<!doctype html>
<html class="no-js" lang="">
            <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/vendor/external/jquery/jquery.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="js/vendor/jquery-ui.js"></script>
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,300|Josefin+Slab|Mountains+of+Christmas' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/vendor/modernizr-2.8.3.min.js"></script>
        <link href="css/font-awesome-4.6.1/css/font-awesome.min.css" rel="stylesheet">
    </head>
        
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <?php

        if(isset($hid) && $hid===1){

            ?><script>window.addEventListener('load',function(){
        document.getElementById('main-page').style.display="none";
        document.getElementById('header2').className+=" fix";
});</script><?php
        }
        ?>
        <div id="entire-page">
        <div id="main-page" style="z-index:999">
  <div id="main-head">
  <span id="main-log-in"><a href="#" id="upper-log"><span id="head-log">LOG IN</span>&nbsp;<span id="head-btw">|</span>&nbsp;<span id="head-sign">SIGN UP</span></a></span>
  </div>
  <div id="log-sign-window" class="effect2">
      <div id="info-log"><h2 id="some-text-head">Perks of OODLES</h2>
      <div id="some-text"><ol>
          <li>You can get paid by working at home.</li>
          <li>You can get your work done sitting at home.</li>
          <li>After all its good to be lazy.</li>
      </ol></div>
      </div>
      <div id="right-log">
      <div id="sign-log-nav"><a id="inside-log" href="#" class="linkSelected" style="text-shadow:none;">Log In</a><a href="#" id="inside-sign" style="text-shadow:none;">Sign Up</a><a href="#" id="closer" style="font-family='Open Sans','righteous','Josefin Sans',tahoma, helvetica,sans-serif,serif;position:absolute;top:0;right:0;margin-top:-15px;margin-right:15px;">x</a></div>
      <div id="complete-str">
      <div id="log-window" class="form-win">
     
          <form name="Login" method="Post" action="#" class="loginf form" autocomplete="off" id="oodLog">
	       <br>
	       <label for="username" id="logusername"></label><br>
	       <input type="text" name="username" placeholder="Username or Email id" class="username  lt text-field" id="log-username"><p class="errr log-username-error" ></p><br><br>
	 
            <label for="password" id="logpassword"></label><br>
            <input type="password" name="password" placeholder="Password" class="password lt text-field" id="login-pass"><p class="errr log-password-error" ></p><br><br>
          <a href="#" class="no-shadow" id="forgot">Forgot Username or Password??</a>
          <br><br>
          <input type="submit" value="Log In" name="submit1" class="form-btn" id="log-form"><br><br>
          <span style="font-size:11px; color:grey;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By Logging In you agree to our <a href="#" class="no-shadow"  style="font-size:11px; color:cornflowerblue;text-decoration:none;">T&amp;C</a> and <a href="#" class="no-shadow" style="font-size:11px; color:cornflowerblue;text-decoration:none;">Privacy Policy</a></span>
      </form>
      </div>
      <div id="sign-window" class="form-win">
          
          <form name="SignUp" method="Post" action="" class="signupf form" autocomplete="off" id="oodSign">
         
          <label for="name" id="signname"></label><br>
	       <!--split to first and last name-->
         <input type="text" name="name" placeholder="Enter Your Full Name" class="name st text-field" id="sign-name"><p class="errr sign-name-error"></p><br><br>
          
	       <label for="email" id="signemail"></label><br><input type="email" name="email" placeholder="Email Id" class="email st text-field" id="sign-email"><p class="errr sign-email-error"></p><br><br>
	 
	       <label for="username" id="signusername"></label><br>
	       <input type="text" name="username" placeholder="Username" class="username st text-field" id="sign-username"><p class="errr sign-username-error"></p><br><br>
              <label for="mobile" id="signmobile"></label><br>
	       <input type="text" name="mobile" placeholder="Mobile Number" class="mobile st text-field" id="sign-mob"><p class="errr sign-mob-error"></p><br><br>
	 
            
            <div class="pass-saver">
                <label for="password" id="signpassword"></label><br>
                <input type="password" id="pass_check" name="password" placeholder="Password" class="password st text-field">&nbsp;
              <input type="password" id="pass_check_again" name="password" placeholder="Retype the Password" class="password st text-field"><p class="errr sign-password"></p>
              </div><br>
              
              <div style="position:absolute;bottom:3vh;"><input type="checkbox" name="ageConnfirm" value="ageConfirmed" id="checky"><span style="font-family:tahoma,helvetica,sans-serif,serif;font-size:12px;color:grey;">&nbsp;I hereby certify that I am atleast 18 years of age.</span><p class="errr checky-errr"></p><br><br>
          <input type="submit" name="submit2" value="Create OODLES Account" class="form-btn si" id="sign-form"></div>
              <span style="font-size:11px;color:grey" id="form-additional">&nbsp;&nbsp;&nbsp;&nbsp;By Signing Up you agree to our <a href="#"  class="no-shadow" style="font-size:11px; color:cornflowerblue;text-decoration:none;">T&amp;C</a> and <a href="#" class="no-shadow" style="font-size:11px; color:cornflowerblue;text-decoration:none;">Privacy Policy</a></span>
          
      </form>
          </div></div>
      </div>
  </div>
<div id="main-text">
<a id="prevB" class="mov-btn" href="#">&lang;</a><a id="nextB" class="mov-btn" href="#">&rang;</a>
    <div id="slides-container">
        <div class="top text-1" id="f1"><span class="highlightB">WE</span>L<span class="highlight">CO</span><span class="highlightB">ME</span> T<span class="highlightB">O</span> <span class="highlight">O</span><span class="highlightB">O</span>DL<span class="highlight">EE</span></div>
        <div class="sub text-1" id="f2">W<span class="highlight">E</span> WI<span class="highlightB">LL</span> H<span class="highlight">EL</span>P <span class="highlightB">YO</span>U</div>
        <div class="sub2 text-1" id="f3">F<span class="highlight">I</span><span class="highlightB">N</span><span class="highlight">D</span> <span class="highlightB">SO</span>ME W<span class="highlight">OR</span>K</div>
        <div class="top text-2" id="s1">AL<span class="highlightB">SO</span> <span class="highlight">YO</span>U C<span class="highlightB">A</span>N</div>
        <div class="sub text-2" id="s2"><span class="highlightB">HI</span>RE <span class="highlight">SO</span>ME<span class="highlightB">ONE</span></div>
        <div class="sub2 text-2" id="s3">F<span class="highlight">OR</span> <span class="highlightB">J</span>OB</div>
        <div class="top text-3" id="t1">TH<span class="highlightB">IS</span> <span class="highlight">I</span>S <span class="highlightB">ON</span>E</div>
        <div class="sub text-3" id="t2">S<span class="highlight">IT</span>E T<span class="highlightB">O</span> S<span class="highlight">O</span>L<span class="highlightB">VE</span></div>
        <div class="sub2 text-3" id="t3">A<span class="highlight">L</span><span class="highlightB">L</span> Y<span class="highlight">OUR</span> <span class="highlightB">PRO</span>BL<span class="highlight">EM</span>S</div></div>
</div>
<div id="main-btn">
<a id="main-hire-btn" class="mbtn" href="#">HIRE</a>
<a id="main-work-btn" class="mbtn" href="#">WORK</a>
</div>
<span id="lil-btn"><a href="#main" class="toScroll lily">&rang;&rang;</a></span>
</div>
        
<!--
<script>window.addEventListener('load',function(){
   document.getElementById('sign-form').addEventListener('click',function(){
      event.preventDefault();
       if(document.getElementById('pass_check').value!=null){
           //yha par pass re-enter dal dena
      }       
   }); 
});</script>
-->
        <div id='main'>
            <div id="header1"><div id="header2"  style="min-width:50px;height:8vh;"><script>document.getElementById('header2').style.display="fixed";</script>
                <div class="item">
                <img src="images/logo.png" style="height:75%;margin:0.7vw 1vh" >
                </div>
                <div class="item">
                <ul style="padding: 0;">
                    <li><a style="color:black;float: left" class="profile-btn"><?php
                        if(isset($hid) && $hid===1){
                       
                        if(isset($_SESSION['uname']))$val=$_SESSION['uname'];

              else {$val=$_COOKIE['uname'];$_SESSION['uname']=$_COOKIE['uname'];
                            }

                            echo "Welcome ".strtoupper($val);?>
                        <div class="not-tooltip profile-tip">Click for profile options</div>
                        <div class="bottom-menu">
                        <a href = "#"> Home </a><hr>
                        <a href = "#"> Request an Oodie </a>
                        <a href = "#"> Favourites </a>
                        <a href = "#"> Profile </a>
                        <a href = "#"> Setting </a><hr>
                        <a href = "#"> Help </a>
                        <a href = "logout.php"> Log Out </a>
                        </div>
                        <?php
                        }
                        else echo "Join";
                        ?></a></li>
                    <?php if(isset($hid) && $hid===1){
                        echo "<li><a href=\"#\"><i class=\"chat-btn fa fa-comments-o\" style=\"font-size:5vh\"></i></a><div class=\"not-tooltip chat-tip\">Chat</div></li>";
                    } ?>
                    
                    <?php if(isset($hid) && $hid===1){
                        echo "<li><a href=\"#\"><i class=\"notification-btn fa fa-bullhorn\" style=\"font-size:5vh\"></i></a> <div class=\"not-tooltip notification-tip\">Notifications</div></li>";
                    } ?>
                   
                    <li><span style="display:inline;margin:0px;color: lightgray">
                    |
                    </span></li>
                    
                    <?php if(!isset($hid)){
                        echo "<li><a href=\"sign-in\">Sign-In</a></li>";
                    } ?>
                    
                    <li><a id="post_proj" href="<?php
                        if(isset($_COOKIE['uname']) || isset($_SESSION['uname']))echo "worker_details.php";
                        else echo "#log-sign-window";
                        ?>" style="color:black"><span style="
                        word-spacing:-2px;
                        float:right;color:#6494ed;">Post Project Start Earning</span></a></li>
                    </ul>
                  
                </div>
                </div>
            <div id="headimg">
                <div id="headtext"><h1 style="margin:0px;">OODLEE<br></h1><span style="font-size:14px;margin:0px;"><a href="#">WORK HERE</a></span>&nbsp;&nbsp;<span style="font-size:14px;margin:0px;"><a href="#">HIRE SOMEONE</a></span>
                   </div>
                 </div>
                <!--  IMAGES LAGANI HAI SABHI JOBS KI AND KUCH LINKS SPECIFY KRNE H BAS  -->
        <div class="adjust" style="margin:0px 3vw;background-color:rgba(247, 247, 247,1);height:100%">        
                <div style="margin:2vh 0vw;height:15vh;">
            <div class="nav">
                <div id="searchBox">
                    <form name="searchIt" class="searchForm">
                        <input type="text" class="searchField" placeholder="Search Your Favourite Job...">
                        <span class="coolSearch"><button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
                            </button></span>
                    </form>
                </div>
                <div class="life-saver life-saver-1"></div>
                <div class="nav-item"><span class="life-saver life-saver-2"></span><a href="#" id="wd-nav" class="navi">WEBSITE DESIGN</a></div>
                <div class="nav-desc wd-nav-desc">
                    <div class="nav-desc-text">
                        <div class="inside-nav-desc">
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY RELATED TO WD</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a>
                        </div>    
                    </div>
                    <div class="nav-desc-img">
                        <img src="images/programming.jpg">
                    </div>
                </div>
                <div class="nav-item"><a href="#" id="gd-nav" class="navi">GRAPHIC DESIGN</a></div>
                <div class="nav-desc gd-nav-desc">
                    <div class="nav-desc-text">
                        <div class="inside-nav-desc">
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY RELATED TO GD</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a>
                        </div>    
                    </div>
                    <div class="nav-desc-img">
                        <img src="images/programming.jpg">
                    </div>
                </div>                
                <div class="nav-item"><a href="#" id="av-nav" class="navi">AUDIO/VIDEO</a></div>
                <div class="nav-desc av-nav-desc">
                    <div class="nav-desc-text">
                        <div class="inside-nav-desc">
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY RELATED TO AV</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a>
                        </div>    
                    </div>
                    <div class="nav-desc-img">
                        <img src="images/programming.jpg">
                    </div>
                </div>        
                <div class="nav-item"><a href="#" id="pg-nav" class="navi">PROGRAMMING</a></div>
                <div class="nav-desc pg-nav-desc">
                    <div class="nav-desc-text">
                        <div class="inside-nav-desc">
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY RELATED TO PG</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a>
                        </div>    
                    </div>
                    <div class="nav-desc-img">
                        <img src="images/programming.jpg">
                    </div>
                </div>        
                <div class="nav-item"><a href="#" id="de-nav" class="navi">DATA ENTRY</a></div>
                <div class="nav-desc de-nav-desc">
                    <div class="nav-desc-text">
                        <div class="inside-nav-desc">
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY RELATED TO DE</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a>
                        </div>    
                    </div>
                    <div class="nav-desc-img">
                        <img src="images/programming.jpg">
                    </div>
                </div>        
                <div class="nav-item"><a href="#" id="ma-nav" class="navi">MOBILE APP </a><span class="life-saver life-saver-3"></span></div>
                <div class="nav-desc ma-nav-desc">
                    <div class="nav-desc-text">
                        <div class="inside-nav-desc">
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY RELATED TO MA</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a><br><br>
                            <a href="#">SOMETHING WILL COME HERE EVENTUALLY</a>
                        </div>    
                    </div>
                    <div class="nav-desc-img">
                        <img src="images/programming.jpg">
                    </div>
                </div>        
                
                
                </div> 
                    </div>
                
                <div id="featured" style="height:67vh;">
                <div id="feature">
                    
                    <div class="boxy" style="height:100%;width:12vw;background-color:#6494ed;float:left;"></div>
                    <div style="color:black;float:left;font-size:6vw;line-height:0.3"><h2 style="color:#6494ed;display:inline">F</h1>EATURED <div style="display:inline;font-size:1vw">They are some featured oodlies</div></div>
                     </div>
                    <div style="margin:0px 3vw;">
                    <div class="nav">
                        
                        <div class="nav-f-item"><a href="#">PROJECT<div class="inside-nav-f">
                                <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                                </div></a></div>
                        
                        <div class="nav-f-item"><a href="#">PROJECT</a></div>
                        <div class="nav-f-item"><a href="#">PROJECT2</a></div>
                        <div class="nav-f-item"><a href="#">PROJECT3</a></div>
                    </div>
                        </div>
                </div>
            <center><hr></center>
                 <div style="height:67vh;">
                <div id="popular">
                    
                    <div class="boxy" style="height:100%;width:12vw;background-color:#6494ed;float:left;"></div>
                    <div style="color:black;float:left;font-size:6vw;line-height:0.3"><h2 style="color:#6494ed;display:inline">P</h1>OPULAR <div style="display:inline;font-size:1vw">they are some popular oodlies</div></div>
                     </div>
                    <div style="margin:0px 3vw;">
                    <div class="nav">
                    <!--items in the nav-->
                        <div class="nav-f-item"><a href="#">
                            <div class="inside-nav-f">
                                <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                                </div></a>
                        </div>
                    <!--items in the nav-->

                        <div class="nav-f-item"><a href="#">
                                 <div class="inside-nav-f">
                                    <img class="work_img" src="images/programming.jpg" height="100%" width="100%">

                                 </div></a>
                            </div>
                    <!--items in the nav-->

                        <div class="nav-f-item"><a href="#">
                            <div class="inside-nav-f">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">

                            </div></a>
                        </div>
                    <!--items in the nav-->

                         <div class="nav-f-item"><a href="#">
                            <div class="inside-nav-f">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">

                            </div></a>
                        </div>
                        
                    </div>
                        </div>
                </div>
            <center><hr></center>
            <div id="content">
             <div style="height:130vh;">
                <div id="some-imp">
                    
                    <div  class="boxy" style="height:100%;width:12vw;background-color:#6494ed;float:left;"></div>
                    <div style="color:black;float:left;font-size:6vw;line-height:0.3"><h2 style="color:#6494ed;display:inline">Q</h1>UICK SERVICE <div style="display:inline;font-size:1vw">SELECT FAST</div></div>
                     </div>
                    <div style="margin:0px 3vw;">
                    <div class="nav-quick">
                    <div class="nav-q-item">
                            <div class="inside-nav-q">
                            <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                            </div>
                    </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                        <div class="nav-q-item">
                              <div class="inside-nav-q">
                              <img class="work_img" src="images/programming.jpg" height="100%" width="100%">
                              </div>
                        </div>

                    </div>
                        </div>
                </div>
                </div>
                
            </div>
            </div>
           <br><br><br><br><br><br>
           
          

        </div>    <div id="footer">
            <div class='we'><img src="images/f.png" height="100%"></div><div class='we'><img src="images/d.png" height=100%></div><div class='we'><img height="100%" src="images/s.png"></div><div class='we'><img height="100%" src="images/a.png"></div>
            
            </div>
            </div>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>');</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
<?php
mysqli_close($con);
?>