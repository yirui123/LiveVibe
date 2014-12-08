<!-- Project: LiveVibe
Author: Xun Gong, Wei Yu
Date: Dec 4th, 2014 -->

<!-- PHP and manipulate with livevibe database -->
<?php
require ("connectdb.php");
// Update lastaccess time
if (isset($_SESSION["username"])) {
    // Update lastaccesstime when page load
    $stmtLAT = $mysqli->prepare("CALL update_LAT(?,?,?)");
    $submit_username = $_SESSION["username"];
    $LAT = date("Y-m-d H:i:s");
    $login_type = $_SESSION["login_type"];
    $stmtLAT->bind_param('sss', $submit_username, $LAT, $login_type);
    $stmtLAT->execute();
    // $stmtLAT->free_result();
    // $stmtLAT->close();
    $mysqli->next_result();
    // Grab user date to perform user information
    // Set local var
    $username = $_SESSION["username"];
    $city_up = NULL;
    $state_up = NULL;
    $follower_up = 0;
    $following_up = 0;
    $reviews = 0;
    
    // $stmtUinfo->bind_param('s', $username);
    // $stmtUinfo->execute();
    // $stmtUinfo->bind_result($username, $city, $state);


    // Fetch 1st result (username, city, state)
    // while ($stmtUinfo->fetch()) {
    //     // echo $username;
    //     $city_up = $city;
    //     $state_up = $state;
    // }
    // $mysqli->next_result();
    // // Fetch 2nd result 
    // $stmtUinfo->bind_result($follower);
    // while ($stmtUinfo->fetch()) {
    //     // echo $username;
    //     $follower_up = $follower;
    // }


    // Grab genre select options
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
    <link href="css/bootstrap-select.css" rel="stylesheet">
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
                            <li class="scroll"><a href="index.php">Home</a></li>
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
<section id="user_panel">
    <div class="container">
      <div class="row">
          <div class="col-md-10">
          <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                  <div class="col-xs-12 col-sm-4 text-center">
                        <img src="http://api.randomuser.me/portraits/men/47.jpg" alt="" class="center-block img-circle img-responsive">
                    </div><!--/col--> 
                    <div class="col-xs-12 col-sm-8">
                        <h2><?php echo $username; ?></h2>
                        <br>
                        <p><strong><?php echo $city_up.", ".$state_up?></strong></h3>
                        <p><strong>Taste: </strong>
                        <!-- use php loop to grab information -->
                            <span class="label label-info tags">Jazz</span> 
                            <span class="label label-info tags">Pop</span>
                            <span class="label label-info tags">Indie Rock</span>
                            <span class="label label-info tags">Rock</span>
                        </p>
                    </div><!--/col-->          
                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-4">
                        <h2><strong> <?php echo $follower_up;?></strong></h2>                    
                        <p><small>Followers</small></p>
                        <!-- <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span>  </button> -->
                    </div><!--/col-->
                    <div class="col-xs-12 col-sm-4">
                        <h2><strong><?php echo $following_up;?></strong></h2>                    
                        <p><small>Following</small></p>
                        <!-- <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button> -->
                    </div><!--/col-->
                    <div class="col-xs-12 col-sm-4">
                        <h2><strong><?php echo $reviews;?></strong></h2>                    
                        <p><small>Reviews</small></p>  
                    </div><!--/col-->

                    <!-- Add Select Music Genre -->
                    <div class="col-xs-12 col-md-4">
                    <form role="form" action="add_genre.php" method="POST">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <select  name="genre" class="selectpicker" data-style="btn-success" >
                                        <option>Indie Rock</option>
                                        <option>Alternative Rock</option>
                                        <option>Pop</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-info btn-block"><span class="fa fa-music"></span>Add Genre You Like</button>
                            </form>
                    </div>

                  </div><!--/row-->
                  </div><!--/panel-body-->
              </div><!--/panel-->
        </div><!--/col--> 
      </div><!--/row--> 
    </div><!--/container--> 
</section>

        <style>
        body {
            background-image: url("./images/bg/register_bg.png");
            background-color: #A30000;
        }

        #user_panel {
            padding-top: 100px;
            color: #03695E;
            padding-left: 140px;
        }

        .navbar-brand {
          background-color: #A30000;
          height: 80px;
          margin-bottom: 20px;
          position: relative;
          width: 640px;
          opacity: .95
        }
        .panel  {
            opacity: 0.9;
        }

        </style> 

    </section>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.js"></script>
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  
</body>
</html>
