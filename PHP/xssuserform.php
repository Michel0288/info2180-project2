<?php
session_start();
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
            <h2 class="h2heading">XSS Vulnerability in Add User Form</h2>
            <h3>Issue #100</h3>

            <div class="message">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, deserunt! Atque magni maxime repellendus, nulla sit eveniet. Nulla distinctio nobis corrupti illo consequatur similique! Delectus id praesentium est repellat, sequi sed ullam odio consequuntur laborum dolores quisquam iste nostrum aspernatur nesciunt doloribus molestias iusto nobis quibusdam explicabo minus consectetur maiores sapiente? Harum repudiandae culpa neque sed, ratione consequuntur quod illo hic aut delectus, velit necessitatibus perferendis iusto. Et doloremque ut excepturi architecto nihil officiis, aliquam cum, libero voluptas minus rem veritatis. Neque, repellendus ex? Soluta, aspernatur nobis quas similique laudantium est suscipit quibusdam architecto odit saepe magnam doloribus commodi porro eos sint fugiat accusantium molestiae pariatur quaerat nostrum quos ipsa. Doloribus aliquam commodi corrupti nam, asperiores soluta accusantium sapiente iste.</p>
                <ul>
                    <li> <p> Issue created on November 1, 2019 at 4:30PM by Marsha Brady</p> </li> <!-- Actual date time and person must go here so edit this -->
                    <li> <p> Last updated on November 8, 2019 at 10:00AM</p> </li> <!-- Actual data and time must go here so edit this --> 
                </ul>
               
            </div>
            <div class=side>
                <div class="insidemessage">
                    <div class="info">
                    <label>Assigned To</label>
                    <p>Tom Brandy</p> <!-- Actual Person must go here so edit this -->
                    <label>Type:</label>
                    <p>Proposal</p> <!-- Actual type must go here so edit this -->
                    <label>Priority:</label>
                    <p>Major</p> <!-- Actual Priority must go here so edit this -->
                    <label>Status:</label>
                    <p>Open</p> <!-- Actual Status must go here so edit this -->
                    </div>
                    <div class="infobuttons">
                    <button class="btn1" value="submit">Mark as Closed</button>
                    <button class="btn2" value="submit">Mark In Progress</button>
                    </div> 
                </div>
          </div>
</html>