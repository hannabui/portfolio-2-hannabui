<?php
include("security.php");
?>
<html>
  <head>
    <title>Sign Up</title>
  </head>
  <body>
   <h2>Sign Up</h2>
    <?php
    if(!security_loggedIn()) {
    ?>
        <form action="signup.php" method="POST">   

          <input type="text" placeholder="Username" name="username">
          
          <input type="password" placeholder="Password" name="password">

          <input type="text" regex="/^.+@.+\..+$/" placeholder="Email" name="email">

          <input type="text" regex="/^\(\d{3}\) \d{3}-\d{4}$/" placeholder="Phone Number" name="number">
          
          <button type="submit">Submit</button>
        </form>
    <?php
    echo("<a href='index.php'>Index</a><br><br>");
      } else {
        echo("<a href='index.php'>Index</a><br><br>"); }
    ?>

<?php
security_addNewUser();
security_addEmail();
?>
</body>
</html>