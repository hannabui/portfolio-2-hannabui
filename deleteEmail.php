<?php
    include("security.php");
    ?>

    <html>
    <head>
        <title>Remove</title>
    </head>
    <body>
        <h2>Delete Email</h2>

    <?php
        if(security_loggedIn()) {
    ?>
        <h4>Enter Username and Email to delete Email</h4>
        <form action="deleteEmail.php" method="POST">   
                    <input type="text" placeholder="Username" name="username">

                    <input type="text" placeholder="Email" name="email">
                    
                    <button type="submit">Submit</button>
        </form>
    <?php
    echo("<a href='index.php'>Index</a><br><br>");
        } else {
            echo("<a href='signup.php'>Signup</a><br><br>"); }
    ?>

    <?php
    security_deleteEmail();
    ?>
    </body>
    </html>