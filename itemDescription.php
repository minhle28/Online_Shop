<?php
include "common.php";
include "itemData.php";
head_tag();
?>

<body>
    <br>
    <?php header_bar(); ?>

    <br>
    <div class="description">
        <?php
        // Get the item ID from the URL parameter
        $id = $_GET['id'];

        // Find the item in the items array based on the ID
        foreach ($items as $item) {
            if ($item['id'] == $id) {
                // Create the size and color option HTML
                $size_options = '';
                foreach ($item['size'] as $size) {
                    $size_options .= '<option value="' . $size . '">' . $size . '</option>';
                }
                $size_select = '<select name="size">' . $size_options . '</select>';

                $color_options = '';
                foreach ($item['color'] as $color) {
                    $color_options .= '<option value="' . $color . '">' . $color . '</option>';
                }
                $color_select = '<select name="color">' . $color_options . '</select>';

                // Create the item description HTML
                $image = '<img src="' . $item['image'] . '" alt="' . $item['name'] . '">';
                $name = '<h2>' . $item['name'] . '</h2>';
                $price = '<p>$' . number_format($item['price'], 2) . '</p>';
                $size_label = '<label><strong>Size:</strong></label>';
                $color_label = '<label><strong>Color:</strong></label>';
                $description = '<p>' . $item['description'] . '</p>';

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
                echo '<input type="hidden" name="id" value="' . $item['id'] . '">';
                echo '<input type="submit" name="submit" value="Add to Cart">';
                echo '</form>';
                echo '<br><br><br>';
                echo '<h2>Descriptions</h2><br>';
                echo $description;
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>


    <br>

    <?php footer_bar(); ?>
    <script type="text/javascript" src="./js/common.js"></script>
</body>

</html>