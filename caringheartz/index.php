<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Caregiver TASK MANAGEMENT SYSTEM||Home Page</title>
	<!--/tags -->
	
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
	    rel='stylesheet' type='text/css'>
</head>

<body>
	<!-- header -->
	<?php include_once('includes/header.php');?>
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Simplify <span>Caregiving Tasks.</span></h3>
						<p>Enhance Elderly Care with Ease.</p>
						<div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg" href="single.html">Read More »</a>
						</div>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Simplify <span>Caregiving Tasks.</span></h3>
						<p>Enhance Elderly Care with Ease.</p>
						<div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg" href="single.html">Read More »</a>
						</div>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Simplify<span>Caregiving Tasks.</span></h3>
						<p>Enhance Elderly Care with Ease.</p>
						<div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg" href="single.html">Read More »</a>
						</div>
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">

						<h3>Simplify<span>Caregiving Tasks.</span></h3>
						<p>Enhance Elderly Care with Ease.</p>
						<div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg scroll" href="#welcome" role="button">Read More »</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
	</div>
	<!--//banner -->

	<!--/search_form -->
	
	<!--//search_form -->
	<div class="banner-bottom">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle">About Us</h3>
			</div>
			<div class="inner_sec_grids_info_w3ls">
				
				<div class="col-md-6 banner_bottom_left">
					<p>Welcome to Caring Heartz, a task management system designed to simplify caregiver tasks. Our goal is to enhance the caregiving experience by providing an easy-to-use platform that helps caregivers manage tasks efficiently.</p>
    				<p>With our app, caregivers can focus on providing excellent care to their loved ones while we handle task coordination and communication. Backed by years of healthcare experience, we are dedicated to excellence, compassion, and integrity.</p>
    				<p>Join us in transforming the caregiving landscape and making a difference in the lives of both caregivers and the elderly individuals they care for.</p>
				
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 banner_bottom_right">
					<div class="agileits_w3layouts_banner_bottom_grid">
						<img src="images/ab.png" alt=" " class="img-responsive" />
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
	</div>
	<!-- //banner-bottom -->
	<div class="team_work_agile">
		<h4>Supporting caregivers with Caring Heartz, the go-to tool for managing tasks and providing heartfelt elderly care.</h4>
	</div>

	<?php include_once('includes/footer.php');?>

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>