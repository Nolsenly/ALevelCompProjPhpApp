<?php
session_start();
include_once("connect.php");
$FolRusername = $_POST['FollowUserR'];
$ibnc = $conn->prepare("SELECT userID FROM usertable WHERE userName ='$FolRusername'");
$ibnc->execute();
while($data = $ibnc->fetch(PDO::FETCH_ASSOC)){
  $RFolerID = $data["userID"];
}
$RFoleeID = $_SESSION['LIID'];
$fubi = $conn->prepare("DELETE FROM followertable WHERE idee = '$RFoleeID' AND ider = '$RFolerID'");
$fubi->execute();
?>
