<?php
session_start();
echo $_SESSION['person'];
require_once 'databaseconfig.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$stmt=$conn->query("SELECT User.firstname, User.lastname,ISSUES.id,ISSUES.title,ISSUES.type,ISSUES.status,ISSUES.created FROM User INNER JOIN ISSUES ON User.id=ISSUES.assigned_to;");
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST['ALL'])){
    //ALL
    $stmt=$conn->query("SELECT User.firstname, User.lastname,ISSUES.id,ISSUES.title,ISSUES.type,ISSUES.status,ISSUES.created FROM User INNER JOIN ISSUES ON User.id=ISSUES.assigned_to;");
    $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //ALL
}


if(isset($_POST['TICKETS'])){
//SPECIFIC USER
$user=$_SESSION['person'];
$stmtt=$conn->query("SELECT id FROM User WHERE email='$user';");


$getid_currentuser=$stmtt->fetchAll(PDO::FETCH_ASSOC);

foreach($getid_currentuser as $data){
    $storeid_current=$data['id'];

}

$stmt=$conn->query("SELECT User.firstname, User.lastname,ISSUES.id,ISSUES.title,ISSUES.type,ISSUES.status,ISSUES.created FROM User INNER JOIN ISSUES ON User.id=ISSUES.assigned_to WHERE User.id='$storeid_current';");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//SPECIFIC USER
}


if(isset($_POST['OPEN'])){
//OPEN 
$stmt=$conn->query("SELECT User.firstname, User.lastname,ISSUES.id,ISSUES.title,ISSUES.type,ISSUES.status,ISSUES.created FROM User INNER JOIN ISSUES ON User.id=ISSUES.assigned_to WHERE ISSUES.status='Open';");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//OPEN
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
            <h2>Issues</h2>
            <a href="../PHP/createissue.php" class="createIssueButton">Create New Issue</a>
            <div class="filterOptions">
                <p>Filter by:</p>
                <form action="../PHP/issues.php" method="POST">
                    <input type="submit" name="ALL" value="ALL ">
                    <input type="submit" name="OPEN" value="OPEN">
                    <input type="submit" name="TICKETS" value="MY TICKETS">
                </form>

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

                    <?php foreach ($results as $data): ?>
                        <tr>
                            <td><?= $data['id'];?><a href="../PHP/xssuserform.php?query=<?= $data['id']?>"><?=$data['title'];?></a></td>
                            <td><?= $data['type']; ?></td>
                            
                            <td id = "change"><?= $data['status']; ?></td>
                            <td><?= $data['firstname']," ",$data['lastname']; ?></td>
                            <td><?= date('j-m-Y ',strtotime($data['created'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                
                      
                </table>
            </div>
                
        </aside>
    </div>
</body>

</html>