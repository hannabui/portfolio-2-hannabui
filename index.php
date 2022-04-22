
<?php 
include("security.php");
?>
<html>
<head>
<title>Index Page</title>
</head>

<body>
    <h1>INDEX</h1>

    <?php 
        if(security_loggedIn()) {
        echo("Update or Remove existing account ");
        echo("<br><br><a href='remove.php'>Remove Existing Account</a><br><br>");
        echo("<a href='updatePassword.php'>Update Password</a>");
        echo("<a href='updateEmail.php'>Update Email</a>");
        echo("<a href='updateNumber.php'>Update Number</a>");
        echo("<br><br><a href='logout.php'>Logout</a>");
       } else {
        echo("Login or Signup");
        echo("<br><br><a href='login.php'>Login</a><br><br>");
        echo("<a href='signup.php'>Signup</a>"); }
    ?>

    <?php security_login(); ?>
</body>
</html>