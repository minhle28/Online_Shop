<?php
include "./adminCommon.php";
include "./itemData.php";
session_start();
if (!isset($_SESSION['username'])) {
	header("location:home.php");
	exit();
}
admin_head_tag();
?>

<body>
	<?php admin_sidebar(); ?>

	<?php admin_navbar(); ?>

	<?php
	require_once("connection.php");
	$db = new config();
	$db->config();

	$ID = $_GET["ID"];
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

	if (isset($_POST["editProduct"])) {
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

		$image = isset($_FILES["image"]) ? $_FILES["image"]["name"] : "";
		echo $image;

		if (empty($image)) {
			echo "222";
			$db->updateProductNotImage($ID, $nameProduct, $description, $price, $sizeIds, $colorIds, $types);
			header("Location: adminProducts.php");
		} else {
			echo "111";
			$currentImage = "";

			if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
				$targetDir = "uploads/";
				$targetFile = $targetDir . basename($_FILES['image']['name']);

				if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
					$currentImage = $targetFile;
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}

			$db->updateProduct($ID, $nameProduct, $description, $price, $currentImage, $sizeIds, $colorIds, $types);
			header("Location: adminProducts.php");
		}
	}

	if (isset($_POST["cancelEditProduct"])) {
		header("Location: adminProducts.php");
	}
	?>

	<!-- Dashboard -->
	<main>
		<div class="head-title">
			<div class="left">
				<h1>Edit Product</h1>
			</div>
		</div>

		<div class="updateProduct">
			<form action="" method="post" enctype="multipart/form-data">
				<label for="types">Types:</label>
				<select id="types" name="types">
					<?php
					$rs = $db->getInfoByTypeID($typesID);
					while ($row = $rs->fetch_assoc()) {
						$selectedID = $row["id"];
						$nameType = $row["nameType"];
					}
					$items = $db->getAllNameTypes();
					foreach ($items as $id => $name) {
						$selected = ($id == $selectedID) ? "selected" : "";
					?>
						<option value="<?= $id ?>" <?= $selected ?>><?= $name ?></option>
					<?php }; ?>
				</select><br>

				<label for="name">Name:</label>
				<input type="text" name="nameProduct" value="<?= $nameProduct ?>"><br>

				<label for="price">Price:</label>
				<input type="text" name="price" value="<?= $price ?>"><br><br>

				<img src="./<?= $image ?>" alt="Product Image" width="200"><br>
				<label for="image">Image URL:</label>
				<input type="file" name="image"><br><br>

				<label for="size">Size:</label>
				<div class="checkbox-group" id="size">
					<?php

					$items = $db->getAllNameSizes();
					$sizeIdsArray = explode(',', $sizeID);

					foreach ($items as $id => $name) {
						$checked = in_array($id, $sizeIdsArray) ? 'checked' : '';
					?>
						<input type="checkbox" id="<?= $name ?>" name="size[]" value="<?= $id ?>" <?= $checked ?>>
						<label for="<?= $name ?>"><?= $name ?></label>
					<?php }; ?>
				</div><br>

				<label for="color">Color:</label>
				<div class="checkbox-group" id="color">
					<?php

					$items = $db->getAllNameColors();
					$colorIdsArray = explode(',', $colorID);

					foreach ($items as $id => $name) {
						$checked = in_array($id, $colorIdsArray) ? 'checked' : '';
					?>
						<input type="checkbox" id="<?= $name ?>" name="color[]" value="<?= $id ?>" <?= $checked ?>>
						<label for="<?= $name ?>"><?= $name ?></label>
					<?php }; ?>
				</div><br>

				<label for="description">Description:</label>
				<textarea name="description"><?= $descriptions ?></textarea><br>

				<button type="submit" name="cancelEditProduct">Cancel</button>
				<button type="submit" name="editProduct">Edit Item</button>
				<form>
		</div>


	</main>

	<script src="./js/admin.js"></script>
	<script src="./js/adminProduct.js"></script>
</body>

</html>