<?php
include "common.php";
include "itemData.php";
head_tag();
?>

<body>
    <br>
    <?php header_bar(); ?>

    <br><br>
    <div id="items-text">
        <div class="text">
            <h3>All</h3>
            <?php
            echo '<p>(' . count($items) . ' items)</p>';
            ?>
            <br>
        </div>
    </div>
    <hr id="dash">

    <div id="filtered-items-container"></div>
    <?php require_once('itemData.php'); ?>

    <div id="items-container">
        <?php

        $itemsContainer = '<div id="items-container">';
        foreach ($items as $item) {
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
    
    <!-------------------SEARCH ITEMS------------------>
    <script>
        // Get references to the search input and button
        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');
        const itemsContainer = document.getElementById('items-container');
        const categoryLinks = document.querySelectorAll('.nav-list a[data-category]');

        // Add click listeners to category links
        categoryLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();

                // Get the category from the link data attribute
                const category = link.getAttribute('data-category');

                // Update the search input value with the category
                searchInput.value = category.toLowerCase();

                // Trigger the search button click event
                searchButton.click();
            });
        });

        // Add click listener to search button
        searchButton.addEventListener('click', () => {
            // Get the search query from the input field
            const query = searchInput.value.toLowerCase();

            // Filter the items based on the search query
            const filteredItems = <?php echo json_encode($items); ?>.filter(item => {
                // Check if the item name or property matches the search query
                return item.name.toLowerCase().includes(query) || item.property.toLowerCase().includes(query);
            });
            
            // Generate the HTML for the filtered items
            let filteredItemsHTML = '';
            filteredItems.forEach(item => {
                // Create a new card element and link it to the itemDescription.php page with the item ID as a URL parameter
                const card = '<a href="itemDescription.php?id=' + item.id + '" class="card">';

                const image = '<img src="' + item.image + '" alt="' + item.name + '">';
                filteredItemsHTML += card + image;

                const name = '<div class="footer_card"><div><h3>' + item.name + '</h3>';
                filteredItemsHTML += name;

                const price = '<p>$' + item.price.toFixed(2) + '</p></div>';
                filteredItemsHTML += price;

                const favoriteButton = '<div><button type="button" class="favorite " aria-label="Favorite ' + item.name + '"><span class="fa-heart far"></span></button></div></div>';
                filteredItemsHTML += favoriteButton;

                filteredItemsHTML += '</a>';
            });

            itemsContainer.innerHTML = filteredItemsHTML;
        });
    </script>

</body>

</html>