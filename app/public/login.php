






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
    <title>Thapp login</title>
</head>
<body class="signup-body">
<main class="signup-main">
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
                        <li class="nav-item"><a class="nav-item__links" href="index.php">Thapp</a></li>
                        <li class="nav-item"><a class="nav-item__links active" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-item__links" href="signup.php">Signup</a></li>
                    </ul>
                </div>
            </nav>
            <section class="main-dashboard">
            <img class="dashboard-img" src="./images/thapp-logo.svg" alt="Thapp logo">
                <h1 class="signup-heading">Thapp</h1>
                <h2 class="signup-sub-heading">Login to your account</h2>
                <form action="" class="signup-form">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="text">
                    <input id="signup-btn" type="submit" name="submit" value="Login">
                </form>
                <p class="login-direct">Or click here to <a href="signup.php">Sign up</a></p>
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