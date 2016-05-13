<?php
header('Content-Type: application/json');
$region = "euw";
$playername = "kuurasov";
$idurl = "https://euw.api.pvp.net/api/lol/" . $region . "/v1.4/summoner/by-name/" . $playername . "?api_key=05047aed-e174-4bba-b294-c2c4ec3af4f0";
$idopt = file_get_contents($idurl);
//var_dump($idopt);

$idopt = json_decode($idopt);

$playerid = [];

foreach ($idopt as $key => $value) {
  array_push($playerid, $value->id);
}
$playeridencod =json_encode($playerid);
//echo(json_encode($playerid));
echo $playeridencod;
$matchhisturl = "https://euw.api.pvp.net/api/lol/euw/v1.3/game/by-summoner/" . $playeridencod . "/recent?api_key=05047aed-e174-4bba-b294-c2c4ec3af4f0";
$histopt = file_get_contents($matchhisturl);
echo $histopt;
//echo $matchhisturl;
?>
