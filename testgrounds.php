<?php
header('Content-Type: application/json');
$idtest = "60813930";
//echo $playeridencod;
#$matchhisturl = "https://euw.api.pvp.net/api/lol/euw/v1.3/game/by-summoner/" . $idtest . "/recent?api_key=05047aed-e174-4bba-b294-c2c4ec3af4f0";
#$matchhisturl = "c://stuff.txt";
$matchhisturl = "https://euw.api.pvp.net/api/lol/euw/v1.3/game/by-summoner/" . $idtest . "/recent?api_key=05047aed-e174-4bba-b294-c2c4ec3af4f0";
$histopt = file_get_contents($matchhisturl);

$histthing = [];
$KillNo = 0;
$histdec = json_decode($histopt, true);

echo $histdec['games'][0]['stats']['level'];
#echo substr($histopt, 0, strlen($histopt));
//echo $histdec;
#foreach ($histdec->stats as $key) {
  //echo array_push($histthing, $value->summonerId);
  //array_push($histthing, $value->championsKilled);
  #$histthing = ($key->championKilled);

  #$KillNo = $KillNo + $histthing;
#}
#echo $KillNo;
?>
