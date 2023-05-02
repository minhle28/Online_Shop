<?php
include "common.php";
include "itemData.php";
head_tag();
session_start();
require_once("connection.php");
$db = new config();
$db->config();

$items = $db->getAllNameProducts();
?>

<body>
	<br>
	<?php header_bar(); ?>

	<br>
	<div id="main_content">
		<div class="slideshow">
			<div class="slides">
				<input type="radio" name="slide" id="slide-1" class="slide-radio" checked>
				<input type="radio" name="slide" id="slide-2" class="slide-radio">
				<input type="radio" name="slide" id="slide-3" class="slide-radio">
				<input type="radio" name="slide" id="slide-4" class="slide-radio">
				<img class="pic" src="./images/image1.jpg" alt="Image 1">
				<img class="pic" src="./images/image2.jpg" alt="Image 2">
				<img class="pic" src="./images/image3.jpg" alt="Image 3">
				<img class="pic" src="./images/image4.jpg" alt="Image 4">
			</div>
			<div class="slide-nav">
				<label for="slide-1" class="slide-label"></label>
				<label for="slide-2" class="slide-label"></label>
				<label for="slide-3" class="slide-label"></label>
				<label for="slide-4" class="slide-label"></label>
			</div>
		</div>
	</div>

	<br><br>
	<div id="items-text">
		<div class="text">
			<h3>NEWS</h3>
			<p>(10 items)</p>
			<br>
		</div>
	</div>
	<hr id="dash">
	<div id="items-container">
		<?php

		$itemsContainer = '<div id="items-container">';
		$counter = 0;
		foreach ($items as $item) {
			if ($counter < 10) {
				// Create a new card element and link it to the itemDescription.php page with the item ID as a URL parameter
				$card = '<a href="itemDescription.php?id=' . $item['id'] . '" class="card">';

				// Create an image element and set its source to the item's image
				$image = '<img src="' . $item['image'] . '" alt="' . $item['nameProduct'] . '">';
				$card .= $image;
	
				// Create a heading element for the item's name
				$name = '<div class="footer_card"><div><h3>' . $item['nameProduct'] . '</h3>';
				$card .= $name;
	
				// Create a paragraph element for the item's price
				$price = '<p>$' . number_format($item['price'], 2) . '</p></div>';
				$card .= $price;
	
				// Create Favorite button
				$favorite_button = '<div><button type="button" class="favorite " aria-label="Favorite 8seconds Waffle Zipup Cardigan Ivory"><span class="fa-heart far"></span></button></div></div>';
				$card .= $favorite_button;
	
				// Add the card to the container element
				$itemsContainer .= $card . '</a>';

				$counter++;
			} else {
				break;
			}
		}

		$itemsContainer .= '</div>';

		echo $itemsContainer;
		?>

	</div>

	<br><br>
	<div id="about_text">
		<div class="text">
			<h3>Connecting the Latest Trends of Global Fashion and Beauty to All</h3>
			<br>
			<p>Welcome to ONLINESHOP.com, the leading global fashion, beauty, and lifestyle marketplace! Our goal is to connect fashion lovers around the world and provide easy access to the latest and trendiest products at affordable prices. We offer a diverse range of brands, from street fashion to high-end designers, and provide zero-hassle worldwide shipping.</p>
			<br>
			<p>At ONLINESHOP, we focus on providing leading fashion items for women's wear and men's apparel, as well as children's clothes, accessories, jewelry, and shoes. Our carefully selected items include comfortable sweatshirts and hoodies, adorable dresses, cardigans, coats, hats, activewear, hair accessories, pajamas, and much more.</p>
			<br>
			<p>We also offer beauty and personal care products that can transform your look! ONLINESHOP features over nearly 1,500 brands, including the latest K-beauty brands and premium beauty brands like La Mer, Chanel, La Prairie, Sisley, Christian Dior, Byredo, and Creed.</p>
			<br>
			<p>Our goal is to offer a personalized approach to meet the diverse needs of our customers. ONLINESHOP is your one-stop-shop for on-trend and unique products loved globally. Check out our latest fashion styles from global designers, Korean fashion, K-beauty, premium beauty, and affordable streetwear brands. With an innovative shopping experience that includes free shipping and hassle-free returns, we guarantee that ONLINESHOP will be your new favorite online shop!</p>
		</div>
	</div>

	<br><br><br>

	<?php footer_bar(); ?>
</body>

</html>