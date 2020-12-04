<?php
require_once 'databaseconfig.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $title = $_POST['title'];
    $idNum = $_POST['id'];
    $typeOfIssue = $_POST['type'];
    $status = $_POST['status'];
    $firstname = $_POST['firstname'];
    $lastname=$_POST['lastname'];
    $created=$_POST['created'];

    $stmt=$conn->query("INSERT INTO User(title,id,type,status,firstname,lastname,created) VALUES ('$title','$idNum','$username','$type','$status','$firstname','$lastname','$created')");
}

    
?>