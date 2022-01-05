<?php 
include '../php/functions.php';

if(!isset($_SESSION['loggedin'])) {
    header('location: index.php');
    exit;
}
//Message for popup, value depending on what query was made successfully.
$msg = $_SESSION['message'];

//Fetch table data from notes table
function getUserId() {
    global $db;
    global $stmt;
    $id = $_SESSION['id'];
    $stmt = $db->prepare('SELECT * FROM notes WHERE userID=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

getUserId();


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
    <title>Home</title>
</head>
<body class="home-body">
<main class="home-main">
        <section class="container">
            <nav class="nav">
                <div class="logo-wrapper nav-left">
                    <a href="home.php"><img class="logo" src="./images/thapp-logo.svg" alt="Thapp logo"></a>
                </div>
                <div id="hamburger" class="hamburger">
                    <span class="hamburger__lines"></span>
                </div>
                <div class="navigation nav-right">

                    <ul class="nav-items">
                        <li class="nav-item"><a class="nav-item__links" href="profile.php"><img src="./images/profile-default.svg" alt=""></a></li>

                        <li class="nav-item"><a class="nav-item__links profile-name" href="profile.php"><?php echo $_SESSION['name'];?></a></li>

                        <li class="nav-item"><a class="nav-item__links" href="profile.php">Profile</a></li>

                        <li class="nav-item"><a class="nav-item__links active" href="home.php">Home</a></li>

                        <li class="nav-item"><a class="nav-item__links" href="create_note.php">Create</a></li>

                        <li class="nav-item"><a class="nav-item__links" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
            <section class="main-dashboard">
                <!-- <section class="popup">
                    <p class="notification">This is the notofication text. and this ios just some moreo filler text</p>
                    <img class="notify-close" src="./images/close.svg" alt="Close notification">
                </section> -->
                <!-- Show popup if $_SESSION['message'] is not = empty string. Adds class of "show" to popup section-->
                <?php if($msg != '') { ?>
                    <section class="popup show">
                    <p class="notification"><?php echo $msg; ?></p>
                    <img class="notify-close" src="./images/close.svg" alt="Close notification">
                </section>
                <?php } $_SESSION['message'] = '';?>
                <h1 class="home-heading">Home</h1>

                <!-- Wrapper for all notes -->
                <div class="notes-wrapper">
                    <section class="note-head-wrapper">
                        <h2 class="home-subheading">Active notes</h2>
                    </section>
                    <!-- Note card -->
                    <section class="card-wrapper">
                        <!-- Test for printing out table items -->
                            <?php 
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    if($row['checked'] == 1) {
       
                            ?>
                            <section class="note-card checked-note">
                            <section class="note-body-wrapper ">
                                <h3 class="note-title checked"><?php echo $row['title'];?></h3>
                                <p class="note-body checked"><?php echo $row['body'];?></p>
                                <div class="note-icons">
                                    
                                    <a href="delete.php?id=<?php echo $row['noteID'];?>"><img class="icon" src="./images/trash.svg" alt="Delete note"></a>
                                    <a href="checked.php?id=<?php echo $row['noteID']?>"><img class="icon" src="./images/check-dark.svg" alt="Mark note as done"></a>
                                    
                                </div>
                            </section>
                            </section>
                            <?php } else {?> <!-- End of if statment, start of else statement -->
                            

                            <section class="note-card">
                            <section class="note-body-wrapper">
                                <h3 class="note-title"><?php echo $row['title'];?></h3>
                                <p class="note-body"><?php echo $row['body'];?></p>
                                <div class="note-icons">
                                    <a  href="update.php?id=<?php echo $row['noteID']?>&titleValue=<?php echo $row['title']?>&bodyValue=<?php echo $row['body'];?>"><img class="icon" src="./images/edit.svg" alt="Edit note"></a>
                                    <a href="delete.php?id=<?php echo $row['noteID'];?>"><img class="icon" src="./images/trash.svg" alt="Delete note"></a>
                                    <a href="checked.php?id=<?php echo $row['noteID']?>"><img class="icon" src="./images/check-dark.svg" alt="Mark note as done"></a>
                                    
                                </div>
                            </section>
                        </section>
                        <?php } ?> <!-- End of else statment -->
                        <?php } ?> <!-- End of while loop -->

                        <a href="create_note.php" class="cta-create">Create note</a>
                    </section> <!-- card-wrapper end -->
                </div>
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