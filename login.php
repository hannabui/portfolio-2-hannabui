<?php
    include("security.php");
    ?>

    <html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
    <?php 
    if(!security_loggedIn()) {
    ?>
    <form action="login.php" method="POST">   
                <input type="text" placeholder="Username" name="username">

                <input type="password" placeholder="Password" name="password">
                
                <button type="submit">Submit</button>
    </form>
    <?php
    echo("<a href='index.php'>Index</a><br><br>");
    } else {
        echo("You have logged in. ");
        echo("<br><a href='logout.php'>Logout</a>");
        echo("<br><a href='index.php'>Index</a><br><br>"); }
    ?>
    
    <?php
    security_login();
    ?>

    </body>
    </html>