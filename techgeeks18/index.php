<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Techgeeks</title>
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
					mysql_select_db("techgeeks18");

					$query=mysql_query("select * from event order by createdate desc limit 3");
					$count=mysql_num_rows($query);
					$out="";
					if($count<1){
						die("bye");
					}
					while ($row=mysql_fetch_array($query)) {
						$out.= '<div class="col-lg-4 course_box">
								<div class="card">
									<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" alt="https://unsplash.com/@cikstefan">
									<div class="card-body text-center">
										<div class="card-title"><a href="different-events.php">'.$row['ename'].'</a></div>
										<div class="card-text">'.substr($row['description'], 0, 300).'</div>
									</div>
									<a id="search_submit_button" class="btn search_submit_button trans_200" href="vieweve.php?id='.$row['eid'].'" value="Submit">Know more</a>
								</div>
							</div>';
					}
					echo "$out";
				?>
			</div>
		</div>		
	</div>

	<!-- Register -->

	<div class="register">

		<div class="container-fluid">
			
			<div class="row row-eq-height">
				<div class="col-lg-12 nopadding">
					
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Register now and get involved with us!</h1>
							<p class="register_text">The purpose of this website is to garner more participation in different schemes and events which are being organized by the government. This webiste contains information about different events organized by the government and will enable online registration for the events.</p>
							<div class="button button_1 register_button mx-auto trans_200"><a href="signup/getinvolved.php">register now</a></div>
						</div>
					</div>

				</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Services -->

	<div class="services page_section">
		
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Benefits</h1>
					</div>
				</div>
			</div>

			<div class="row services_row">

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/earth-globe.svg" alt="">
					</div>
					<h3>Online Registration</h3>
					<p>If a person wants to register, he can do it inline by filling up a form. He doesnt't have to call for registering in the event.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/exam.svg" alt="">
					</div>
					<h3>Events for all</h3>
					<p>All types of students can register for volunteering the events. He can work for any type of responsibility that is assigned by the event co ordinator.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/books.svg" alt="">
					</div>
					<h3>Amazing Peer Group</h3>
					<p>Registered student volunteers will have the benefit of working with highly motivated individuals and can learn variety of things from them.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/professor.svg" alt="">
					</div>
					<h3>Exceptional Resources</h3>
					<p>Additional benefits come in the form of very beneficial resources which would benefit them academically as well as nurture their co curricular activities.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/blackboard.svg" alt="">
					</div>
					<h3>Top Events</h3>
					<p>Events will be planned in according to social as well as academic activities. Volunteers will also be asked for their choice of events which they want to be conducted in the future.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/mortarboard.svg" alt="">
					</div>
					<h3>Build a strong Resume</h3>
					<p>Working in such an environment will enable the student volunteers to add such information in their resume which will depict responsibility roles and leadershio qualities among the student volunteers. </p>
				</div>

			</div>
		</div>
	</div>

	<!-- Testimonials -->

	<div class="testimonials page_section">
		<!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url(images/s2.jpg)"></div>
		</div>
		<div class="container">

			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>What our student volunteers say</h1>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					
					<div class="testimonials_slider_container">

						<!-- Testimonials Slider -->
						<div class="owl-carousel owl-theme testimonials_slider">
							
							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="quote">“</div>
									<p class="testimonials_text">Registering as a student volunteer helped me discover my inner leadership qualitites.Thanks to the people who have implemented this type of service for students like us!</p>
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/s1.jpg" alt="">
										</div>
										<div class="testimonial_name">Hiloni Mehta</div>
										<div class="testimonial_title">Under Graduate Student</div>
									</div>
								</div>
							</div>

							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="quote">“</div>
									<p class="testimonials_text">i highly recommend students to enroll on this service as it will enable them to discover their hidden talents and use them in a better way in their lives. </p>
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/s2.jpg" alt="">
										</div>
										<div class="testimonial_name">Poojan Sanghvi</div>
										<div class="testimonial_title">Under Graduate Student</div>
									</div>
								</div>
							</div>
							
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- Events -->

	<div class="events page_section">
		<div class="container">
			
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Upcoming Events</h1>
					</div>
				</div>
			</div>
			
			<div class="event_items">

				<!-- Event Item -->
					<?php

					mysql_connect("localhost","root","");
					mysql_select_db("techgeeks18");
					$future = strtotime("+10 day");
					$today= date("y-m-d");
					//where startdate<=$future and startdate>=$today
					$query=mysql_query("select * from event order by startdate desc limit 3");
					$count=mysql_num_rows($query);
					$out="";
					if($count<1){
						die("bye");
					}
					while ($row=mysql_fetch_array($query)) {
						$date = $row['startdate'];
						$day= date("d",strtotime($date));
					    $monthNum= date("m",strtotime($date));
					    $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
						$out.= '<div class="row event_item">
									<div class="col">
										<div class="row d-flex flex-row align-items-end">

											<div class="col-lg-2 order-lg-1 order-2">
												<div class="event_date d-flex flex-column align-items-center justify-content-center">
													<div class="event_day">'.$day.'</div>
													<div class="event_month">'.$monthName.'</div>
												</div>
											</div>

											<div class="col-lg-6 order-lg-2 order-3">
												<div class="event_content">
													<div class="event_name"><a class="trans_200" href="#">'.$row['ename'].'</a></div>
													<div class="event_location">'.$row['subdivision'].'</div>
													<p>'.$row['overview'].'</p>
												</div>
											</div>

											<div class="col-lg-4 order-lg-3 order-1">
												<div class="event_image">
													<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" alt="https://unsplash.com/@theunsteady5">
												</div>
											</div>

										</div>	
									</div>
								</div>';
					}
					echo "$out";
				?>
			</div>
				
		</div>
	</div>

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
								<li class="footer_list_item"><a href="different-events">Different-events</a></li>
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