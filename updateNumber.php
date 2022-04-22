<?php
    include("security.php");
    ?>

    <html>
    <head>
        <title>Update Phone Number</title>
    </head>
    <body>
        
    <?php
        if(security_loggedIn()) {
    ?>
        <h2>Update Phone Number</h2>
        <form action="updateNumber.php" method="POST">   
                <input type="text" placeholder="Username" name="username">

                <input type="text" placeholder="Current Number" name="number">

                <input type="text" placeholder="New Phone Number" name="newNumber"><br/>
                    
                <button type="submit">Submit</button>
        </form>
    <?php
    echo("<a href='index.php'>Index</a><br><br>");
    } else {
        echo("<a href='signup.php'>Signup</a><br><br>"); }
    ?>


    <?php 
    security_updateNumber();
    ?>
    </body>
    </html>