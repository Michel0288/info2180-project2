<?php 
session_start();
require_once 'databaseconfig.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if($_SERVER['REQUEST_METHOD']==='POST'){ 
    $user_email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $user_password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);

    $stmt=$conn->query("SELECT password FROM User where email='$user_email';");
    $resultpass=$stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultpass as $data){
        $hashedpss=$data['password'];
        if(password_verify($user_password,$hashedpss)){
        echo '<script type="text/JavaScript">  alert("SUCCESS"); </script>' ; 
        $_SESSION['person']=$user_email;
        echo $_SESSION['person'];
        header("refresh:0;url= ../PHP/issues.php");
        }else{
            echo 'Fail';
        }
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
    <script src="../JS/login.js"></script>
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
            <!-- <img class="bol" src="../IMAGES/home.png" alt="home">
            <p>Home</p>


            <img class="bol" src="../IMAGES/user.png" alt="user">
            <p>Add User</p>


            <img class="bol" src="../IMAGES/plus.svg" alt="issue">
            <p>New Issue</p>


            <img class="bol" src="../IMAGES/logout.png" alt="logout">
            <p>Logout</p> -->
        </main>
    </div>

    <div class="bodyGrid">
        <aside>
        <form method="POST" action="http://localhost/info2180-project2/PHP/login.php">
                   <a href="adduser.php">Add user</a>
                    <h2>User Login</h2>
                    <label>Email</label>
                    <input type="email" name="email" id="email" required>
                    <label>Password</label>
                    <input type="password" name="password" id="password" required>
                    <button value="submit" > Submit</button>
                </form>
        </aside>
    </div>
    <!-- </div> -->
</body>

</html>