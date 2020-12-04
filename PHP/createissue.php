<?php
    session_start();
    echo $_SESSION['person'];
    require_once 'databaseconfig.php';
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    if($_SERVER['REQUEST_METHOD']==='POST'){ 
        $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING);
        
        $type = $_POST['type'];
        $priority = $_POST['priority'];
        $assigned = $_POST['assigned'];
    }

    $stmt = $conn->query("INSERT INTO User(firstname,lastname,password,email) VALUES ('$f_name','$l_name','$hashedpass2','$email');");
    $user=$_SESSION['person'];
    echo $user;

    $stmt=$conn->query("SELECT firstname  FROM User;");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <form method="POST" action="http://localhost/info2180-project2/createissue.php">
                <h2>Create Issue</h2>
                <label>Title</label>
                <input type="text" name="title" id="title" required>
                <label>Description</label>
                <textarea type="text" name="description" id="description" required></textarea>
                <label>Assigned To</label>
                <select name="assigned" id="assigned" required>
                <?php foreach($results as $options):?>
                    <option value="names"><?= $options['firstname']; ?></option>
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
    <!-- </div> -->
</body>

</html>