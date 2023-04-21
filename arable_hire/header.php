<!DOCTYPE html>
<html lang="en">

<head>
	<title>ArableHire</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-logo" href="#">
            <img src="static/arable_hire_logo.jpeg" alt="My Website Logo">
        </a>
        <h1 class="navbar-title">ArableHire</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view.php">Hire Machinery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="upload.php">Advertise Machinery</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav ml-auto menu-member">
            <?php
            if(isset($_SESSION["userid"])) {
                // User logged in
                ?>
                <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
                <li><a href="includes/logout.inc.php" class="header-login-a">Logout</a></li>
                <?php
                // Checks if user is an admin, if yes displays the Dashboard button.
                if($_SESSION["userid"] == "2") {
                    ?>
                    <li><a href="admin.php">Dashboard</a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="manageUserListings.php">Manage</a></li>
                    <?php
                }
            } else {
                // User is not logged in
                ?>
                <li><a href="index.php">Sign Up</a></li>
                <li><a href="index.php" class="header-login-a">Login</a></li>
                <?php
            }
            ?>        
        </ul>
    </nav>
</header>