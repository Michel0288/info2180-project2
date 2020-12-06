<?php
session_start();
echo $_SESSION['person'];

$query=$_GET['query'];
require_once 'databaseconfig.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$stmt=$conn->query("SELECT id,title,created_by,created,type,description,assigned_to,priority,status FROM ISSUES WHERE id='$query';");
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($results as $data){
    $assigned_user=$data['assigned_to'];
    // echo $assigned_user;
}

foreach($results as $data){
    $dates=$data['created'];
    $date = strtotime($dates); 
    $dateformated=date('F d, Y ', $date); 
    $times=$data['created'];
    $time = strtotime($times); 
    $timeformated=date('g:iA', $time); 

}

$stmtt=$conn->query("SELECT firstname, lastname FROM User WHERE User.id='$assigned_user';");
$results2=$stmtt->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $data){
    $created_by=$data['created_by'];
}
$stmt=$conn->query("SELECT firstname, lastname FROM User WHERE id='$created_by';");
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $data){
    $fname=$data['firstname'];
    $lname=$data['lastname'];

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
    <!-- <div class="container"> -->
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
                    <li> <p> Last updated on November 8, 2019 at 10:00AM</p> </li> <!-- Actual data and time must go here so edit this --> 
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
                </div>
                    <div class="infobuttons">
                    <button class="btn1" value="submit">Mark as Closed</button>
                    <button class="btn2" value="submit">Mark In Progress</button>
                    </div> 
                </div>
          </div>

</html>