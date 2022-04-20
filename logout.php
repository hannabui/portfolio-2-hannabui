<?php
  include("security.php");
  security_logout();
  echo("You've logged out. ");
?>
<a href="index.php">Index</a>