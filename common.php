<?php function head_tag() { ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<title> OnlineShop</title>
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link href="./css/common.css" type="text/css" rel="stylesheet">
		<link href="./css/home.css" type="text/css" rel="stylesheet">
	</head>
<?php } ?>

<?php function header_bar() { ?>
	<div id="header">
		<header>
			<div class="header-top">
				<div class="logo">
					<h1>OnlineShop</h1>
				</div>
				<div class="search-bar">
					<input type="text" placeholder="Search...">
					<button type="submit">Search</button>
				</div>
				<div class="user-options">
					<button class="login-btn">Sign In / Register</button>
				</div>
			</div>
			<div class="header-bottom">
				<ul class="nav-list">
					<li><a href="#">All</a></li>
					<li><a href="#">Women</a></li>
					<li><a href="#">Men</a></li>
					<li><a href="#">Kids</a></li>
				</ul>
			</div>
		</header>
	</div>
<?php } ?>

<?php function footer_bar() { ?>
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
					<li><a href="#">About Us</a></li>
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