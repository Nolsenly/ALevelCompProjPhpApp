<?php
header('Content-Type: application/json');
$idtest = "60813930";
$region = "euw";
$apikey = "05047aed-e174-4bba-b294-c2c4ec3af4f0";
$matchhisturl = "https://euw.api.pvp.net/api/lol/".$region."/v1.3/game/by-summoner/" . $idtest . "/recent?api_key=".$apikey;
$histopt = file_get_contents($matchhisturl);

$histthing = [];
$KillNo = 0;
$histdec = json_decode($histopt, true);

echo $histdec['games'][0]['stats']['level'];
echo substr($histopt, 0, strlen($histopt));
echo $histdec;
foreach ($histdec->stats as $key) {
        $ck= $ck + $value['stats']['championsKilled'] . "\n";
        $td= $td + $value['stats']['numDeaths'] . "\n";
        $As= $As + $value['stats']['assists'] . "\n";
        $Ws= $Ws + $value['stats']['wardPlaced'] . "\n";
        $Ws= $Ws + $value['stats']['wardKilled'] . "\n";
        $Tcc= $Tcc + $value['stats']['totalTimeCrowdControlDealt'] . "\n";
        $Dc= $Dc + $value['stats']['totalDamageDealtToChampions'] . "\n";
        $Dt= $Dt + $value['stats']['totalDamageDealt'] . "\n";
}
echo $KillNo;
?>
