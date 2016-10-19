<?php
include_once("connect.php");
$uid = 1; # make this equal to the session variable.
$dc = $conn->prepare("SELECT * FROM pickTable WHERE teamID = '".$uid."'");
$dc->execute();
$x = 0;
$pP = array();
$tpP = 0;
$apP = 0;
while($data = $dc->fetch(PDO::FETCH_ASSOC)){ #assign collceted data to it's associated array.
  array_push($pP, $data['pickPoints']);
  $x = $x+1;
  }
  foreach ($pP as $key => $value) {
    $tpP = $tpP + $pP[$key];
    # code...
  }
  $apP = ($tpP/$x);
$dd = $conn->prepare("UPDATE teamTable SET teamPoints='$apP' WHERE teamID = '".$uid."'");
$dd->execute();
?>
