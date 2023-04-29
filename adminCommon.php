<?php function admin_head_tag()
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="./css/admin.css">
        <link href="./css/adminProduct.css" type="text/css" rel="stylesheet">
        <link href="./css/manageUser.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="./js/adminProduct.js"></script>
        <!--<script type="text/javascript" src="./js/logoutServer.js"></script>-->
        <title>Admin Panel</title>
    </head>
<?php } ?>



<?php function admin_sidebar()
{ ?>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <span class="text">Admin</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="admin.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="adminProduct.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Product</span>
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
                <a class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <button id="logout-btn" class="text">Logout</button>
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