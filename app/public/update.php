<?php 
include '../php/db.php';
include '../php/functions.php';
// session_start();

if(!isset($_SESSION['loggedin'])) {
    header('location: index.php');
    exit;
}

$id = $_GET['id'];

$query = 'SELECT * FROM notes WHERE noteID= :id';
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $id);
if ($stmt->execute()) {
    $row = $stmt->fetch(PDO::FETCH_OBJ);
} else {
    print_r($db->errorInfo());
}
$noteID = $row->noteID;


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
    <title>Update note</title>
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

                        <li class="nav-item"><a class="nav-item__links" href="profile.php">Profile</a></li>

                        <li class="nav-item"><a class="nav-item__links" href="home.php">Home</a></li>

                        <li class="nav-item"><a class="nav-item__links" href="create_note.php">Create</a></li>

                        <!-- <li class="nav-item logout-btn"><a class="nav-item__links ">Logout</a></li> -->
                    </ul>
                </div>
            </nav>
            <section class="main-dashboard">
            <h1 class="create-heading">Update note</h1>
                <form action="update_record.php" class="create-form" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text" value="<?php echo $row->title; ?>">
                    <label for="note">Note</label>
                    <textarea id="note" name="note" ><?php echo $row->body;?></textarea>
                    <input type="submit" name="submit" value="Update note">
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