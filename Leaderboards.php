<?php
include_once("header.php");
include_once("Navbar.php");
include_once("connect.php");
include_once("leaderboardupdate.php");
$dr = $conn->prepare("SELECT * FROM teamTable ORDER BY `teamPoints` DESC"); #get the teams' name and the teams' points in order.
$variable = $_SESSION['LIID']; # get the user who is logged in's ID
$dr->execute();
$averagePoints = array();
$teamName  = array();
while($data = $dr->fetch(PDO::FETCH_ASSOC)){
  array_push($averagePoints, $data['teamPoints']);
  array_push($teamName, $data['teamName']);
}# mmaking the table with the pickdata in.
echo("<div class = 'chatbox'><div class = 'col-md-4'><h2>Leaderboard.</h2>");
echo("<table class = 'table'><thead><tr><th>Pick Name</th><th>Average Points</th></tr></thead><tbody>");
foreach ($teamName as $key => $value) { #iterative table making
  echo("<tbody><tr><th>$teamName[$key]</th><th>$averagePoints[$key]</th></tr>");
}#<th scope="row">Player 2</th> <td>'.$p2n.'</td> <td>'.$p2p.'</td></tr>
echo("</tbody></table>");

?>
