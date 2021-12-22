<?php 
include '../php/db.php';
include '../php/functions.php';

if(!isset($_SESSION['loggedin'])) {
    header('location: index.php');
    exit;
}
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
    <title>Create note</title>
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

                        <li class="nav-item"><a class="nav-item__links profile-name" href="profile.php">AdvancedUser</a></li>

                        <li class="nav-item"><a class="nav-item__links" href="profile.php">Profile</a></li>

                        <li class="nav-item"><a class="nav-item__links" href="home.php">Home</a></li>

                        <li class="nav-item"><a class="nav-item__links active" href="create_note.php">Create</a></li>

                        <li class="nav-item"><a class="nav-item__links" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
            <section class="main-dashboard">
            <h1 class="create-heading">Create note</h1>
                <!-- <h2 class="signup-sub-heading">Login to your account</h2> -->
                <form action="" class="create-form" method="POST">
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text">
                    <label for="note">Note</label>
                    <textarea id="note" name="note"></textarea>
                    <input type="submit" name="submit" value="Add note">
                    <!-- <input id="create-btn" type="submit" name="submit" value="Add note"> -->
                </form>
                <p class="login-direct">Click here to see <a href="home.php">Notes</a></p>
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