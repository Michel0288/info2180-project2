<?php
session_start();


$query=htmlspecialchars($_GET['query']);
require_once 'databaseconfig.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$stmt=$conn->query("SELECT id,title,created_by,created,updated,type,description,assigned_to,priority,status FROM Issues WHERE id='$query';");
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($results as $data){
    $assigned_user=htmlspecialchars($data['assigned_to']);
}

foreach($results as $data){
    $dates=$data['created'];
    $date = strtotime($dates); 
    $dateformated=date('F d, Y ', $date); 
    $times=$data['created'];
    $time = strtotime($times); 
    $timeformated=date('g:iA', $time); 
}


foreach($results as $data){
    $dates2=$data['updated'];
    $date2 = strtotime($dates2); 
    $dateformated2=date('F d, Y ', $date2); 
    $times2=$data['updated'];
    $time2 = strtotime($times2); 
    $timeformated2=date('g:iA', $time2); 
}

$stmtt=$conn->query("SELECT firstname, lastname FROM Users WHERE Users.id='$assigned_user';");
$results2=$stmtt->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $data){
    $created_by=htmlspecialchars($data['created_by']);
}
$stmt=$conn->query("SELECT firstname, lastname FROM Users WHERE id='$created_by';");
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $data){
    $fname=htmlspecialchars($data['firstname']);
    $lname=htmlspecialchars($data['lastname']);

}
if(isset($_POST['closed'])){
    $stmt3=$conn->query("UPDATE  Issues SET status='Closed' WHERE id='$query';");
    $stmt = $conn->query("UPDATE  Issues SET updated=NOW() WHERE id='$query';");

}
if(isset($_POST['progress'])){
    $stmt3=$conn->query("UPDATE  Issues SET status='In Progress' WHERE id='$query';");
    $stmt = $conn->query("UPDATE  Issues SET updated=NOW() WHERE id='$query';");

}
?>
<!DOCTYPE html>
<html lang="en">


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
            <p><a href="../PHP/issues.php">Home</a></p>


            <img class="bol" src="../IMAGES/user.png" alt="user">
            <p><a href="../PHP/adduser.php">Add User</a></p>

            <img class="bol" src="../IMAGES/plus.svg" alt="issue">
            <p><a href="../PHP/createissue.php">New Issue</a></p>


            <img class="bol" src="../IMAGES/logout.png" alt="logout">
            <p><a href="../PHP/logout.php">Logout</a></p>
        </main>
    </div>

    <div class="bodyGrid">
        <aside>

            <?php foreach ($results as $data): ?>
            <h2 class="h2heading"><?= $data['title']; ?></h2>
            <h3>ISSUE # <?= $data['id']; ?></h3>
          
            <div class="message">
                <p><?= $data['description']; ?></p>
                <ul>
                    <li> <p> Issue created on <?= $dateformated; ?> at <?= $timeformated; ?> by <?= $fname,' ',$lname; ?></p> </li> <!-- Actual date time and person must go here so edit this -->
                    <li> <p> Last updated on <?= $dateformated2; ?> at <?= $timeformated2; ?></p> </li> <!-- Actual data and time must go here so edit this --> 
                </ul>
                <?php endforeach; ?>  
            </div>
            <div class=side>
                <div class="insidemessage">
                    <div class="info">
                    <label>Assigned To</label>
                    <?php foreach ($results2 as $data): ?>
                    <p><?= $data['firstname'],' ',$data['lastname']; ?></p> <!-- Actual Person must go here so edit this -->
                    <?php endforeach; ?>  
                    <label>Type:</label>
                    <?php foreach ($results as $data): ?>
                    <p><?= $data['type']; ?></p> <!-- Actual type must go here so edit this -->
                    <label>Priority:</label>
                    <p><?= $data['priority']; ?></p> <!-- Actual Priority must go here so edit this -->
                    <label>Status:</label>
                    <p><?= $data['status']; ?></p> <!-- Actual Status must go here so edit this -->
                    <?php endforeach; ?>  
                <form action="../PHP/xssuserform.php?query=<?= $query?>" method="POST">
                    </div>
                        <div class="infobuttons">
                        <button class="btn1" name ="closed" value="submit">Mark as Closed</button>
                        <button class="btn2" name="progress" value="submit">Mark In Progress</button>
                        </div> 
                    </div>
                </form>
          </div>

</html>