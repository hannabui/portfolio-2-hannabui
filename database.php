<?php
    // Global connection
    $connection = null;

    function database_connect() {
        // Use the global connection
        global $connection;

        // Server
        $server = "localhost";
        // Username
        $username = "root";
        // If using XAMPP, 
        //  the password is an empty string.
        $password = "";
        $email = "";
        $number = "";
        // Database
        $database = "portfolio";
        $database = "addOns";

        if($connection == null) {
            $connection = mysqli_connect($server, $username, $password, $email, $number, $database);
        }
    }
//ADD USER AND PASSWORD
    function database_addUser($username, $password) {
        // Use the global connection
        global $connection;

        if($connection != null) {
            // Overwrite the existing password value as a hash
            $password = password_hash($password, PASSWORD_DEFAULT);
            // Insert username and hashed password
            mysqli_query($connection, "INSERT INTO users (username, password) VALUES ('{$username}', '{$password}');");
        }
    }
//ADD EMAIL AND NUMBER
    function database_addEmail($email, $number) {
        global $connection;

        if($connection != null) {
            mysqli_query($connection, "INSERT INTO addInfo (email, number) VALUES ('{$email}', '{$number}');");
        }
    }
//VERIFY USER AND PASSWORD
    function database_verifyUser($username, $password) {
        // Use the global connection
        global $connection;

        // Create a default value
        $status = false;

        if($connection != null) {
            // Use WHERE expressions to look for username
            $results = mysqli_query($connection, "SELECT password FROM users WHERE username = '{$username}';");
            
            // mysqli_fetch_assoc() returns either null or row data
            $row = mysqli_fetch_assoc($results);
            
            // If $row is not null, it found row data.
            if($row != null) {
                // Verify password against saved hash
                if(password_verify($password, $row["password"])) {
                    $status = true;
                }
            }
        }
        return $status;
    }
//VERIFY EMAIL AND NUMBER
    function database_verifyEmail($email, $number) {
        // Use the global connection
        global $connection;

        // Create a default value
        $status = false;

        if($connection != null) {
            // Use WHERE expressions to look for username
            $results = mysqli_query($connection, "SELECT number FROM addInfo WHERE email = '{$email}';");
            
            // mysqli_fetch_assoc() returns either null or row data
            $row = mysqli_fetch_assoc($results);
            
            // If $row is not null, it found row data.
            if($row != null) {
                // Verify password against saved hash
                if(number_verify($number, $row["number"])) {
                    $status = true;
                }
            }
        }
        return $status;
    }

//DELETE USER AND PASSWORD
    function database_deleteUser($username, $password) {
        //using the global connection
        global $connection;
        //verifying if the data exists before changing it
            if(database_verifyUser($username, $password)) {
        //DELETE statement with a WHERE expression to remove the username from the table 'users'
                mysqli_query($connection, "DELETE FROM users WHERE username = '{$username}';");
        }
    }
//UPDATE PASSWORD
    function database_updatePassword($username, $password, $newPassword) {
        //using the global connection
        global $connection;
        //verifying if the data exists before changing it
            if(database_verifyUser($username, $password)) {
            //creating a new hash for the new password
                $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            //UPDATE statement with a WHERE expression to update the password hash to the table 'users'
                mysqli_query($connection, "UPDATE users SET password = '{$newPassword}' WHERE username = '{$username}';");
    }
}
//EDIT EMAIL
    function database_editEmail($email, $number, $newEmail, $newNumber) {
        global $connection;
        if(database_verifyEmail($email, $number)) {
            mysqli_query($connection, "UPDATE addInfo SET email = '{$newEmail}' WHERE addInfo = '{$email}'; ");
            mysqli_query($connection, "UPDATE addInfo SET number = '{$newNumber}' WHERE addInfo = '{$number}'; ");
        }
    }
//EDIT NUMBER
    function database_editNumber($number, $newNumber) {
        global $connection;
        if(database_verifyEmail($number)) {
            mysqli_query($connection, "UPDATE addInfo SET number = '{$newNumber}' WHERE addInfo = '{$number}'; ");
        }
    }

    function database_close() {
        // user global connection
        global $connection;

        if($connection != null) {
            mysqli_close($connection);
        }
    }
?>