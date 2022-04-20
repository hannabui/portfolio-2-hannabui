<?php
    include("database.php");

    function security_validate() {
        // Set a default value
        $status = false;
        
        // Validate
        if(isset($_POST["username"]) and isset($_POST["password"])) {
            $status = true;
        }

        return $status;
    }

    function security_login() {
        // Set a default value
        $status = false;
        // Validate and sanitize
        $result = security_sanitize();
        // Open connection
        database_connect();
        // Use the connection
        $status = database_verifyUser($result["username"], $result["password"]);
        // Close connection
        database_close();
        // Check status
        if($status) {
            // Set a cookie
            setcookie("login", "yes");
        }
    }

    function security_addNewUser() {
        // Validate and sanitize.
        $result = security_sanitize();
        // Open connection.
        database_connect();

        // Use connection.
        //
        // We want to make sure we don't add
        //  duplicate values.
        if(!database_verifyUser($result["username"], $result["password"])) {
            // Username does not exist.
            // Add a new one.
            database_addUser($result["username"], $result["password"]);
        }
        
        // Close connection.
        database_close();
    }

    //validate POST input, sanitize, call deleteUser function
    function security_deleteUser() {
        $result = security_sanitize();
        
        if(database_verifyUser($result["username"], $result["password"])) {
            database_connect();

            database_deleteUser($result["username"], $result["password"]);
            database_close();
        }
    }
    //validate POST input, sanitize, call updatePassword function
    function security_updatePassword() {
        $result = security_sanitize();
        
        if(isset($POST["newPassword"]) and $result["username"] != null and $result["password"] != null) {
            $newPassword = htmlspecialchars($_POST["newPassword"]);
            database_connect();

            database_updatePassword($result["username"], $result["password"], $newPassword);

            database_close();
        }
    }

    function security_loggedIn() {
        // Does a cookie exist?
        return isset($_COOKIE["login"]);
    }

    function security_logout() {
        // Set a cookie to the past
        setcookie("login", "yes", time() - 10);
    }

    function security_sanitize() {
        // Create an array of keys username and password
        $result = [
            "username" => null,
            "password" => null
        ];

        if(security_validate()) {
            // After validation, sanitize text input.
            $result["username"] = htmlspecialchars($_POST["username"]);
            $result["password"] = htmlspecialchars($_POST["password"]);
        }

        // Return array
        return $result;
    }
?>