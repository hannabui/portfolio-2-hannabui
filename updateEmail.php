<?php
    include("security.php");
    ?>

    <html>
    <head>
        <title>Update Email</title>
    </head>
    <body>
        
    <?php
        if(security_loggedIn()) {
    ?>
        <h2>Update Email</h2>
        <form action="updateEmail.php" method="POST">   
                <input type="text" placeholder="Username" name="username">

                <input type="text" placeholder="Current Email" name="email">

                <input type="text" placeholder="New Email" name="newEmail"><br/>
                    
                <button type="submit">Submit</button>
        </form>
    <?php
    echo("<a href='index.php'>Index</a><br><br>");
    } else {
        echo("<a href='signup.php'>Signup</a><br><br>"); }
    ?>


    <?php 
    security_updateEmail();
    ?>
    </body>
    </html>