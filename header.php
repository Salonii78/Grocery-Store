<?php
	 session_start();
    include "connection.php";
    if(isset($_SESSION['uemail'])){
        $email = $_SESSION['uemail'];
        $q1 = "SELECT * FROM login_tbl WHERE email_id='$email'";
        $res1 = mysqli_query($con, $q1);
        $row1 = mysqli_fetch_array($res1);
        $lid = $row1['l_id'];
        $_SESSION['ulid'] = $lid;
        $ulid = $_SESSION['ulid'];
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>User | Dashboard</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="mystyle.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- js -->
   <script src="js/jquery-1.11.1.min.js"></script>
   <!-- <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script> -->
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!---//End-rate---->

</head>
<body>
<div class="header">
		<div class="container">
			<div class="logo">
				<h1><a href="index.php"><b>T<br>H<br>E</b>&nbsp;&nbsp;Appliance Gallery<span>The Best Electronic & Furniture Store</span></a></h1>
			</div>
			<div class="head-t">
				<ul class="card">
					<?php
						if(isset($_SESSION['uemail'])){
					?>
					<li><a href="editprofile.php" ><i class="fa fa-user" aria-hidden="true"></i>Edit Profile
					</a></li>
					<li><a href="changepass.php" ><i class="fa fa-lock" aria-hidden="true"></i>Change Password</a></li>
					<li><a href="logout.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Logout</a>
					</li>
					<?php
						}else{
					?>
					<li><a href="login.php" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
					<li><a href="register.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
					<?php
						}
					?>
				</ul>	
			</div>
				<div class="nav-top" style="width:100%;display:flex;justify-content:center;">
					<nav class="navbar navbar-default">
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li class=""><a href="index.php" class="hyper"><span>Home</span></a></li>	
							<li><a href="about.php" class="hyper"><span>About</span></a></li>
							<li class=""><a href="categories.php" class="hyper "><span>Categories</span></a></li>
							<?php
								if(isset($_SESSION['uemail'])){
									echo '<li class=""><a href="cart.php" class="hyper"><span>My Cart</span></a></li>
											<li><a href="orderhistory.php" class="hyper"><span>Order History</span></a></li>';
								}
							?>
							<li><a href="feedback.php" class="hyper"><span>Feedback</span></a></li>
							<li><a href="contact.php" class="hyper"><span>Contact Us</span></a></li>
						</ul>
					</div>
					</nav>
					 <div class="cart">
					</div>
					<div class="clearfix"></div>
				</div>
			</div>			
		</div>