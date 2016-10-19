<?php
include_once("connect.php");# connects to the db
include_once("shoutoxrecieve.php"); #runs the shoutboxrecieve function
session_start();
$un = $_SESSION['LIUN']; #gets the logged in user's name
$bd = $_POST['messageInput']; # takes the message input
$sbID = ($shbID[0]+1); # assigns the auto incremeneting messageID
echo($un . $bd . $sbID);
$dr = $conn->prepare("INSERT INTO shoutBoxTable (userName,body,shoutBoxID) VALUES ('$un','$bd','$sbID')");
$dr->execute(); # pushes all the data to the database as a message.
header('Location: /ALevelCompProjPhpApp/DraftPage.php');
?>
