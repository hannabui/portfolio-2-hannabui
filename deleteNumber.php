<?php
    include("security.php");
    ?>

    <html>
    <head>
        <title>Delete Number</title>
    </head>
    <body>
        <h2>Delete Phone Number</h2>

    <?php
        if(security_loggedIn()) {
    ?>
        <h4>Enter Username and Phone number to delete Phone number</h4>
        <form action="deleteNumber.php" method="POST">   
                    <input type="text" placeholder="Username" name="username">

                    <input type="text" placeholder="Phone Number" name="number">
                    
                    <button type="submit">Submit</button>
        </form>
    <?php
    echo("<a href='index.php'>Index</a><br><br>");
        } else {
            echo("<a href='signup.php'>Signup</a><br><br>"); }
    ?>

    <?php
    security_deleteNumber();
    ?>
    </body>
    </html>