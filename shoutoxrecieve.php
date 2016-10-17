<?php include_once("connect.php");
$dr = $conn->prepare("SELECT * FROM `shoutBoxTable` ORDER BY `shoutBoxID`");
$dr->execute();
$x = 0;
$body = array();
$shbID = array();
$usern = array();
$data = $dr->fetch(PDO::FETCH_ASSOC);
while($x < 5){
  array_push($body, $data['body']);
  array_push($shbID, $data['shoutBoxID']);
  array_push($usern, $data['userName']);
  $x = $x + 1;
}
?>
