<!-- Project: LiveVibe
Author: Xun Gong, Wei Yu
Date: Dec 4th, 2014 -->

<!-- PHP and manipulate with livevibe database -->
<?php
require ("connectdb.php");

if (isset($_SESSION["username"])) {
    // Update lastaccesstime when page load
    $stmtLAT = $mysqli->prepare("CALL update_LAT(?,?,?)");
    $submit_username = $_SESSION["username"];
    $LAT = date("Y-m-d H:i:s");
    $login_type = $_SESSION["login_type"];
    $stmtLAT->bind_param('sss', $submit_username, $LAT, $login_type);
    $stmtLAT->execute();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Xun Gong + Wei Yu">
    <title>LiveVibe | CS6083 Database Project</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">  
    <link href="css/responsive.css" rel="stylesheet">
</head><!--/head-->

<body>
    <header id="header" role="banner">      
        <div class="main-nav">
            <div class="container">  
                <div class="row">                   
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                            <img class="img-responsive" src="images/logo.png" alt="logo">
                        </a>                    
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">                 
                            <li class="scroll active"><a href="index.php">Home</a></li>
                            <li class="scroll"><a href="#">Trend</a></li>
                            <li class="scroll"><a href="#">Genre</a></li>
                            <li class="scroll"><a href="#">About</a></li>
                            <li class="scroll"><a href="logout.php">Log out</a></li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>                    
    </header>
    <!--/#header--> 
  
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  
</body>
</html>
