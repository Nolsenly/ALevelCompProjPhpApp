<?php
include_once("connect.php");
session_start();
$regunme = htmlspecialchars($_POST["regusername"]);
$regpword = htmlspecialchars($_POST["regpassword"]);
$regpwordchk = htmlspecialchars($_POST["regpasswordcheck"]);
if ($regpword == $regpwordchk){
  $adus = $conn->prepare("INSERT INTO usertable VALUES ('','$regunme','$regpword',0);");
  $adus->execute();
  $uic = $conn->prepare("SELECT userID FROM usertable WHERE userName = '$regunme'");
  $uic->execute();
  while($data = $uic->fetch(PDO::FETCH_ASSOC)){
    $usID = $data["userID"];
  }
  $tas = $conn->prepare("INSERT INTO teamtable VALUES ('','$usID','Team',0);");
  $tas->execute();
  unset($_SESSION["RErr"]);
}
else{
  $_SESSION["RErr"] = "Not the same password.";
}
header('Location: /ALevelCompProjPhpApp/Register.php');
?>
