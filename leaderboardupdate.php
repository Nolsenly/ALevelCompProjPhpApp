<?php
include_once("connect.php");
$uid = 1; # make this equal to the session variable.
$dc = $conn->prepare("SELECT userID FROM usertable");
$dc->execute();
$x = 0;
$pointsArray = array();
$tpP = 0;
$apP = 0;
$points = 0;

while($data = $dc->fetch(PDO::FETCH_ASSOC)){ #assign collceted data to it's associated array.
  $user = $data['userID'];
  $dc2 = $conn->prepare("SELECT * FROM picktable WHERE teamID = $user");
  $dc2->execute();
  var_dump($user);
  $x = 0;
  $points = 0;
  $totalPoints = 0;

  while($data2 = $dc2->fetch(PDO::FETCH_ASSOC)){ #assign collceted data to it's associated array.
    $pcktable = $data2['pickPoints'];
      if ($pcktable != "") {
      var_dump($pcktable);
      $points = $points + $pcktable;
      $x = $x+1;
    }
  }
  if ($x != 0) {
    $totalPoints = $points / $x;
    echo $totalPoints;
  }

  $dd = $conn->prepare("UPDATE teamTable SET teamPoints='$totalPoints' WHERE teamID = '".$user."'");
  $dd->execute();
}

  #$currentPckPts = $data['pickPoints'];
  #foreach ($pckPts as $key => $value) {
  #array_push($pP, $data['pickPoints']);
  #$x = $x+1;
#}}
#  foreach ($pP as $key => $value) {
#    $tpP = $tpP + $pP[$key];
#    # update the total points.
#  }
#  $apP = ($tpP/$x);


?>
