<?php
    include("database.php");

    function security_validate() {
        // Set a default value
        $status = false;
        
        // Validate
        if(isset($_POST["username"]) and isset($_POST["password"]) and isset($_POST["email"]) and isset($_POST["number"])) {
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
        $status = database_verifyUser($result["username"], $result["password"], $result["email"], $result["number"]);
        // Close connection
        database_close();
        // Check status
        if($status) {
            // Set a cookie
            setcookie("login", "yes");
        }
    }

    function security_addNewUser() {
       
        $result = security_sanitize();
      
        database_connect();

        if(!database_verifyUser($result["username"], $result["password"], $result["email"], $result["number"])) {
     
            database_addUser($result["username"], $result["password"], $result["email"], $result["number"]);
        }
        
        database_close();
    }
//delete account
    function security_deleteUser() {
        $result = security_sanitize();

        database_connect();

        database_deleteUser($result["username"], $result["password"], $result["email"], $result["number"]);

        database_close();

    }
    function security_deleteEmail() {
        $result = security_sanitize();

        database_connect();

        database_deleteEmail($result["email"]);

        database_close();

    }
    function security_deleteNumber() {
        $result = security_sanitize();

        database_connect();

        database_deleteNumber($result["number"]);

        database_close();

    }
//update password by verifying current password
    function security_updatePassword() {
        $result = security_sanitize();
        
        database_connect();
        if(database_verifyUser($result["username"], $result["password"], $result["email"], $result["number"])) {

            database_updatePassword($result["username"], $result["password"], $_POST["newPassword"]);
        }
            database_close();
    }
    function security_updateEmail() {
        $result = security_sanitize();
        
        database_connect();

            database_updateEmail($result["username"], $result["email"], $_POST["newEmail"]);
        
            database_close();
    }
    function security_updateNumber() {
        $result = security_sanitize();
        
        database_connect();
    
            database_updateNumber($result["username"], $result["number"], $_POST["newNumber"]);
    
            database_close();
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
            "password" => null,
            "email" => null,
            "number" => null
        ];

        if(security_validate()) {
            // After validation, sanitize text input.
            $result["username"] = htmlspecialchars($_POST["username"]);
            $result["password"] = htmlspecialchars($_POST["password"]);
            $result["email"] = htmlspecialchars($_POST["email"]);
            $result["number"] = htmlspecialchars($_POST["number"]);
        }

        // Return array
        return $result;
    }
?>