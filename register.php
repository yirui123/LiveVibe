<!-- Project: LiveVibe
Author: Xun Gong, Wei Yu
Date: Dec 4th, 2014 -->

<!-- PHP and manipulate with livevibe database -->
<?php
// Session start in connectdb.php file
require ("connectdb.php");
// echo "This is Register page.";

// if (isset($_SESSION["username"]){

// }
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
                            <li class="scroll"><a href="index.php">Home</a></li>
                            <li class="scroll"><a href="#">Trend</a></li>
                            <li class="scroll"><a href="#">Genre</a></li>
                            <li class="scroll"><a href="#">About</a></li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>                    
    </header>
    <!--/#header--> 

    <section id="usrprof"> 
     <div class="container" id="container1">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title text-center">Welcome to LiveVibe</h2>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="register_backend.php" method="POST">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" class="form-control input-md" placeholder="Nickname">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-md" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="realname" id="realname" class="form-control input-md" placeholder="Realname">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="birth" id="birth" class="form-control input-md" placeholder="Birthday">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="city" id="city" class="form-control input-md" placeholder="City">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="state" id="state" class="form-control input-md" placeholder="State">
                                </div>

                                <div class="form-group">
                                    <input type="zipcode" name="zipcode" id="zipcode" class="form-control input-md" placeholder="Zipcode">
                                </div>

                                 <div class="form-group">
                                    <input type="bio" name="bio" id="bio" class="form-control input-md" placeholder="Bio (Artist)">
                                </div>
                                <!-- Checkbox -->
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="checkbox_info">
                                                <input type="radio" name="type" value="user"  class="form-control input-sm"> User
                                            </label>
                                            
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="checkbox_info">
                                                <input type="radio" name="type" value="artist" class="form-control input-sm"> Artist
                                            </label> 
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" value="Submit" class="btn btn-info btn-block">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
        #container1 {
            
        }

        .centered-form {
            margin-top: 150px;
            margin-bottom: 120px;
        }

        .centered-form .panel {
            background: rgba(255, 255, 255, 0.8);
            box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
        }

        .checkbox_info {
            color: #A30000;
            font-size: 13px;
        }
        </style>      
    </section>
    <!--/#usrprof-->


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  
</body>
</html>
