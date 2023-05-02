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
	$rs = $db->getInfoByTypeID($ID);
	while ($row = $rs->fetch_assoc()) {
		$nameType = $row["nameType"];
	}

	if (isset($_POST["editType"])) {
		$nameType = $_POST["nameType"];
		$db->updateType($ID, $nameType);
		header("Location: adminTypes.php");
	}

	if (isset($_POST["cancelEditType"])) {
		header("Location: adminTypes.php");
	}
	?>

	<!-- Dashboard -->
	<main>
		<div class="head-title">
			<div class="left">
				<h1>Edit Type</h1>
			</div>
		</div>

		<div class="updateType">
			<form action="" method="post">
				<label for="name">Name:</label>
				<input type="text" name="nameType" value="<?= $nameType ?>"><br>

				<button type="submit" name="cancelEditType">Cancel</button>
				<button type="submit" name="editType">Edit Item</button>
			<form>
		</div>
	</main>

	<script src="./js/admin.js"></script>
	<script src="./js/adminProduct.js"></script>
</body>

</html>