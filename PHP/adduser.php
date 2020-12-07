<?php
session_start();
require_once 'databaseconfig.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$p_regex="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
$emailtest = "/.{1,}@[^.]{1,}/";
if ($_SESSION['person']=='admin@project2.com'){
    if(!empty($_POST['firstname'])||!empty($_POST['lastname']) ||!empty($_POST['password']) ||!empty($_POST['email'])){
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            if (preg_match ($p_regex, $_POST['password']) && preg_match ($emailtest, $_POST['email']) ){
                $f_name = htmlspecialchars(filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING));
                $l_name = htmlspecialchars(filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING));
                $pass_word = htmlspecialchars(filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING));
                $hashedpass2 = password_hash($pass_word, PASSWORD_DEFAULT);
                $email = htmlspecialchars(filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL));             
                $stmt = $conn->query("INSERT INTO Users(firstname,lastname,password,email) VALUES ('$f_name','$l_name','$hashedpass2','$email');");
            }
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
    <script src="../JS/adduser.js"></script>
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
</body>
</html>