<?php
    include("security.php");
    ?>

    <html>
    <head>
        <title>Remove</title>
    </head>
    <body>
        <h2>Remove Existing Username & Password</h2>

    <?php
        if(security_loggedIn()) {
    ?>
        <h4>Enter Existing Username & Password to Delete</h4>
        <form action="remove.php" method="POST">   
                    <input type="text" placeholder="Username" name="username">

                    <input type="password" placeholder="Password" name="password">

                    <input type="text" placeholder="Email" name="email">

                    <input type="text" placeholder="Phone Number" name="number">
                    
                    <button type="submit">Submit</button>
        </form>
    <?php
    echo("<a href='index.php'>Index</a><br><br>");
        } else {
            echo("<a href='signup.php'>Signup</a><br><br>"); }
    ?>

    <?php
    security_deleteUser();
    ?>
    </body>
    </html>