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

//Fix validation for creating user so there can´t be duplicates!!!!!.
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
            $_SESSION['name'] = $user['name'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['message'] = '';

            header('location: home.php');
    } else {
        exit('Login failed');
    }
}

//Function for fetching userdata
/* function getUserData() {
    global $db;
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    $query = 'SELECT * FROM users WHERE id=:id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $_SESSION['id']);
    $stmt->execute();
    $user = $stmt->fetch();
    // var_dump($user);
} */
//Function for creating notes (connected to specific user)
function createNote() {
    global $db;
    $noteTitle = $_POST['title'];
    $noteBody = $_POST['note'];
    $id = $_SESSION['id'];
    $query = 'INSERT INTO notes(userID, title, body) VALUES (:userID, :title, :body)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':userID', $id);
    $stmt->bindValue(':title', $noteTitle);
    $stmt->bindValue(':body', $noteBody);
    if($stmt->execute()) {
        $_SESSION['message'] = "Note was successfully created.";
    } else {
        print_r($db->errorInfo());
    }
}
//Function for reading user specific notes (table relationships)
function getNote() {
    global $db;
    $id = $_SESSION['id'];
    // echo $id;
    $stmt = $db->prepare('SELECT * FROM notes WHERE userID=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetchAll();

    
    // var_dump($result);
}
//Function for updating a note
function updateNote() {
    global $db;
    $title = $_POST['title'];
    $body = $_POST['note'];
    $id = $_POST['id'];
    $query = 'UPDATE notes SET title = :title, body = :body WHERE noteID = :id';
    $stmt= $db->prepare($query);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR,255);
    $stmt->bindParam(':body', $body, PDO::PARAM_STR,255);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT,255);
    if($stmt->execute()) {
        $_SESSION['message'] = "Note was successfully updated.";
        header('location: home.php');
    } else {
        print_r($db->errorInfo());
    }
}

//Function for checking a note as cleared
function checkedNote() {
    global $db;
    global $id;
    $tickedNote = 1;
    $query = 'UPDATE notes SET checked = :checked WHERE noteID = :id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':checked', $tickedNote);
    $stmt->bindValue(':id', $id);
    if($stmt->execute()) {
        $_SESSION['message'] = "Wohoo you did it! Keep'em coming.";
        header('location: home.php');
    } else {
        print_r($db->errorInfo());
    }
}
//Function for deleting a note
function deleteNote() {
    global $db;
    global $id;
    $query = 'DELETE FROM notes WHERE noteID =:id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id);
    
    if($stmt->execute()) {
        $_SESSION['message'] = 'Note was sucessfully deleted';
        header('location: home.php');
        
    } else {
        print_r($db->errorInfo());
    }
}

//Function for reading cleared notes?

?>