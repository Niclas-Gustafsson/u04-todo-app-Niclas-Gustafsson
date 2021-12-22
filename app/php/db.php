<?php 
// Insert db connection
try {
    $db = new PDO('mysql:host=mariadb;dbname=thapp', 'testUser', 'test1234');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    if($db) {
        // echo 'Connected to the database';

    }
} catch (PDOException $e) {
    echo $e->getMessage();
}


?>