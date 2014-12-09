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
    $mysqli->next_result();

    // Grab user date to perform user information
    // Set local var
    $username_up = $_SESSION["username"];
    $city_up = NULL;
    $state_up = NULL;
    $follower_up = 0;
    $following_up = 0;
    $reviews = 0;
    // Execute query
    $stmtUinfo = $mysqli->prepare("CALL up_info(?)");
    $stmtUinfo->bind_param('s', $username_up);
    $stmtUinfo->execute();
    $stmtUinfo->bind_result($username, $city, $state, $flwer_num, $flw_num, $review_num);

    while ($stmtUinfo->fetch()) {
        $city_up = $city;
        $state_up = $state;
        $follower_up = $flwer_num;
        $following_up = $flw_num;
        $reviews = $review_num;        
    }

    $mysqli->next_result();

    // Grab genre select options
    $genre_opt = array();
    $stmtGenre = $mysqli->prepare("CALL list_genre()");
    $stmtGenre->execute();
    $stmtGenre->bind_result($sub);
    while ($stmtGenre->fetch()) {
        $genre_opt[] = $sub;       
    }

    $mysqli->next_result();

    // Grab Taste of User or Genre of Artist
    $tastes = array();
    $stmtT = $mysqli->prepare("CALL list_taste(?)");
    $stmtT->bind_param('s', $username_up);
    $stmtT->execute();
    $stmtT->bind_result($sub);
    while ($stmtT->fetch()) {
        $tastes[] = $sub;       
    }

    $mysqli->next_result();

    // Calculate Reputation to Display (Star User with a star)
    $_SESSION["is_star_usr"] = false;
    $repu = 0.4 * $follower_up + 0.5 * $reviews + 0.1 * $following_up;
    if ($repu > 2) {
        $_SESSION["is_star_usr"] = true;
    }

    // Grab Concert You Plan to go (In attendance AND before concert time)
    $plan_to = array();
    $stmtPlan = $mysqli->prepare("CALL usr_plan_to(?)");
    $stmtPlan->bind_param('s', $username_up);
    $stmtPlan->execute();
    $stmtPlan->bind_result($username, $cid, $artistname, $start_time, $vname, $street, $city, $state, $zipcode);
    while ($stmtPlan->fetch()) {
        $one_concert = array("username"   => $username,
                             "cid"        => $cid,
                             "artistname" => $artistname,
                             "start_time" => $start_time,
                             "vname"      => $vname,
                             "street"     => $street,
                             "city"       => $city,
                             "state"      => $state,
                             "zipcode"    => $zipcode);
        $plan_to[] = $one_concert;
    }

    $mysqli->next_result();   

    // Grab Concert Recommended by LiveVibe Star User

    // Grab Concert Recommended by LiveVibe System based on Taste


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

      <div class="row">
          <div class="col-md-10">
          <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                  <div class="col-xs-12 col-sm-4 text-center">
                        <img src="http://api.randomuser.me/portraits/men/47.jpg" alt="" class="center-block img-circle img-responsive">
                    </div><!--/col--> 
                    <div class="col-xs-12 col-sm-8">
                        <h2><?php echo $username_up; ?>
                        <?php 
                            if($_SESSION["is_star_usr"]) {echo "<span class=\"fa fa-star\"></span>";}
                        ?>
                        </h2>

                        <p><h3><strong><?php echo $city_up.", ".$state_up?></strong></h3></p>
                        <p><strong>Taste: </strong>
                        <br>
                        <!-- use php loop to grab information -->
                            <?php
                                foreach ($tastes as $tag) {
                                    echo "<span class=\"label label-info tags\">".$tag."</span>";
                                    echo "<br>";
                                }
                            ?>
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
                                        <?php 
                                            foreach ($genre_opt as $sub) {
                                                 echo "<option>".$sub."</option>";
                                             } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-info btn-block"><span class="fa fa-music"></span>  Add Genre You Like</button>
                            </form>
                    </div>

                  </div><!--/row-->
                  </div><!--/panel-body-->
              </div><!--/panel-->
        </div><!--/col--> 
      </div><!--/row--> 
    <!--Profile  -->

    <!-- Display Plan to Go -->
      <div class="row">
          <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-body">
                  <div class="concert-brief">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center"><h2><strong>Concert You Plan To Go</strong></h2></div>
                            <table class="table">
                            <!-- php loop to show all plan to concert -->
                               <?php
                                    foreach ($plan_to as $con) {
                                        echo "<th>";
                                        echo "<div class=\"container-fluid\"><div class=\"row\"><div class=\"col-md-10\">";
                                        echo "<div class=\"date-and-name\">";
                                        echo "<h4><span class=\"fa fa-calendar fa-lg\"></span>   ".$con["start_time"]."</h4>";
                                        echo "<h2><a href=artist_public.php?link=\"".$con["artistname"]."\">".$con["artistname"]."</a></h2>";
                                        echo "</div>";
                                        echo "<div class=\"location\"><h4>".$con["vname"]."</h4><p>";
                                        echo "<span class=\"addr\">";
                                        echo "<span class=\"street\">  ".$con["street"]."</span>  ,";
                                        echo "<span class=\"city\">  ".$con["city"]."</span>  ,";
                                        echo "<span class=\"state\">  ".$con["state"]."</span>  ,";
                                        echo "<span class=\"zipcode\">  ".$con["zipcode"]."</span>";
                                        echo "<a href=concert_info.php?link=\"".$con["cid"]."\"><h4>Concert Details</h4></a>";
                                        echo "</span></p></div></div></div></div></th>";
                                    }
                                ?>
                            </table><!-- table -->
                    </div><!-- concert-brief -->
                </div><!--/panel-body-->
            </div><!--/panel-->
          </div><!--/col--> 
      </div><!--/row--> 
    <!--Plan to go  -->


    <!-- Display You Followed Recommend List -->
      <div class="row">
          <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-body">
                  <div class="concert-brief">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center"><h2><strong>Concert You Plan To Go</strong></h2></div>
                            <table class="table">
                            <!-- php loop to show all plan to concert -->
                               <?php
                                    foreach ($plan_to as $con) {
                                        echo "<th>";
                                        echo "<div class=\"container-fluid\"><div class=\"row\"><div class=\"col-md-10\">";
                                        echo "<div class=\"date-and-name\">";
                                        echo "<h4><span class=\"fa fa-calendar fa-lg\"></span>   ".$con["start_time"]."</h4>";
                                        echo "<h2><a href=artist_public.php?link=\"".$con["artistname"]."\">".$con["artistname"]."</a></h2>";
                                        echo "</div>";
                                        echo "<div class=\"location\"><h4>".$con["vname"]."</h4><p>";
                                        echo "<span class=\"addr\">";
                                        echo "<span class=\"street\">  ".$con["street"]."</span>  ,";
                                        echo "<span class=\"city\">  ".$con["city"]."</span>  ,";
                                        echo "<span class=\"state\">  ".$con["state"]."</span>  ,";
                                        echo "<span class=\"zipcode\">  ".$con["zipcode"]."</span>";
                                        echo "<a href=concert_info.php?link=\"".$con["cid"]."\"><h4>Concert Details</h4></a>";
                                        echo "</span></p></div></div></div></div></th>";
                                    }
                                ?>
                            </table><!-- table -->
                    </div><!-- concert-brief -->
                </div><!--/panel-body-->
            </div><!--/panel-->
          </div><!--/col--> 
      </div><!--/row--> 
    <!--Followed Recommend List  -->

    <!-- Display System Guess -->
      <div class="row">
          <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-body">
                  <div class="concert-brief">
                    <div class="panel panel-success">
                        <div class="panel-heading text-center"><h2><strong>Concert You Plan To Go</strong></h2></div>
                            <table class="table">
                            <!-- php loop to show all plan to concert -->
                               <?php
                                    foreach ($plan_to as $con) {
                                        echo "<th>";
                                        echo "<div class=\"container-fluid\"><div class=\"row\"><div class=\"col-md-10\">";
                                        echo "<div class=\"date-and-name\">";
                                        echo "<h4><span class=\"fa fa-calendar fa-lg\"></span>   ".$con["start_time"]."</h4>";
                                        echo "<h2><a href=artist_public.php?link=\"".$con["artistname"]."\">".$con["artistname"]."</a></h2>";
                                        echo "</div>";
                                        echo "<div class=\"location\"><h4>".$con["vname"]."</h4><p>";
                                        echo "<span class=\"addr\">";
                                        echo "<span class=\"street\">  ".$con["street"]."</span>  ,";
                                        echo "<span class=\"city\">  ".$con["city"]."</span>  ,";
                                        echo "<span class=\"state\">  ".$con["state"]."</span>  ,";
                                        echo "<span class=\"zipcode\">  ".$con["zipcode"]."</span>";
                                        echo "<a href=concert_info.php?link=\"".$con["cid"]."\"><h4>Concert Details</h4></a>";
                                        echo "</span></p></div></div></div></div></th>";
                                    }
                                ?>
                            </table><!-- table -->
                    </div><!-- concert-brief -->
                </div><!--/panel-body-->
            </div><!--/panel-->
          </div><!--/col--> 
      </div><!--/row--> 
    <!--System Guess -->

</section>

</section>
        <style>
            body {
                background-image: url("./images/bg/register_bg.png");
                background-color: #A30000;
                background-repeat:no-repeat;
                background-size:cover;
                background-position: top center !important;
                background-repeat: no-repeat !important;
                background-attachment: fixed;
                margin: 0;
                padding: 0;
                height: 100%;
                width: 100%;
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

            .fa-star {
                color: #FFD700;
            }

            .fa-calendar {
                color: #A30000;
            }

            #user_panel .row {
                margin-right: auto;
                margin-left: auto;
            }

            .navbar-collapse {
                padding-left: 0px;
                padding-right: 0px;
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
