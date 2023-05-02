<?php function admin_head_tag()
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='./css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="./css/admin.css">
		<link href="./css/adminType.css" type="text/css" rel="stylesheet">
        <link href="./css/adminProduct.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="./js/adminProduct.js"></script>
        <title>Admin Panel</title>
    </head>
<?php } ?>



<?php function admin_sidebar()
{ ?>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="all.php" class="brand">
            <span class="text" style="font-family:'Times New Roman', Times, serif;">ONLINESHOP</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="admin.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="adminProducts.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Products</span>
                </a>
            </li>
			<li>
                <a href="adminTypes.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Types</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
<?php } ?>


<?php function admin_navbar()
{ ?>
    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <a href="#" class="profile">
                <img src="./images/people.jpg">
            </a>
        </nav>
    <?php } ?>