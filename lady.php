<?php
include "common.php";
include "itemData.php";
session_start();
head_tag();

	require_once("connection.php");
	$db = new config();
	$db->config();
	
	$items = $db->getAllNameProductsByType(2);
?>

<body>
    <br>
    <?php header_bar(); ?>

    <br><br>
    <div id="items-text">
        <div class="text">
            <h3>Lady</h3>
            <?php
            echo '<p>(' . count($items) . ' items)</p>';
            ?>
            <br>
        </div>
    </div>
    <hr id="dash">

    <div id="filtered-items-container"></div>

    <div id="items-container">
        <?php

        $itemsContainer = '<div id="items-container">';
		
        foreach ($items as $item) {
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
        }
        $itemsContainer .= '</div>';

        echo $itemsContainer;
        ?>

    </div>

    <br><br><br>

    <?php footer_bar(); ?>