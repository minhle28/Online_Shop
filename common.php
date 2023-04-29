<?php
	include("signup.php");
?>

<?php function head_tag()
{ ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<title> OnlineShop</title>
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
		<link href="./css/common.css" type="text/css" rel="stylesheet">
		<link href="./css/home.css" type="text/css" rel="stylesheet">
		<link href="./css/itemDescription.css" type="text/css" rel="stylesheet">
		<link href="./css/about.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="./js/home.js"></script>
		<script type="text/javascript" src="./js/common.js"></script>
		<script type="text/javascript" src="./js/accountServer.js"></script>
	</head>
<?php } ?>

<?php function header_bar()
{ ?>
	<div id="header">
		<header>
			<div class="header-top">
				<div class="logo">
					<h1><a href="home.php">OnlineShop</a></h1>
				</div>
				<div class="search-bar">
					<input type="text" placeholder="Search..." id="search-input">
					<button type="submit" id="search-button">Search</button>
				</div>
				<div class="user-options">
					<button id="loginBtn">Sign In / Register</button>
					<div>
						<a href="#"><i id="favorites" class="fas fa-heart"></i></a>
					</div>
					<div>
						<a href="#"><i id="cart-link" class="fas fa-shopping-bag"></i></a>
					</div>
				</div>
			</div>
			<div class="header-bottom">
				<ul class="nav-list">
					<li><a href="all.php">All</a></li>
					<li><a href="#" data-category="lady">Lady</a></li>
					<li><a href="#" data-category="men">Men</a></li>
					<li><a href="#" data-category="kid">Kid</a></li>
				</ul>
			</div>
		</header>
	</div>

	<!-- css for this form is in -->
	<div id="loginModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<div class="title-text">
				<div class="title login">
					Sign In
				</div>
				<div class="title signup">
					Register
				</div>
			</div>
			<div class="form-container">
				<div class="slide-controls">
					<input type="radio" name="slide" id="login" checked>
					<input type="radio" name="slide" id="signup">
					<label for="login" class="slide login">Sign In</label>
					<label for="signup" class="slide signup">Register</label>
					<div class="slider-tab"></div>
				</div>
				<div class="form-inner">
					<form action="#" class="login">
						<div class="field">
							<input type="text" id='Username' placeholder="Email Address" required>
						</div>
						<div class="field">
							<input type="password" id='Password' placeholder="Password" required>
						</div>
						<div class="pass-link">
							<a href="#">Forgot password?</a>
						</div>
						<span class='error-msg' id='error-msg-1'></span>
						<div class="field btn">
							<div class="btn-layer"></div>
							<input name='Submit' type='submit' value='Login' class='btn-input' id='login_btn' />;
						</div>
						<div class="signup-link">
							Don't have an account? <a href="">Register now</a>
						</div>
					</form>
					<?php signup(); ?>
				</div>
			</div>
		</div>
	</div>

<?php } ?>

<?php function footer_bar()
{ ?>
	<footer>
		<div class="footer-top">
			<div class="footer-logo">
				<h2>OnlineShop</h2>
			</div>
			<div class="footer-social">
				<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>
			</div>
		</div>
		<div class="footer-middle">
			<div class="footer-company">
				<h3>COMPANY</h3>
				<ul>
					<li><a href="about.php">About Us</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Returns</a></li>
					<li><a href="#">FAQs</a></li>
					<li><a href="#">Order Lookup</a></li>
				</ul>
			</div>
			<div class="footer-links">
				<h3>OTHER LINKS</h3>
				<ul>
					<li><a href="#">Gift Card</a></li>
					<li><a href="#">Affilliate Program</a></li>
					<li><a href="#">Reviews</a></li>
					<li><a href="#">Copyright & Trademark Notice</a></li>
				</ul>
			</div>
			<div class="footer-newsletter">
				<h3>Subscribe to our newsletter</h3>
				<br>
				<form>
					<input type="email" placeholder="Enter your email address">
					<button type="submit">Subscribe</button>
				</form>
			</div>
		</div>
		<br><br>
		<div class="footer-bottom">
			<p>&copy; 2023 Online Shop. All rights reserved.</p>
		</div>
	</footer>
<?php } ?>