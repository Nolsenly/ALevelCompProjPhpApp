<?php
#  unset($_SESSION["LGIN"]);
#  unset($_SESSION["LIID"]);
#  unset($_SESSION["LIUN"]);
#  unset($_SESSION["Err"]);
#  unset($_SESSION["RErr"]);
  session_start();
  session_destroy();
  header("location: LandingPage.php");
?>
