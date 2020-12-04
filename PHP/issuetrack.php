<?php

require_once 'databaseconfig.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
session_start();
echo $_SESSION['person'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $title = $_POST['title'];
    $idNum = $_POST['id'];
    $typeOfIssue = $_POST['type'];
    $status = $_POST['status'];
    $firstname = $_POST['firstname'];
    $lastname=$_POST['lastname'];
    $created=$_POST['created'];

    $stmt=$conn->query("INSERT INTO User(title,type,status,firstname,lastname,created) VALUES ('$title','$idNum','$username','$type','$status','$firstname','$lastname','$created')");
}

    
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO2180 Lab 2</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>

<body>
 
    <div class="headerGrid">
        <header>
            <img class="new1" src="../IMAGES/download.png" alt="pic">
            <h1>BugMe Issue Tracker</h1>
        </header>
    </div>

    <div class="asideGrid">
        <main>
            <img class="bol" src="../IMAGES/home.png" alt="home">
            <p>Home</p>
            <img class="bol" src="../IMAGES/user.png" alt="user">
            <p>Add User</p>
            <img class="bol" src="../IMAGES/plus.svg" alt="issue">
            <p>New Issue</p>
            <img class="bol" src="../IMAGES/logout.png" alt="logout">
            <p>Logout</p>
        </main>
    </div>

    <div class="bodyGrid">
        <aside>
            <h2>Issues</h2>
            <a href="../PHP/createissue.php" class="createIssueButton">Create New Issue</a>
            <div class="filterOptions">
                <p>Filter by:</p>
                <input type="submit" name="ALL" value="ALL">
                <input type="submit" name="OPEN" value="OPEN">
                <input type="submit" name="MY TICKETS" value="MY TICKETS">
            </div>
            <div>
                <table>
                    <thead>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Created</th>
                    </thead>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button value="submit">OPEN</button></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button type=>OPEN</button></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button value="submit">CLOSED</button></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button value="submit">IN PROGRESS</button></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button class="nbtn" value="submit">IN PROGRESS</button></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
                
        </aside>
    </div>
</body>

</html>