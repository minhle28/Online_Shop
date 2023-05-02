<?php function head_tag() { ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<title> OnlineShop</title>
		<link rel="stylesheet" href="./css/all.css" crossorigin="anonymous" />
		<link href="./css/common.css" type="text/css" rel="stylesheet">
		<link href="./css/home.css" type="text/css" rel="stylesheet">
		<link href="./css/itemDescription.css" type="text/css" rel="stylesheet">
		<link href="./css/about.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="./js/common.js"></script>
	</head>
<?php } ?>

<?php 
	require_once("connection.php");
	$db = new config();
	$db->config();
	
		if (isset($_GET["search"])) {
			$key = $_GET['search'];
			$db->searchProduct($key);
		}
 ?>

<?php function header_bar() { ?>

	<div id="header">
		<header>
			<div class="header-top">
				<div class="logo">
					<h1><a href="home.php">OnlineShop</a></h1>
				</div>
				<div class="search-bar">
					<form action="" method="get">
						<input type="text" name="search" placeholder="Search...">
						<button type="submit">Search</button>
					</form>
				</div>
				<div class="user-options">
					<?php
						if (isset($_SESSION['username'])) {
							echo '
							<h2>Hello! <span style="color: #ff3e00;">'.$_SESSION['username'].'</span></h2>
							<a href="admin.php"><button>Sell</button></a>
							';
						} else {
							echo '
							<a href="login.php"><button>Login</button></a>
							<a href="register.php"><button id="loginBtn">Register</button></a>
							';
						}
					?>
					<div>
						<a href="#"><i id="favorites" class="fas fa-heart"></i></a>
					</div>
					<div>
						<a href="#"><i id="cart-link" class="fas fa-shopping-bag"></i></a>
					</div>
					<?php
						if (isset($_SESSION['username'])) {
							echo '
							<div>
								<a href="logout.php"><i id="logout" class="fas fa-sign-out-alt"></i></a>
							</div>
							';
						}
					?>
				</div>
			</div>
			<div class="header-bottom">
				<ul class="nav-list">
					<li><a href="all.php">All</a></li>
					<li><a href="lady.php">Lady</a></li>
					<li><a href="men.php">Men</a></li>
					<li><a href="kid.php">Kid</a></li>
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