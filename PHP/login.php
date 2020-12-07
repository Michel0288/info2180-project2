<?php 
session_start();
require_once 'databaseconfig.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
if(isset($_POST['email']) && isset($_POST['password'])){
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        if($_SERVER['REQUEST_METHOD']==='POST'){ 
            $user_email = htmlspecialchars(filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL));
            $user_password = htmlspecialchars(filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING));
            $stmt=$conn->query("SELECT password FROM Users where email='$user_email';");
            $resultpass=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultpass as $data){
                $hashedpss=$data['password'];
                if(password_verify($user_password,$hashedpss)){
                echo '<script type="text/JavaScript">  alert("LOGIN SUCCESSFUL"); </script>' ; 
                $_SESSION['person']=$user_email;
                header("refresh:0;url= ../PHP/issues.php");
                }else{
                    echo 'PASSWORD VERIFICATION FAILED';
                }
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
    <script src="../JS/login.js"></script>
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
        </main>
    </div>

    <div class="bodyGrid">
        <aside>
        <form method="POST" action="../PHP/login.php">
                    <h2>User Login</h2>
                    <label>Email</label>
                    <input type="email" name="email" id="email" required>
                    <label>Password</label>
                    <input type="password" name="password" id="password" required>
                    <button value="submit" > Submit</button>
                </form>
        </aside>
    </div>
</body>
</html>