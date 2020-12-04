<?php
// session_start();
require_once 'databaseconfig.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if($_SERVER['REQUEST_METHOD']==='POST'){ 
    $user_email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $user_password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);

    $stmt=$conn->query("SELECT password FROM User where email='$user_email';");
    $resultpass=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultpass as $data){
        $hashedpss=$data['password'];
        // echo $hashedpss;
        if(password_verify($user_password,$hashedpss)){
            echo 'Success';
        }else{
            echo 'Fail';
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>INFO2180 PROJECT</title>
    <link rel="stylesheet" href="styles.css" />
    <!-- <script src="tic-tac-toe.js"></script> -->
</head>

<body>
    <div class="MainBody">
        <div class ="headerDiv">
            <header>
                <img class="new1" src="download.png" alt="pic">
                <h1>BugMe Issue Tracker</h1>
            </header>
        </div>
        <div class="left">
            <aside>
                <div id=asideright>

                    <img class="bol" src="home.png" alt="home">
                    <p>Home</p>


                    <img class="bol" src="user.png" alt="user">
                    <p>Add User</p>


                    <img class="bol" src="plus.svg" alt="issue">
                    <p>New Issue</p>


                    <img class="bol" src="logout.png" alt="logout">
                    <p>Logout</p>
            </aside>
        </div>
        <div id=asideleft>
            <main>
                <form method="POST" action="http://localhost/info2180-project2/login.php">
                    <h2>User Login</h2>
                    <label>Email</label>
                    <input type="email" name="email" id="email" required>
                    <label>Password</label>
                    <input type="password" name="password" id="password" required>
                    <button value="submit" > Submit</button>
                </form>
            </main>
        </div>
    </div>
</body>

</html>