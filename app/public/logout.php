<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: index.php'); //send to logout page which says goodbye to the user.
?>