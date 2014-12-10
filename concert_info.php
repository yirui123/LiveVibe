<!-- Project: LiveVibe
Author: Xun Gong, Wei Yu
Date: Dec 4th, 2014 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Xun Gong + Wei Yu">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>{artistname} - {venue}, {city} - {datetime} | LiveVibe | CS6083 Database Project</title>
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/bootstrap-select.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "ae300292-352b-4a9a-bea6-74eb80539627", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>


</head>

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
	<div id="page">
		<div class="panel panel-default concert-panel">
			<div class="concert-brief onehundred-container">
				<div class="artist-pic left">
					<img src="{Artist Icon}">
					<div class="component concert-social">
						<span class='st_sharethis_large' displayText='ShareThis'>Share:</span>
						<span class='st_facebook_large' displayText='Facebook'></span>
						<span class='st_twitter_large' displayText='Tweet'></span>
						<span class='st_linkedin_large' displayText='LinkedIn'></span>
						<span class='st_pinterest_large' displayText='Pinterest'></span>
						<span class='st_email_large' displayText='Email'></span>

					</div>
				</div>
				<div class="event-info right">
					<div class="date-and-name">
						<h5>{Date and Time}</h5>
						<h1>{Artist Name}</h1>
					</div>
					<div class="location">
						<h5>Venue</h5>
						<p>
							<span class="name"><a href="{Venue page}">{Venue Name}</a></span>
							<span class="addr">
								<span class="street">{Street}</span>
								<span class="city">{City}</span>
								<span class="state">{State}</span>
								<span class="zipcode">{Zipcode}</span>
							</span>
						</p>
					</div>
					<div class="component attend-actions">
						<ul>
							<li>
								<form>
									<button type="submit" class="pure-button">
										<span class="button-text">I'm interested</span>
									</button>
								</form>
							</li>
							<li>
								<form>
									<button type="submit" class="pure-button">
										<span class="button-text">I'm going</span>
									</button>
								</form>
							</li>
							<li>
								<form>

									<button type="submit" class="pure-button">
										<span class="button-text">I was there</span>
									</button>
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="clearfix">

				<div id="tickets" class="component tickets">

					<h2>Buy tickets</h2>
					<div class="ticket-wrapper">
						<a href="{Ticket Page}">
							<div class="ticket-cell">
								<span class="vendor">{Ticket Vendor Name}</span>
							</div>
							<div class="ticket-cell">
								<span class="price">
									US&nbsp;${price} – US&nbsp;${price}
								</span>
							</div>
							<div class="ticket-cell buy-button-container">
								<span class="buy-tickets new-tab"><span class="button buy-tickets">Buy&nbsp;tickets</span></span>
							</div>
						</a>
					</div>
				</div>

				<div class="component artist-bio">
					<h2>Biographies</h2>

					<a href="{Artist Page}"><strong>{Artist Name}</strong></a>
					<div class="artist-biography closed">
						<div class="standfirst">
							<p>
								Goat the big cheese cheesecake. Cheesecake st. agur blue cheese paneer danish fontina croque monsieur macaroni cheese dolcelatte hard cheese. Pecorino everyone loves who moved my cheese queso cut the cheese dolcelatte manchego everyone loves. Parmesan.

								Bocconcini monterey jack macaroni cheese. Port-salut cheesy grin macaroni cheese paneer mozzarella stilton cheese on toast camembert de normandie. Manchego babybel cheesy feet melted cheese bavarian bergkase cheesy grin jarlsberg squirty cheese. Say cheese brie monterey jack feta camembert de normandie.
							</p>
							<span class="read-more-link-container"><a href="{Artist Page}">Read more</a></span>
						</div>
					</div>
				</div>

				<div class="clearfix">
					<div class="component col-block concert-reviews left">
						<h2>Live reviews</h2>
						<ul>
							<!-- PHP recursion -->
							<li class="review-container">
								<div class="review-content" id="review-31923">
									<p>
										Goat the big cheese cheesecake. Cheesecake st. agur blue cheese paneer 	danish fontina croque monsieur macaroni cheese dolcelatte hard cheese. 	Pecorino everyone loves who moved my cheese queso cut the cheese dolcelatte manchego everyone loves. Parmesan.
										<span class="read-more-link-container"><a href="{Artist Page}">Read more</a></span>
									</p>
								</div>
								<div class="reviewer">
									<a href="{Reviewer Page}">
										<img class="reviewer-profile-image" src="{Reviewer Icon}" alt="{Reviewer's Name}’s profile image">
										<span>by <strong><span>{Reviewer's Name}</span></strong></span>
									</a>
								</div>
							</li>
							<!-- PHP recursion end -->
						</ul>
					</div>

					<div class="component col-block concert-media left">
						<h2>Related media</h2>
						{Media Content}
					</div>

					<div class="component col-block concert-comments right">
						<h2>Lovers' comments</h2>
						{Comments Content}
					</div>
				</div>

			</div>
		</div>
	</body>

	<style>
		body {
			background-image: url("./images/bg/register_bg.png");
			background-color: #A30000;
		}

		#page {
			padding-top: 100px;
			padding-bottom: 100px;
			width: 943px;
			margin: auto;
			color: #03695E;
			opacity: 0.9;
		}

		.concert-panel {
			padding: 15px;
		}



	</style>
	</html>
