<?php
include '../php/db.php';
session_start();
//Add function declarations here

//Function for creating user in database
function createUser() {
    global $db;
    // if(isset($_POST['submit'])) {
        $name = $_POST['fullName'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if(!$db) {
            exit('Database connection failed.');
        }

        $query = 'INSERT INTO users(username, password, name, email) VALUES (:username, :password, :name, :email)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $hash);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

    // }
}
//Function for authenticating user login
function authLogin() {
    global $db;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = 'SELECT * FROM users WHERE username=:username';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();
    if($user && password_verify($password, $user['password'])) {
        session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $user['id'];

            header('location: home.php');
    } else {
        exit('Login failed');
    }
}
//Function for creating notes (connected to specific user)

//Function for reading user specific notes (table relationships)

//Function for updating a note

//Function for deleting a note

//Function for reading cleared notes?

?>