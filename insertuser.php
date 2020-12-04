<?php

    require_once 'databaseconfig.php';
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $password='password123';
    $hashedpass=password_hash($password, PASSWORD_DEFAULT);
    $stmt=$conn->query("INSERT INTO User(password,email) VALUES ('$hashedpass','admin@project2.com');");

?>