<?php
include "./adminCommon.php";
include "./itemData.php";
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
    if (isset($_POST["addType"])) {
        $nameType = $_POST["nameAddType"];

        $check = $db->checkTypes($nameType);
        if (mysqli_num_rows($check) > 0) {
            echo "<script type='text/javascript'>alert('The type has already existed');</script>";
        } else {
            $db->addType($nameType);
        }
    }

    if (isset($_POST["deleteType"])) {
        $id = $_POST['deleteType'];
        $db->deleteType($id);
    }
    ?>

    <!-- Dashboard -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Types</h1>
            </div>
        </div>

        <div id="type-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $items = $db->getAllNameTypes();
                    foreach ($items as $id => $name) {
                        echo "<tr>";
                        echo "<td>" . $id . "</td>";
                        echo "<td>" . $name . "</td>";
                        echo '<td>
									<a class="edit" role="button" type="submit" id="updateType" href="adminUpdateType.php?ID=' . $id . '">
										Edit
									</a>
									<form method="post" action="">
										<button class="delete" type="submit" name="deleteType" value="' . $id . '">Delete</button>
									</form>
                    </td>';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <button id="add-btn">Add Item</button>

        <div id="addModal" class="modal">
            <div id="popup-form" class="popupType">
                <h2 style="text-align:center; color:#ff7445">Add New Type</h2>
                <form action="adminTypes.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" name="nameAddType"><br>

                    <button id="close-btn">Close</button>
                    <button type="submit" name="addType">Add Item</button>
                    <form>
            </div>
        </div>
        </div>

    </main>

    <script src="./js/admin.js"></script>
</body>

</html>