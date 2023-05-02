<?php
include "common.php";
include "itemData.php";
session_start();
head_tag();
?>

<body>
    <br>
    <?php header_bar(); ?>

    <br>
    <div class="description">
        <?php
        // Get the item ID from the URL parameter
        
		require_once("connection.php");
		$db = new config();
		$db->config();
		
		$ID = $_GET["id"];
		$rs = $db->getInfoByProductID($ID);
		while ($row = $rs->fetch_assoc()) {
			$nameProduct = $row["nameProduct"];
			$descriptions = $row["descriptions"];
			$price = $row["price"];
			$image = $row["image"];
			$sizeID = $row["sizeID"];
			$colorID = $row["colorID"];
			$typesID = $row["typesID"];
		}
		
		$itemsSize = $db->getAllNameSizes();
		$sizeIdsArray = explode(',', $sizeID);
		$size_options = '';
		
		foreach ($itemsSize as $id => $name) {
			$selected = in_array($id, $sizeIdsArray) ? 'selected' : '';	
			if ($selected) {
				$size_options .= '<option value="' . $id . '">' . $name . '</option>';
			}
		}
		$size_select = '<select name="size">' . $size_options . '</select>';
		
		$itemsColor = $db->getAllNameColors();
		$colorIdsArray = explode(',', $colorID);
		$color_options = '';
		
		foreach ($itemsColor as $id => $name) {
			$selected = in_array($id, $colorIdsArray) ? 'selected' : '';	
			if ($selected) {
				$color_options .= '<option value="' . $id . '">' . $name . '</option>';
			}
		}
		$color_select = '<select name="color">' . $color_options . '</select>';

                // Create the item description HTML
                $image = '<img src="' . $image . '" alt="' . $nameProduct . '">';
                $name = '<h2>' . $nameProduct . '</h2>';
                $price = '<p>$' . number_format($price, 2) . '</p>';
                $size_label = '<label><strong>Size:</strong></label>';
                $color_label = '<label><strong>Color:</strong></label>';
                $description = '<p>' . $descriptions . '</p>';

                // Display the item description HTML with size and color dropdowns
                echo '<div class="item-description">';
                echo $image;
                echo '<div class="right-side">';
                echo $name;
                echo '<br>';
                echo $price;
                echo '<hr><br>';
                echo '<form method="post" action="cart.php">';
                echo '<div>';
                echo $size_label;
                echo '<br>';
                echo $size_select;
                echo '</div>';
                echo '<br>';
                echo '<div>';
                echo $color_label;
                echo '<br>';
                echo $color_select;
                echo '</div>';
                echo '<br>';
                echo '<div><label for="quantity"><strong>Quantity:</strong></label><br>
                <select id="quantity" name="quantity">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10+</option>
                </select></div><br>';
                echo '<div class="bag-favorite-button"><input type="hidden" name="id" value="' . $ID . '">';
                echo '<input type="submit" name="submit" value="Add to Bag">';
                echo '<button type="button" class="favorite " aria-label="Favorite 8seconds Waffle Zipup Cardigan Ivory"><span class="fa-heart far"></span></button></div>';
                echo '</form>';
                echo '<br><br><br>';
                echo '<h2>Descriptions</h2><br>';
                echo $description;
                echo '</div>';
                echo '</div>';
        ?>
    </div>


    <br>
    <?php footer_bar(); ?>
    <script type="text/javascript" src="./js/common.js"></script>
</body>

</html>