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
    <title>Welcome to Thapp</title>
</head>
<body>
    <main class="main">
        <section class="container">
            <nav class="nav">
                <div class="logo-wrapper nav-left">
                    <a href="index.php"><img class="logo" src="./images/thapp-logo.svg" alt=""></a>
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
                <img id="index-dash-img" src="./images/thapp-logo.svg" alt="Thapp logo">
                <h1 class="heading">Thapp</h1>
                <h2 class="sub-heading">Thapp is a simplified note-taking app to get your days running smoothly.</h2>
    
                <p class="cta-text">Sign up now and boost your productivity</p>
                <a href="signup.php" class="cta">Sign up!</a>
                <p class="login-direct">Or click here to <a href="login.php">log in</a></p>
            </section>
        </section>
    </main>
    <footer>
        <img src="./images/thapp-logo.svg" alt="Thapp logo">
        <p>&copy; Copyright Thapp Inc. 2022 </p>
    </footer>

    <script src="js/index.js" defer></script>
</body>
</html>