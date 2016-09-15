<?php
//header('Content-Type: application/json');
$region =   htmlspecialchars($_POST["region"]);
$playername = htmlspecialchars($_POST["ppname"]);
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
$PlayersId = substr($playeridencod, 1, (strlen($playeridencod)-2));
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
$noneplayed=false;
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
      if(!empty($value['stats']['championsKilled'])){
      $ck= $ck + $value['stats']['championsKilled'] . "\n";
    } else {

    }
    if (!empty($value['stats']['numDeaths'])){
      $td= $td + $value['stats']['numDeaths'] . "\n";
    } else{
    }
    if (!empty($value['stats']['assists'])){
      $As= $As + $value['stats']['assists'] . "\n";
    } else{

    }
    if (!empty($value['stats']['wardPlaced'])) {
      $Ws= $Ws + $value['stats']['wardPlaced'] . "\n";
    } else {
    }
    if (!empty($value['stats']['wardKilled'])) {
      $Ws= $Ws + $value['stats']['wardKilled'] . "\n";
    } else {
    }
    if (!empty($value['stats']['totalTimeCrowdControlDealt'])) {
      $Tcc= $Tcc + $value['stats']['totalTimeCrowdControlDealt'] . "\n";
    } else {
    }
    if (!empty($value['stats']['totalDamageDealtToChampions'])) {
      $Dc= $Dc + $value['stats']['totalDamageDealtToChampions'] . "\n";
    } else {
    }
    if (!empty($value['stats']['totalDamageDealt'])) {
      $Dt= $Dt + $value['stats']['totalDamageDealt'] . "\n";
    } else {
    }
    $noofgms = $noofgms +1;
}
}
#$epochisbad = "1463060053725";
#$epoch = substr($epochisbad, 0, 10);
#echo date('Y-m-d H:i:s', $epoch);
#echo date(DATE_RFC2822  , strtotime($epochiscancer));
#echo $ck;
#echo $td;
#echo $As;
#echo $Ws;
if ($noofgms > 0){
$PlayerPts = ($ck - $td + 0.5*$As + 0.1*($Ws) + 0.005*$Tcc + 0.001*$Dc + 0.0001*($Dt-$Dc))/10;
$AVGPP = $PlayerPts / $noofgms;
}
else {
  $noneplayed=true;
}

#echo $noofgms;
#echo $AVGPP;
#add this data to database of player's team, being comprised of three players, stored as a name, favoured role and AVGPP
#$AVGPP
#echo $KillNo;
$servername = "localhost";
$username = "root";
$password = "";

#eWXDPAvqTAmf3JUj
if ($noneplayed ==false){
session_start();
try {
    $conn = new PDO("mysql:host=$servername;dbname=alp_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    // $dr = $conn->prepare("SELECT * FROM ud WHERE UNAME = :datUN;");
    // $dr->bindValue(':datUN', $_SESSION['LIUN'], PDO::PARAM_STR);
    // $dr->execute();
#    $uid =  $dr['UID'];
    $uid = $_SESSION['LIID'];
    $mid = ("M".$uid."ID");
    $mnm = ("M".$uid."NAME");
    $mpts = ("M".$uid."PTS");
    $stmt = $conn->prepare("UPDATE 'td' SET ':mid'=':MID', ':mnm' = ':MNM', ':mpts'=':MPTS', WHERE 'TID' = :ID");
    $stmt->bindParam(':mid', $mid, ':MID', $PlayersId, ':mnm',$mnm,'MNM',$playername,':mpts',$mpts,':MPTS',$AVGPP, ':ID', $uid);
    #HERE NEED TO GIVE 1 VAR 1 BINDPARAM
    $stmt->execute();
    $affected_rows = $stmt->rowCount();
    #$conn->query("UPDATE `td` SET `TID`=[$MTeamId],`TNAME`=[value-2],`M" .$CorM. "ID`=[value-3],`M" .$CorM. NAME`=[value-4] WHERE 1"
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


}
?>
