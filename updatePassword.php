<?php
    include("security.php");
    ?>

    <html>
    <head>
        <title>Update Password</title>
    </head>
    <body>
        
    <?php
        if(security_loggedIn()) {
    ?>
        <h2>Update Password</h2>
        <form action="updatePassword.php" method="POST">   
                <input type="text" placeholder="Username" name="username">

                <input type="password" placeholder="Current Password" name="password">

                <input type="password" placeholder="New Password" name="newPassword"><br/>
                    
                <button type="submit">Submit</button>
        </form>
    <?php
    echo("<a href='index.php'>Index</a><br><br>");
    } else {
        echo("<a href='signup.php'>Signup</a><br><br>"); }
    ?>


    <?php 
    security_updatePassword();
    ?>
    </body>
    </html>