<?php
include '../php/db.php';
include '../php/messageArrays.php';
session_start();

function getUserId()
{
    global $db;
    global $stmt;
    $id = $_SESSION['id'];
    $stmt = $db->prepare('SELECT * FROM notes WHERE userID=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function getUsers($uname)
{
    $found = NULL;
    global $db;
    $query = 'SELECT * FROM users WHERE username=:username';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $uname);
    $stmt->execute();
    $result = $stmt->fetch();
    if ($result > 0) {
        $found = $result['username'];
    } else {
        $found = "";
    }
    return $found;
}

function createUser()
{
    global $db;
    $name = $_POST['fullName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $userFound = getUsers($username);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if (!$db) {
        exit('Database connection failed.');
    }
    if ($userFound == $username) {
        $_SESSION['message'] = "User already exists, try something else.";
        header('location: signup.php');
        exit();
    } else {
        $query = 'INSERT INTO users(username, password, name, email) VALUES (:username, :password, :name, :email)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $hash);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $_SESSION['message'] = "Account created, head over to the login page!";
    }
}

function authLogin()
{
    global $db;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = 'SELECT * FROM users WHERE username=:username';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
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


function createNote()
{
    global $createMsg;
    global $db;
    $noteTitle = $_POST['title'];
    $noteBody = $_POST['note'];
    $id = $_SESSION['id'];
    $query = 'INSERT INTO notes(userID, title, body) VALUES (:userID, :title, :body)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':userID', $id);
    $stmt->bindValue(':title', $noteTitle);
    $stmt->bindValue(':body', $noteBody);
    if ($stmt->execute()) {
        $_SESSION['message'] = randomMsg($createMsg);
    } else {
        print_r($db->errorInfo());
    }
}

function getNote()
{
    global $db;
    $id = $_SESSION['id'];
    $stmt = $db->prepare('SELECT * FROM notes WHERE userID=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetchAll();
}


function updateNote()
{
    global $updateMsg;
    global $db;
    $title = $_POST['title'];
    $body = $_POST['note'];
    $id = $_POST['id'];
    $query = 'UPDATE notes SET title = :title, body = :body WHERE noteID = :id';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR, 255);
    $stmt->bindParam(':body', $body, PDO::PARAM_STR, 255);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT, 255);
    if ($stmt->execute()) {
        $_SESSION['message'] = randomMsg($updateMsg);
        header('location: home.php');
    } else {
        print_r($db->errorInfo());
    }
}

function checkedNote()
{
    global $clearMsg;
    global $undoMsg;
    global $db;
    global $id;
    $tickedNote = 0;
    $getChecked = 'SELECT * FROM notes WHERE noteID = :id';
    $getstmt = $db->prepare($getChecked);
    $getstmt->bindParam(':id', $id);
    $getstmt->execute();
    $getResult = $getstmt->fetch();

    if ($getResult['checked'] == Null) {
        $_SESSION['message'] = randomMsg($clearMsg);
        $tickedNote = 1;
    } elseif ($getResult['checked'] == 1) {
        $_SESSION['message'] = randomMsg($undoMsg);
        $tickedNote = NULL;
    }

    $query = 'UPDATE notes SET checked = :checked WHERE noteID = :id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':checked', $tickedNote);
    $stmt->bindValue(':id', $id);
    if ($stmt->execute()) {

        header('location: home.php');
    } else {
        print_r($db->errorInfo());
    }
}

function deleteNote()
{
    global $db;
    global $id;
    $query = 'DELETE FROM notes WHERE noteID =:id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Note was sucessfully deleted';
        header('location: home.php');
    } else {
        print_r($db->errorInfo());
    }
}

function randomMsg($msgArray)
{
    $randomNum = rand(0, 2);
    $randomMsg = $msgArray[$randomNum];
    return $randomMsg;
}
