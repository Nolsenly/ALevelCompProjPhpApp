<?php
//header('Content-Type: application/json');
$region = "euw";
$playername = "totallycarbon";
$idurl = "https://euw.api.pvp.net/api/lol/" . $region . "/v1.4/summoner/by-name/" . $playername . "?api_key=05047aed-e174-4bba-b294-c2c4ec3af4f0";
$idopt = file_get_contents($idurl);
//var_dump($idopt);

$idopt = json_decode($idopt);
//echo( json_decode($idopt));
$playerid = [];

foreach ($idopt as $key => $value) {
  //echo array_push($playerid, $value->id);
  array_push($playerid, $value->id);
}

$playeridencod =json_encode($playerid);
$PlayersId = substr($playeridencod, 1, strlen($histopt)-1);
#echo $playeridencod;
$matchhisturl = "https://euw.api.pvp.net/api/lol/euw/v1.3/game/by-summoner/" . $PlayersId . "/recent?api_key=05047aed-e174-4bba-b294-c2c4ec3af4f0";
$test = "c://stuff.txt";

$histopt = file_get_contents($matchhisturl);

//echo $matchhisturl;
$histthing = [];
$KillNo = 0;
$histdec = json_decode($histopt, true);
$ck = 0;
$td = 0;
$As = 0;
$Ws = 0;
$Tcc = 0;
$Dt = 0;
$Dc = 0;
$noofgms = 0;
foreach ($histdec['games'] as $key => $value) {
$epcd = $value['createDate'];
  $epoch = substr($epcd, 0, 10);
  $epdate = date('Y-m-d H:i:s', $epoch);
  $currtimeep = time();
#  echo $epoch . "  " . $currtimeep;
$epweeklen = 604800 ;
    $minweektimeep = $currtimeep -  $epweeklen ;
    #echo $minweektimeep . " " . $epoch . " ";

  if ( $epoch > ($minweektimeep)){
    try {
      $ck= $ck + $value['stats']['championsKilled'] . "\n";
    } catch (Exception $e) {
      $ck= $ck;
    }
    try {
      $td= $td + $value['stats']['numDeaths'] . "\n";
    } catch (Exception $e) {
      $td= $td;
    }
    try {
      $As= $As + $value['stats']['assists'] . "\n";
    } catch (Exception $e) {
      $As= $As;
    }
    try {
      $Ws= $Ws + $value['stats']['wardPlaced'] . "\n";
    } catch (Exception $e) {
      $Ws= $Ws;
    }
    try {
      $Ws= $Ws + $value['stats']['wardKilled'] . "\n";
    } catch (Exception $e) {
      $Ws= $Ws;
    }
    try {
      $Tcc= $Tcc + $value['stats']['totalTimeCrowdControlDealt'] . "\n";
    } catch (Exception $e) {
      $As= $As;
    }
    try {
      $Dc= $Dc + $value['stats']['totalDamageDealtToChampions'] . "\n";
    } catch (Exception $e) {
      $Dc= $Dc;
    }
    try {
      $Dt= $Dt + $value['stats']['totalDamageDealt'] . "\n";
    } catch (Exception $e) {
      $Dt= $Dt;
    }
    $noofgms = $noofgms +1;
}
}
#$epochisbad = "1463060053725";
#$epoch = substr($epochisbad, 0, 10);
#echo date('Y-m-d H:i:s', $epoch);
#echo date(DATE_RFC2822  , strtotime($epochiscancer));
echo $ck;
echo $td;
echo $As;
echo $Ws;
$PlayerPts = ($ck - $td + 0.5*$As + 0.1*($Ws) + 0.005*$Tcc + 0.001*$Dc + 0.0001*($Dt-$Dc))/10;
$AVGPP = $PlayerPts / $noofgms;
echo $noofgms;
echo $AVGPP;
#echo $KillNo;
?>
