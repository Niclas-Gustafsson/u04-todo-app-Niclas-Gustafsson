<?php 


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
    <title>Signup</title>
</head>
<body class="signup-body">
<main class="signup-main">
        <section class="container">
            <nav class="nav">
                <div class="logo-wrapper nav-left">
                    <a href="index.php"><img class="logo" src="./sass/dist/images/thapp-logo.svg" alt="Thapp logo"></a>
                </div>
                <div id="hamburger" class="hamburger">
                    <span class="hamburger__lines"></span>
                </div>
                <div class="navigation nav-right">

                    <ul class="nav-items">
                        <li class="nav-item"><a class="nav-item__links active" href="index.php">Thapp</a></li>
                        <li class="nav-item"><a class="nav-item__links" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-item__links" href="signup.php">Signup</a></li>
                    </ul>
                </div>
            </nav>
            <section class="main-dashboard">
                <h1 class="home-heading">Home</h1>
                <div class="note-wrapper">
                    <section class="note-head-wrapper">
                        <h2 class="home-subheading">Active notes</h2>
                    </section>
                    <section class="card-wrapper">
                        <div class="note">
                            <h3 class="note-title">Remember to call Ted!</h3>
                            <p class="note-body">Been too long since we talked.</p>
                            <a href=""><img src="../sass/dist/images/thapp-logo.svg" alt="Edit note"></a>
                            
                        </div>
                    </section>
                </div>
            </section>
        </section>
    </main>
    <footer>
        <img src="../sass/dist/images/thapp-logo.svg" alt="Thapp logo">
        <p>&copy; Copyright Thapp Inc. 2021 </p>
    </footer>
    <script src="js/index.js" defer></script>
</body>
</html>