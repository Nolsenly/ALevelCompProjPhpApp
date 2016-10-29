<?php
include_once("connect.php");
session_start();
$regunme = htmlspecialchars($_POST["regusername"]);
$regpword = htmlspecialchars($_POST["regpassword"]);
$regpwordchk = htmlspecialchars($_POST["regpasswordcheck"]);
if ($regpword == $regpwordchk){
  $adus = $conn->prepare("INSERT INTO usertable VALUES ('','$regunme','$regpword',0);");
  $adus->execute();
  unset($_SESSION["RErr"]);
}
else{
  $_SESSION["RErr"] = "Not the same password.";
}
header('Location: /ALevelCompProjPhpApp/Register.php');
?>
