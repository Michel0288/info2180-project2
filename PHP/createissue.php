<?php
    session_start();
    require_once 'databaseconfig.php';
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    echo $_SESSION['person'];
    $stmt=$conn->query("SELECT firstname,lastname  FROM User;");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $user=$_SESSION['person'];
    $stmtt=$conn->query("SELECT id FROM User WHERE email='$user';");
 

    $getid_currentuser=$stmtt->fetchAll(PDO::FETCH_ASSOC);

    foreach($getid_currentuser as $data){
        $storeid_current=$data['id'];
   
    }
    if($_SERVER['REQUEST_METHOD']==='POST'){ 
        

        $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING);
        
        $type = $_POST['type'];
        $priority = $_POST['priority'];
        $assigned = $_POST['assigned'];

        $splitname = preg_split('/\s+/', $assigned);
        $first= $splitname[0];
        $last= $splitname[1];
        echo $first;
        echo $last;

        $stmttt=$conn->query("SELECT id FROM User WHERE firstname='$first' AND lastname='$last';");

        $getassignedid=$stmttt->fetchAll(PDO::FETCH_ASSOC);

        foreach($getassignedid as $data){
            $storeassigned=$data['id'];
            echo $storeassigned;
        }
        $stmt2 = $conn->query("INSERT INTO ISSUES (title,description,type,priority,status,assigned_to,created_by) VALUES ('$title','$description','$type','$priority','Open','$storeassigned','$storeid_current');");

    }





    // echo $user;



    // $stmt=$conn->query("SELECT password FROM User where email='$user_email';");
    // $stmt=$conn->query("SELECT firstname,lastname  FROM User WHERE email="$user";");

    
    // $stmt = $conn->query("INSERT INTO User(firstname,lastname,password,email) VALUES ('$f_name','$l_name','$hashedpass2','$email');");
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
    <!-- </div> -->
</body>

</html>