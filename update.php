<?php
    include("security.php");
    ?>

    <html>
    <head>
        <title>Login</title>
    </head>
    <body>
        
    <?php
        if(security_loggedIn()) {
    ?>
        <h2>Update Password</h2>
        <form action="update.php" method="POST">   
                <input type="text" placeholder="Username" name="username">

                <input type="password" placeholder="Current Password" name="password">

                <input type="password" placeholder="New Password" name="newPassword">

                <input type="text" placeholder="Current Email" name="email">

                <input type="text" placeholder="New Email" name="newEmail">

                <input type="text" placeholder="Current Number" name="number">

                <input type="text" placeholder="New Phone Number" name="newNumber">
                    
                <button type="submit">Submit</button>
        </form>
    <?php
    echo("<a href='index.php'>Index</a><br><br>");
    } else {
        echo("<a href='signup.php'>Signup</a><br><br>"); }
    ?>


    <?php 
    security_updatePassword();
    security_editEmail();
    security_editNumber();
    ?>
    </body>
    </html>