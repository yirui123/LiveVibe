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

<div class="container-fluid">
  <div class="row">
      <div class="col-md-8 col-xs-10">
      <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
              <div class="col-xs-12 col-sm-4 text-center">
                    <img src="http://api.randomuser.me/portraits/men/1.jpg" alt="" class="center-block img-circle img-responsive">
                    <ul class="list-inline ratings text-center" title="Ratings">
                      <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                      <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                      <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                      <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                      <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                    </ul>
                </div><!--/col--> 
                <div class="col-xs-12 col-sm-8">
                    <h2>Mike Anamendolla</h2>
                    <p><strong>About: </strong> Web Designer / UI </p>
                    <p><strong>Hobbies: </strong> Hanging out with friends, listen to music, reading and learning new things. </p>
                    <p><strong>Skills: </strong>
                        <span class="label label-info tags">html5</span> 
                        <span class="label label-info tags">css3</span>
                        <span class="label label-info tags">jquery</span>
                        <span class="label label-info tags">bootstrap3</span>
                    </p>
                </div><!--/col-->          
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4">
                    <h2><strong> 20,7K </strong></h2>                    
                    <p><small>Followers</small></p>
                    <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button>
                </div><!--/col-->
                <div class="col-xs-12 col-sm-4">
                    <h2><strong>245</strong></h2>                    
                    <p><small>Following</small></p>
                    <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>
                </div><!--/col-->
                <div class="col-xs-12 col-sm-4">
                    <h2><strong>43</strong></h2>                    
                    <p><small>Snippets</small></p>
                    <button type="button" class="btn btn-primary btn-block"><span class="fa fa-gear"></span> Options </button>  
                </div><!--/col-->
              </div><!--/row-->
              </div><!--/panel-body-->
          </div><!--/panel-->
    </div><!--/col--> 
  </div><!--/row--> 
</div><!--/container--> 
  
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  
</body>
</html>
