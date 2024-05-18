<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Caregiver TASK MANAGEMENT SYSTEM|Home Page</title>
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
	<div class="inner_page_agile">
		<h3>About Us</h3>
		<p>Caregiver Task Management System</p>
	</div>
	<!--//banner -->
	<!--/w3_short-->
	<div class="services-breadcrumb_w3layouts">
		<div class="inner_breadcrumb">

			<ul class="short_w3ls"_w3ls>
				<li><a href="index.php">Home</a><span>|</span></li>
				<li>About Us</li>
			</ul>
		</div>
	</div>
	<div class="banner-bottom">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle">About Us</h3>
			</div>
				<div class="col-md-6 banner_bottom_left">
    				<p>Welcome to Caring Heartz, a task management system designed to simplify caregiver tasks. Our goal is to enhance the caregiving experience by providing an easy-to-use platform that helps caregivers manage tasks efficiently.</p>
    				<p>With our app, caregivers can focus on providing excellent care to their loved ones while we handle task coordination and communication. Backed by years of healthcare experience, we are dedicated to excellence, compassion, and integrity.</p>
    				<p>Join us in transforming the caregiving landscape and making a difference in the lives of both caregivers and the elderly individuals they care for.</p>
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
	<?php include_once('includes/footer.php');?>

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>