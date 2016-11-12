<?php
$FolAusername = $_POST['FollowUserA']; #gets the user you wanna follow's username
session_start();
include_once("connect.php");
$ibnc = $conn->prepare("SELECT userID FROM usertable WHERE userName ='$FolAusername'"); # gets the ID of the user you wanna follow
$ibnc->execute();
while($data = $ibnc->fetch(PDO::FETCH_ASSOC)){
  $FolAerID = $data["userID"]; #binds the data that was retrieved previously
}
$FolAeeID = $_SESSION['LIID'];
$fubi = $conn->prepare("INSERT INTO followertable VALUES('$FolAerID','$FolAeeID')");
$fubi->execute();
?>
