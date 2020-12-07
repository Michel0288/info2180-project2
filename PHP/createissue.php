<?php
    session_start();
    require_once 'databaseconfig.php';
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt=$conn->query("SELECT firstname,lastname  FROM Users;");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $user=htmlspecialchars($_SESSION['person']);
    $stmtt=$conn->query("SELECT id FROM Users WHERE email='$user';");
    $getid_currentuser=$stmtt->fetchAll(PDO::FETCH_ASSOC);

    foreach($getid_currentuser as $data){
        $storeid_current=htmlspecialchars($data['id']);
    }
if(!empty($_POST['title']) && !empty($_POST['type'])&& !empty($_POST['priority'])&& !empty($_POST['assigned'])){
    if($_SERVER['REQUEST_METHOD']==='POST'){ 
        $title = htmlspecialchars(filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING));
        $description = htmlspecialchars(filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING));
        $type = htmlspecialchars(filter_input(INPUT_POST,'type',FILTER_SANITIZE_STRING));
        $priority = htmlspecialchars(filter_input(INPUT_POST,'priority',FILTER_SANITIZE_STRING));
        $assigned = htmlspecialchars(filter_input(INPUT_POST,'assigned',FILTER_SANITIZE_STRING));

        $splitname = preg_split('/\s+/', $assigned);
        $first= $splitname[0];
        $last= $splitname[1];
        $stmttt=$conn->query("SELECT id FROM Users WHERE firstname='$first' AND lastname='$last';");
        $getassignedid=$stmttt->fetchAll(PDO::FETCH_ASSOC);
        foreach($getassignedid as $data){
            $storeassigned=htmlspecialchars($data['id']);
        }
        $stmt2 = $conn->query("INSERT INTO Issues (title,description,type,priority,status,assigned_to,created_by) VALUES ('$title','$description','$type','$priority','Open','$storeassigned','$storeid_current');");
    }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO2180 Lab 2</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <script src="../JS/createissues.js"></script>
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
            <form method="POST" action="http://localhost/info2180-project2/PHP/createissue.php">
                <h2>Create Issue</h2>
                <label>Title</label>
                <input type="text" name="title" id="title" required>
                <label>Description</label>
                <textarea type="text" name="description" id="description" required></textarea>
                <label>Assigned To</label>
                <select name="assigned" id="assigned" required>
                <?php foreach($results as $options):?>
                    <option ><?= $options['firstname']," ",$options['lastname']; ?></option>
                <?php endforeach; ?>
                </select>
                <label>Type</label>
                <select name="type">
                    <option value="Bug">Bug</option>
                    <option value="Proposal">Proposal</option>
                    <option value="Task">Task</option>
                </select>
                <label>Priority</label>
                <select name="priority">
                    <option value="Minor">Minor</option>
                    <option value="Major">Major</option>
                    <option value="Critical">Critical</option>
                </select>
                <button value="submit"> Submit</button>
            </form>
        </aside>
    </div>
</body>
</html>