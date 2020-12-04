<?php

require_once 'databaseconfig.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// $password = 'password123';
// $hashedpass = password_hash($password, PASSWORD_DEFAULT);
// $stmt = $conn->query("INSERT INTO User(password,email) VALUES ('$hashedpass','admin@project2.com');");

if ($_SERVER['REQUEST_METHOD']==='POST'){
    $f_name = filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING);
    $l_name = filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING);
    $pass_word = $_POST['password'];
    $hashedpass2 = password_hash($pass_word, PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    
    if(empty($f_name)||empty($l_name) ||empty($pass_word) ||empty($email)){
        echo 'Please Enter Data in All Fields';
        // exit();
    }
    //regex for email
    //check email 
    //rmbr check regex for email
    
    $stmt = $conn->query("INSERT INTO User(firstname,lastname,password,email) VALUES ('$f_name','$l_name','$hashedpass2','$email');");
}
// // remove all session variables
// session_unset();

// // destroy the session
// session_destroy();


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
            <form method="POST" action="http://localhost/info2180-project2/PHP/adduser.php">
                <h2>New User</h2>
                <label>Firstname</label>
                <input type="text" name="firstname" id="firstname" required>
                <label>Lastname</label>
                <input type="text" name="lastname" id="lastname" required>
                <label>Password</label>
                <input type="password" name="password" id="password" required>
                <label>Email</label>
                <input type="email" name="email" id="email" required>
                <button value="submit"> Submit</button>
            </form>
        </aside>
    </div>
    <!-- </div> -->
</body>

</html>