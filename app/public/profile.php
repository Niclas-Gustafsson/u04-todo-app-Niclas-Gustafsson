<?php 
include '../php/db.php';
include '../php/functions.php';

if(!isset($_SESSION['loggedin'])) {
    header('location: index.php');
    exit;
}

// getUserData();
// global $user;
// var_dump($_SESSION['id']);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <title>Profile</title>
</head>
<body class="home-body">
<main class="home-main">
        <section class="container">
        <nav class="nav">
                <div class="logo-wrapper nav-left">
                    <a href="index.php"><img class="logo" src="./images/thapp-logo.svg" alt="Thapp logo"></a>
                </div>
                <div id="hamburger" class="hamburger">
                    <span class="hamburger__lines"></span>
                </div>
                <div class="navigation nav-right">

                    <ul class="nav-items">
                        <li class="nav-item"><a class="nav-item__links" href="profile.php"><img src="./images/profile-default.svg" alt=""></a></li>

                        <li class="nav-item"><a class="nav-item__links profile-name" href="profile.php"><?php echo $_SESSION['name'];?></a></li>

                        <li class="nav-item"><a class="nav-item__links active" href="profile.php">Profile</a></li>

                        <li class="nav-item"><a class="nav-item__links" href="home.php">Home</a></li>

                        <li class="nav-item"><a class="nav-item__links" href="create_note.php">Create</a></li>

                        <li class="nav-item"><a class="nav-item__links" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
            <section class="main-dashboard-profile">
                <h1 class="profile-heading">Profile</h1>
                <section class="dashboard-body">
                    <section class="account-info">
                        <p class="profile-name">Full name: <?php echo $_SESSION['name'];?></p>
                        <p class="profile-username">Username: <?php echo $_SESSION['username'];?></p>
                        <p class="profile-email">Email: <?php echo $_SESSION['email'];?></p>

                        <a class="profile-cta" href="logout.php">Log out</a>
                    </section>
                    <section class="deleted-notes">
                        <h2 class="deleted-title">Deleted notes</h2>
                        <div class="deleted-note">
                            <h3 class="deleted-title">Title of deleted note here</h3>
                            <a href="delete.php"><img src="./images/trash.svg" alt=""></a>
                        </div>
                        <div class="deleted-note">
                            <h3 class="deleted-title">Title of deleted note here</h3>
                            <a href="delete.php"><img src="./images/trash.svg" alt=""></a>
                        </div>
                        <div class="deleted-note">
                            <h3 class="deleted-title">Title of deleted note here</h3>
                            <a href="delete.php"><img src="./images/trash.svg" alt=""></a>
                        </div>
                        <div class="deleted-note">
                            <h3 class="deleted-title">Title of deleted note here</h3>
                            <a href="delete.php"><img src="./images/trash.svg" alt=""></a>
                        </div>
                        <div class="deleted-note">
                            <h3 class="deleted-title">Title of deleted note here</h3>
                            <a href="delete.php"><img src="./images/trash.svg" alt=""></a>
                        </div>
                        <div class="deleted-note">
                            <h3 class="deleted-title">Title of deleted note here</h3>
                            <a href="delete.php"><img src="./images/trash.svg" alt=""></a>
                        </div>
                        <div class="deleted-note">
                            <h3 class="deleted-title">Title of deleted note here</h3>
                            <a href="delete.php"><img src="./images/trash.svg" alt=""></a>
                        </div>
                        <div class="deleted-note">
                            <h3 class="deleted-title">Title of deleted note here</h3>
                            <a href="delete.php"><img src="./images/trash.svg" alt=""></a>
                        </div>
                        <div class="deleted-note">
                            <h3 class="deleted-title">Title of deleted note here</h3>
                            <a href="delete.php"><img src="./images/trash.svg" alt=""></a>
                        </div>
                        <div class="deleted-note">
                            <h3 class="deleted-title">Title of deleted note here</h3>
                            <a href="delete.php"><img src="./images/trash.svg" alt=""></a>
                        </div>
                    </section>
                </section> <!-- dashboard-body end -->
            </section>
        </section>
    </main>
    <footer>
        <img src="./images/thapp-logo.svg" alt="Thapp logo">
        <p>&copy; Copyright Thapp Inc. 2021 </p>
    </footer>
    <script src="js/index.js" defer></script>
</body>
</html>