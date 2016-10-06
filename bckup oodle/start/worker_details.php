<?php session_start();?>
<meta http-equip="refresh" content="5000" url="worker_details.php">
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
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/oody.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <link href="css/font-awesome-4.6.1/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript">
            $(document).ready(take_me_up);

                function take_me_up(){
    $('html').animate({scrollTop:0}, 1);
    $('body').animate({scrollTop:0}, 1);
}

        </script>
    </head>
    <body>
     <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->   

        <!-- Add your site or application content here -->
        <?php
       if(isset($_COOKIE["uname"]) || isset($_SESSION["uname"])){}
        else{
            header("Location: index.php");
        }
        ?>
        <div class="main">
        <header id="header" style="position: fixed">
            <div class="item">
            <img src="images/logo-d1.png" style="height:95%" >                
            </div>
                <script type="text/javascript">
                $('#header').css('minWidth',window.innerWidth);
                </script>
                <div class="item">
                    <ul>

                        <li><a class="profile-btn" style="color:white"><?php

                                if(isset($_SESSION['uname']) && !empty($_SESSION['uname']))
                                  {$val=$_SESSION['uname'];$hid=1;}
                                else {$val=$_COOKIE['uname'];$_SESSION['uname']=$_COOKIE['uname'];$hid=1;}


                                echo ucwords($val);
                            ?></a></li>
                            <div class="not-tooltip profile-tip">Click for profile options</div>
                        <div class="bottom-menu">
                        <a href = "index.php"> Home </a><hr>
                        <a href = "#"> Request an Oodie </a>
                        <a href = "#"> Favourites </a>
                        <a href = "#"> Profile </a>
                        <a href = "#"> Setting </a><hr>
                        <a href = "#"> Help </a>
                        <a href = "logout.php"> Log Out </a>
                        </div>
                            <?php
                            ?>
                             <li><span style="display:inline;margin:0px;color: lightgray">
                    |
                    </span></li>
                            <?php
                              if(isset($hid) && $hid===1){
                            echo "<li><a href=\"#\"><i  class=\"chat-btn fa fa-comments-o\" style=\"font-size:5vh;color:white;\"></i></a><div class=\"not-tooltip chat-tip\">Chat</div></li>";
                        } 
                        if(isset($hid) && $hid===1){
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li><a href=\"#\"><i class=\"notification-btn fa fa-bullhorn\" style=\"font-size:5vh;color:white;\"></i></a> <div class=\"not-tooltip notification-tip\">Notifications</div></li>";
                        } 
                        ?>

                    
                        </ul>
                </div>
        </header>
        <!--here comes the content-->

        <div class="content" style="position:relative;top:8vh">
            <div id="in-cont">
               <div class="item it1"><a href="info.php" target="open"><i class="fa fa-universal-access" style="font-size:3.5vh;margin:0 1vw"></i><span class="txt">Enter Basic Info</span></a></div>

               <div class="item it2"><a href="price.php" target="open"><i class="fa fa-rupee" style="font-size:3vh;"></i><span class="txt">Price The Oody</span></a></div>

               <div class="item it3"><a href="#"><i class="fa fa-users" style="font-size:3vh;"></i><span class="txt">Some Extra Info And U Ready To Go</span></a></div>



               <div class="item"><a href="#"><i style="font-size:3vh;"></i><span class="txt"></span></a></div>


            </div>
            <iframe name="open" src="info.php" id="info-frame"></iframe>
            <div class="side-bars">
                <div class="first-bar bar"><h3>Describe your Oodie</h3><div>It is supposed to do something that I'm not aware of yet.</div><div class="bar-img" style="text-align:center;"><img src="images/programmin.jpg" style="width:98%;margin:1vh 0 2vh 0;"></div></div>
                <div class="second-bar bar"><h3>Description for Oodie</h3><div>It is supposed to do something that I'm not aware of yet.</div><div class="bar-img" style="text-align:center;"><img src="images/programmin.jpg" style="width:98%;margin:1vh 0 2vh 0;"></div></div>
                <div class="third-bar bar"><h3>Tags specified</h3><div>It is supposed to do something that I'm not aware of yet.</div><div class="bar-img" style="text-align:center;"><img src="images/programmin.jpg" style="width:98%;margin:1vh 0 2vh 0;"></div></div>
                <div class="fourth-bar bar"><h3>Extra stuff</h3><div>It is supposed to do something that I'm not aware of yet.</div><div class="bar-img" style="text-align:center;"><img src="images/programmin.jpg" style="width:98%;margin:1vh 0 2vh 0;"></div></div>
            </div>
        </div>











                  <br><br><br>

   


        </div>
         <hr>

<!--         <footer style="font-style: italic;font-size: 16px;text-align: center;">
        &copy; Aman
    </footer> -->
<script type="text/javascript" src="js/oody.js"></script>

</body>
</html>