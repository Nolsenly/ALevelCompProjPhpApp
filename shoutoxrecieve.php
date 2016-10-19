<?php include_once("connect.php"); #connects to the db
$dr = $conn->prepare("SELECT * FROM `shoutBoxTable` ORDER BY `shoutBoxID` DESC");
$dr->execute(); # runs query ^^
$x = 0;
$body = array();
$shbID = array();
$usern = array();
while($data = $dr->fetch(PDO::FETCH_ASSOC)){ #assigns values from query to the array for use.
  array_push($body, $data['body']);
  array_push($shbID, $data['shoutBoxID']);
  array_push($usern, $data['userName']);
  $x = $x + 1;
}
?>
