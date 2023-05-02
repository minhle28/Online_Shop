<?php
include "adminCommon.php";
include "itemData.php";
session_start();
if (!isset($_SESSION['username'])) {
	header("location:home.php");
	exit();
}
admin_head_tag();

	require_once("connection.php");
	$db = new config();
	$db->config();
?>

<body>
    <?php admin_sidebar(); ?>

    <?php admin_navbar(); ?>
	
	<?php	
		if (isset($_POST["addProduct"])) {
			$nameProduct = $_POST["nameProduct"];
			$description = $_POST["description"];
			$price = $_POST["price"];
			$size = $_POST["size"];
			$color = $_POST["color"];
			$types = $_POST["types"];
			
			$sizeIds = '';
			foreach ($size as $item) {
				$sizeIds .= $item . ',';
			}
			$sizeIds = rtrim($sizeIds, ',');
			
			$colorIds = '';
			foreach ($color as $item) {
				$colorIds .= $item . ',';
			}
			$colorIds = rtrim($colorIds, ',');
			
			$targetDir = "uploads/";
			$targetFile = $targetDir . basename($_FILES["image"]["name"]);

			$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			} else {
				if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
					$db->addProduct($nameProduct, $description, $price, $targetFile, $sizeIds, $colorIds, $types);
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
		}	

		if (isset($_POST["deleteProduct"])) {
			$id = $_POST['deleteProduct'];
			$db->deleteProduct($id);
		}
	?>

    <!-- Dashboard -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Products</h1>
            </div>
        </div>

		<table id="items-table">
			<thead>
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Price</th>
					<th>Color</th>
					<th>Size</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$items = $db->getAllNameProducts();

				foreach ($items as $item) {
					echo '<tr class="card">';
					echo '<td><a href="itemDescription.php?id=' . $item['id'] . '"><img src="./' . $item['image'] . '" alt="Product Image"></a></td>';
					echo '<td>' . $item['nameProduct'] . '</td>';
					echo '<td>$' . number_format($item['price'], 2) . '</td>';

					// Display color and size as comma-separated strings
					$colorIds = explode(',', $item['colorID']);
					$items = $db->getAllNameColors();
					$strColor = "";
					foreach ($colorIds as $colorId) {
						if (isset($items[$colorId])) {
							$colorName = $items[$colorId];
							$strColor .= "{$colorName} <br>";
						}
					}
					echo '<td>' . $strColor . '</td>';


					$sizeIds = explode(',', $item['sizeID']);
					$items = $db->getAllNameSizes();
					$strSize = "";
					foreach ($sizeIds as $sizeId) {
						if (isset($items[$sizeId])) {
							$sizeName = $items[$sizeId];
							$strSize .= "{$sizeName} <br>";
						}
					}
					echo '<td>' . $strSize . '</td>';



					// Display action buttons as a single column
					echo '<td>';
					echo '<div><a class="edit" role="button" type="submit" id="updateProduct" href="adminUpdateProduct.php?ID='.$item['id'].'">Edit</a><div>';
					echo '<form method="post" action="">';
					echo '<button class="delete" type="submit" name="deleteProduct" value="' . $item['id'] . '">Delete</button>';
					echo '</form>';
					echo '</td>';

					echo '</tr>';
				}
				?>
			</tbody>
		</table>
			
        <button id="add-btn">Add Item</button>

        <div id="addModal" class="modal">
            <div id="popup-form" class="popup">
                <h2 style="text-align:center; color:#ff7445">Add New Item</h2>
                <form action="adminProducts.php" method="post" enctype="multipart/form-data">
                    <label for="types">Types:</label>
                    <select id="types" name="types">
                        <?php 
							$items = $db->getAllNameTypes();
							foreach ($items as $id => $name) {
						?>
						<option value="<?= $id ?>"><?= $name ?></option>
						<?php }; ?>
                    </select><br>

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="nameProduct"><br>

                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price"><br><br>
					
                    <label for="image">Image URL:</label>
                    <input type="file" name="image"><br><br>

                    <label for="size">Size:</label>
                    <div class="checkbox-group" id="size">
						<?php 
							$items = $db->getAllNameSizes();
							foreach ($items as $id => $name) {
						?>
						<input type="checkbox" id="<?= $name ?>" name="size[]" value="<?= $id ?>">
                        <label for="<?= $name ?>"><?= $name ?></label>
						<?php }; ?>
                    </div><br>

                    <label for="color">Color:</label>
                    <div class="checkbox-group" id="color">
						<?php 
							$items = $db->getAllNameColors();
							foreach ($items as $id => $name) {
						?>
						<input type="checkbox" id="<?= $name ?>" name="color[]" value="<?= $id ?>">
                        <label for="<?= $name ?>"><?= $name ?></label>
						<?php }; ?>
                    </div><br>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description"></textarea><br>

                    <button id="close-btn">Close</button>
                    <button type="submit" name="addProduct">Add Item</button>
                <form>
            </div>
        </div>


    </main>
    </section>

    <script src="./js/admin.js"></script>
</body>

</html>