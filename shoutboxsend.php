<?php
include_once("connect.php");
include_once("shoutoxrecieve.php");
session_start();
$un = $_SESSION['LIUN'];
$bd = $_POST['messageInput'];
$sbID = ($shbID[4]+1);
echo($un . $bd . $sbID);
$dr = $conn->prepare("INSERT INTO shoutBoxTable (userName,body,shoutBoxID) VALUES ('$un','$bd','$sbID')");
$dr->execute();
?>
