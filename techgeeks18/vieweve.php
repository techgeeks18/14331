<?php
	 session_start();
	 $eid="";
	 $eid=$_GET["id"];
	 mysql_connect("localhost","root","");
		mysql_select_db("techgeeks18");
		$query=mysql_query("SELECT * from event where eid='$eid' ");
		// $count=mysql_num_rows($query);
		$row=mysql_fetch_array($query);
		 // echo $row["eid"];
		 // echo $row["ename"];
		 // echo $row["description"];
		 // echo $row["district"];
		 // echo $row["eid"];
		// echo $_SESSION["username"];
		if (isset($_POST["insert"])) {
			# code...
			if (isset($_SESSION['username'])&&$_SESSION['pass']) {
				$q=mysql_query("SELECT vid from volunteer where mobilenumber='$_SESSION[username]'") or die(mysql_error());
				$row1=mysql_fetch_array($q);
				echo $row1["vid"];
				$query1=mysql_query("INSERT into register values('".$row1['vid']."','$eid')") or die(mysql_error());

			}
			else{
				header("location:login.php");
			}
		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo "".$row['ename'].""; ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">

</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="images/logo.png" alt="">
					<span>Techgeeks</span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="index.php">home</a></li>
						<li class="main_nav_item"><a href="Aboutus.php">about us</a></li>
						<li class="main_nav_item"><a href="#">different events</a></li>
						<?php
						if(isset($_SESSION["username"]) && isset($_SESSION["pass"])){

								echo'<li class="main_nav_item"><a href="logout.php"> Logout</a></li>';	
						}
						else
						{
							
							echo'<li class="main_nav_item"><a href="login.php">Login/Sign Upv</a></li>';
						}
						?>
						<li class="main_nav_item"><a href="contact.php">contact</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<img src="images/phone-call.svg" alt="">
			<span>+919757038405</span>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>
	
	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="index.php">Home</a></li>
					<li class="menu_item menu_mm"><a href="Aboutus.php">About us</a></li>
					<li class="menu_item menu_mm"><a href="#">Different Events</a></li>
					<?php
						if(isset($_SESSION["username"]) && isset($_SESSION["pass"])){

								echo'<li class="main_nav_item"><a href="logout.php"> Logout</a></li>';	
						}
						else
						{
							
							echo'<li class="main_nav_item"><a href="login.php">Login/Sign Upv</a></li>';
						}
					?>
					<li class="menu_item menu_mm"><a href="contact.php">Contact</a></li>
				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Techgeeks All rights reserved</div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<!-- <div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/contact_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>Event name</h1>
		</div>
	</div> -->
	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(<?php echo "data:image/jpeg;base64,".base64_encode($row['image'] ).""?>)"></div>
			</div>
			<div class="home_content">
				<h1><?php echo "".$row['ename'].""; ?></h1>
			</div>
	</div>
	<div class="container">
			<br>
			<h1>Overview</h1>
		    <p style="font-size: 20px" style="color: #000000;"><?php echo "".$row['overview'].""; ?><hr>
	    <div>
		    <h1>Description</h1>
		    <p style="font-size: 20px" style="color: #000000;"><?php echo "".$row['description'].""; ?><hr>
	    </div>
	    <div>
	    	<h1>Location</h1>
	    	<div class="row">
	    		<div class="Column">
	    			<p style="font-size: 20px" style="color: #000000;">District:&nbsp</p>
	    		</div>
		    	<div class="Column">
		    			<p style="font-size: 20px" style="color: #000000;"><?php echo "".$row['district'].""; ?>&nbsp&nbsp&nbsp</p>
		    	</div>
		    	<div class="Column">
	    			<p style="font-size: 20px" style="color: #000000;">Subdivision:&nbsp</p>
	    		</div>
		    	<div class="Column">
		    			<p style="font-size: 20px" style="color: #000000;"><?php echo "".$row['subdivision'].""; ?>&nbsp&nbsp&nbsp</p>
		    	</div>
		    	<div class="Column">
	    			<p style="font-size: 20px" style="color: #000000;">Block:&nbsp</p>
	    		</div>
		    	<div class="Column">
		    			<p style="font-size: 20px" style="color: #000000;"><?php echo "".$row['block'].""; ?>&nbsp&nbsp&nbsp</p>
		    	</div>
	    	</div>
	    	<div class="row">
	    		<div class="Column">
	    			<p style="font-size: 20px" style="color: #000000;">Address:&nbsp</p>
	    		</div>
		    	<div class="Column">
		    			<p style="font-size: 20px" style="color: #000000;"><?php echo "".$row['address'].""; ?>&nbsp&nbsp&nbsp</p>
		    	</div>
	    	</div>
	    </div>  
	</div>
	<form method="post" action="vieweve.php?id=<?php echo $eid; ?>">
	<input type="submit" name="insert" class="btn btn-warning" style="width: 100%">
	<!-- <button name="insert" type="button" class="contact_send_btn trans_200" value="Submit">Register</button> -->
	</form>
	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-3 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<img src="images/logo.png" alt="">
								<span>Motto</span>
							</div>
						</div>

						<p class="footer_about_text">The main aim of this website is to increase student registration as volunteers. This will in turn result in higher participation among all forms of age groups of students.</p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="index.php">Home</a></li>
								<li class="footer_list_item"><a href="Aboutus.php">About Us</a></li>
								<li class="footer_list_item"><a href="#">Courses</a></li>
								<?php
								if(isset($_SESSION["username"]) && isset($_SESSION["pass"])){

										echo'<li class="main_nav_item"><a href="logout.php"> Logout</a></li>';	
								}
								else
								{
									
									echo'<li class="main_nav_item"><a href="login.php">Login/Sign Upv</a></li>';
								}
								?>
								<li class="footer_list_item"><a href="contact.php">Contact</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Usefull Links -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Usefull Links</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Testimonials</a></li>
								<li class="footer_list_item"><a href="#">FAQ</a></li>
								<li class="footer_list_item"><a href="#">Media</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Contact -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contact</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									Annexe 1, Top Floor, Kazi Road, Gangtok , Sikkim-737101
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									 03592 - 202601 / 207426
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>abc@example.com
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>

		</div>
	</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

</body>
</html>