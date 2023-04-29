<?php
include "adminCommon.php";
include "itemData.php";
admin_head_tag();
?>

<body>
    <?php admin_sidebar(); ?>

    <?php admin_navbar(); ?>

    <!-- Dashboard -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Product</h1>
            </div>
        </div>

        <div id="items-container">
            <?php
            $itemsContainer = '<div id="items-container">';
            $reversed_items = array_reverse($items); // Reverse the order of the items array

            foreach ($reversed_items as $item) {
                // Create a new card element and link it to the itemDescription.php page with the item ID as a URL parameter
                $card = '<a href="itemDescription.php?id=' . $item['id'] . '" class="card">';

                // Create an image element and set its source to the item's image
                $image = '<img src="' . $item['image'] . '" alt="' . $item['name'] . '">';
                $card .= $image;

                // Create a heading element for the item's name
                $name = '<div class="footer_card"><div><h3>' . $item['name'] . '</h3>';
                $card .= $name;

                // Create a paragraph element for the item's price
                $price = '<p>$' . number_format($item['price'], 2) . '</p></div>';
                $card .= $price;

                $color = '<div><p>' . count($item['color']) . ' colors</p>';
                $card .= $color;

                $size = '<p>' . count($item['size']) . ' sizes</p></div>';
                $card .= $size;

                // Create delete button
                $delete_button = '<div><button type="button" class="edit ">Edit</button><button type="button" class="delete ">Delete</button></div></div>';
                $card .= $delete_button;

                // Add the card to the container element
                $itemsContainer .= $card . '</a>';
            }
            $itemsContainer .= '</div>';

            echo $itemsContainer;

            ?>

        </div>
        <button id="add-btn">Add Item</button>

        <div id="addModal" class="modal">
            <div id="popup-form" class="popup">
                <h2 style="text-align:center; color:#ff7445">Add New Item</h2>
                <label for="property">Property:</label>
                <select id="property" name="property">
                    <option value="lady">Lady</option>
                    <option value="men">Men</option>
                    <option value="kid">Kid</option>
                </select><br>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price"><br><br>

                <label for="image">Image URL:</label>
                <input type="file" id="image" name="image"><br><br>

                <label for="size">Size:</label>
                <div class="checkbox-group" id="size">
                    <input type="checkbox" id="size-small" name="size" value="Small">
                    <label for="size-small">Small</label>

                    <input type="checkbox" id="size-medium" name="size" value="Medium">
                    <label for="size-medium">Medium</label>

                    <input type="checkbox" id="size-large" name="size" value="Large">
                    <label for="size-large">Large</label>
                </div><br>

                <label for="color">Color:</label>
                <div class="checkbox-group" id="color">
                    <input type="checkbox" id="color-red" name="color" value="Red">
                    <label for="color-red">Red</label>

                    <input type="checkbox" id="color-green" name="color" value="Green">
                    <label for="color-green">Green</label>

                    <input type="checkbox" id="color-blue" name="color" value="Blue">
                    <label for="color-blue">Blue</label>
                </div><br>

                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea><br>

                <button id="close-btn">Close</button>
                <button type="submit">Add Item</button>
            </div>
        </div>


    </main>
    </section>

    <script src="./js/admin.js"></script>
</body>

</html>