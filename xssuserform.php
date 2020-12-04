
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO2180 Lab 2</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- <div class="container"> -->
    <div class="headerGrid">
        <header>
            <img class="new1" src="download.png" alt="pic">
            <h1>BugMe Issue Tracker</h1>
        </header>
    </div>

    <div class="asideGrid">
        <main>
            <img class="bol" src="home.png" alt="home">
            <p>Home</p>


            <img class="bol" src="user.png" alt="user">
            <p>Add User</p>


            <img class="bol" src="plus.svg" alt="issue">
            <p>New Issue</p>


            <img class="bol" src="logout.png" alt="logout">
            <p>Logout</p>
        </main>
    </div>

    <div class="bodyGrid">
        <aside>
            <h2>XSS Vulnerability in Add User Form</h2>
            <h3>Tssue #100</h3>

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil odio laborum suscipit assumenda eveniet cupiditate temporibus autem corrupti! Numquam porro in debitis aliquid minima harum sequi fugit fugiat quidem ducimus natus, architecto cumque distinctio, alias ratione, hic vitae incidunt modi doloribus. Esse atque natus, vitae animi nam odit praesentium rerum ullam, qui amet nisi totam tempora non ut! Aliquid non ratione fugit, laborum eum enim labore omnis corporis perferendis quia consectetur doloremque asperiores corrupti laudantium officia nobis delectus facere provident.</p>
        </aside>
            <div class= side>
                <textarea class=""
                <form method="POST" action="http://localhost/info2180-project2/index.php">
                
                <label>Assigned To</label>
                <input type="text" name="assigned" id="assigned" required>
                <label>Type:</label>
                <input type="text" name="type" id="type" required>
                <label>Priority:</label>
                <input type="select" name="priority" id="priority" required>
                <label>Status:</label>
                <input type="text" name="assigned" id="assigned" required>
                
                <button value="submit">Mark as Closed</button>
                <button class="btn" value="submit">Mark In Progress</button>
            </form>
            </div>
    </div>
</body>

</html>