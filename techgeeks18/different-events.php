<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Different events</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
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
						<li class="main_nav_item"><a href="different-events.php">different events</a></li>
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
					<li class="menu_item menu_mm"><a href="different-events.php">Different Events</a></li>
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

	<div class="home">

		<!-- Hero Slider -->
		<!-- PHP for dynamic image slider -->
		<?php

		mysql_connect("localhost","root","");
		mysql_select_db("techgeeks18");
		$query=mysql_query("select * from event limit 3");
		$count=mysql_num_rows($query);
		$out="";
		if($count<1){
			die("bye");
		}
		$out.= '<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">';
		while ($row=mysql_fetch_array($query)) {
			$out.= '<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(data:image/jpeg;base64,'.base64_encode($row['image'] ).')"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>'.$row['ename'].'</span></h1>
						</div>
					</div>
				</div>';
		}
		$out.= '</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
		</div>'; 

		echo "$out";
		?>

	</div>

	
	<!-- Popular -->

	<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Featured Events</h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes">
				
				<!-- Popular Course Item -->
				<?php

					mysql_connect("localhost","root","");
					mysql_select_db("techgeeks");

					$query=mysql_query("select * from event order by createdate desc");
					$count=mysql_num_rows($query);
					$out="";
					if($count<1){
						die("bye");
					}
					for ($i=1, $j=1; $i <= $count; $i++,$j++) {
						while ($row=mysql_fetch_array($query)) {
							$out.= '<div class="col-lg-4 course_box">
									<div class="card">
										<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" alt="https://unsplash.com/@cikstefan">
										<div class="card-body text-center">
											<div class="card-title"><a href="different-events.php">'.$row['ename'].'</a></div>
											<div class="card-text">'.$row['overview'].'</div>
										</div>
										<a class="btn search_submit_button trans_200" href="vieweve.php?id='.$row['eid'].'" value="Submit">Know more</a>
									</div>
								</div>';
							if($j % 3 == 0){
								$out.= '<br>';
							}
						}
					}
					echo nl2br("$out");
				?>
			</div>
		</div>		
	</div>

	<!-- Register -->

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
								<li class="footer_list_item"><a href="different-events.php">Different Events</a></li>
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