<?php
  include_once("connect.php");#connecting to the DB
//header('Content-Type: application/json');
session_start();
$region =   htmlspecialchars($_POST["region"]);
$playername = htmlspecialchars($_POST["ppname"]);
$strplayername = str_replace(" ", "%20", $playername);
$idurl = "https://".$region.".api.pvp.net/api/lol/" . $region . "/v1.4/summoner/by-name/" . $strplayername . "?api_key=05047aed-e174-4bba-b294-c2c4ec3af4f0";
$idopt = file_get_contents($idurl); # fetching data from the websitez
//var_dump($idopt);
#echo($idopt)
#print_r($idopt);
if ($idopt != ""){
$idopt = json_decode($idopt);
//echo( json_decode($idopt));
$playerid = [];

echo("1");
foreach ($idopt as $key => $value) { #push values from the fetch to array
  //echo array_push($playerid, $value->id);
  array_push($playerid, $value->id);
}

$playeridencod =json_encode($playerid);
$PlayersId = substr($playeridencod, 1, (strlen($playeridencod)-2));#cut off unecessary parts of string

$matchhisturl = "https://".$region.".api.pvp.net/api/lol/".$region  ."/v1.3/game/by-summoner/" . $PlayersId . "/recent?api_key=05047aed-e174-4bba-b294-c2c4ec3af4f0";
$test = "c://stuff.txt";

$histopt = file_get_contents($matchhisturl); # fetch second part of the data
echo("2");
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
foreach ($histdec['games'] as $key => $value) { # totalling the values of the pick's data. within the last ten games and the last week.
$epcd = $value['createDate'];
  $epoch = substr($epcd, 0, 10);
  $epdate = date('Y-m-d H:i:s', $epoch); #convert given epoch into standard time.
  $currtimeep = time();
#  echo $epoch . "  " . $currtimeep;
$epweeklen = 604800 ;
    $minweektimeep = $currtimeep -  $epweeklen ; # finding time for last week
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
}# values all assigned and number of games played
echo("3");
#$epochisbad = "1463060053725";
#$epoch = substr($epochisbad, 0, 10);
#echo date('Y-m-d H:i:s', $epoch);
#echo date(DATE_RFC2822  , strtotime($epochisannoying));
#echo $ck;
#echo $td;
#echo $As;
#echo $Ws;
if ($noneplayed == false){
  echo("4");
}
if ($noofgms > 0){ # get the average points, with the assigned points per value.
$PlayerPts = ($ck - $td + 0.5*$As + 0.1*($Ws) + 0.005*$Tcc + 0.001*$Dc + 0.0001*($Dt-$Dc))/10;
$AVGPP = $PlayerPts / $noofgms;
}
else {
  $noneplayed=true;
}
echo("5");
#echo $noofgms;
#echo $AVGPP;
#add this data to database of player's team, being comprised of three players, stored as a name, favoured role and AVGPP
#$AVGPP
#echo $KillNo;

$endres = false;
#eWXDPAvqTAmf3JUj
if ($noneplayed == false){
    // $dr = $conn->prepare("SELECT * FROM ud WHERE UNAME = :datUN;");
    // $dr->bindValue(':datUN', $_SESSION['LIUN'], PDO::PARAM_STR);
    // $dr->execute();
#    $uid =  $dr['UID'];
    $tpl = $_POST['tpl']; # from here we're adding the pick's data to the table.
    $tplac = ("teamPlace");
    $mid = ("pickID");
    $mnm = ("pickName");
    $mpts = ("pickPoints");
        $teamID = $_SESSION['LIID'];
    $SQLCONN = $conn->prepare("SELECT $mid FROM pickTable WHERE $tplac = '$tpl' AND teamID = $teamID;");
    $SQLCONN->execute();
    while($data = $SQLCONN->fetch(PDO::FETCH_ASSOC)){
      if (isset($data[$mid])){
        echo ("yeboi");
          $endres = true;
      }
    }
    $teamID = $_SESSION['LIID'];
      $stmt = $conn->prepare("INSERT INTO pickTable VALUES ('','$PlayersId','$teamID','$AVGPP','$playername','$tpl');");
      $drop = $conn->prepare("DELETE FROM `picktable` WHERE `teamPlace` = '$tpl' AND `teamID` = '$teamID");
      $drop->execute();
#    $stmt = $conn->prepare("UPDATE 'td' SET '" . :mid . "'='" . :MID . "', '" . :mnm . "' = '" . :MNM . "', '" . ":mpts . "'='" . ":MPTS . "', WHERE 'TID' = " . :ID);
    // $stmt->bindParam(':mid', $mid);
    // $stmt->bindParam(':MID', $PlayersId);
    // $stmt->bindParam(':mnm',$mnm);
    // $stmt->bindParam('MNM',$playername);
    // $stmt->bindParam(':mpts',$mpts);
    // $stmt->bindParam(':MPTS',$AVGPP);
    // $stmt->bindParam(':ID', $uid);
    #HERE NEED TO GIVE 1 VAR 1 BINDPARAM
    $stmt->execute();
    $affected_rows = $stmt->rowCount();
    unset($_SESSION["Err"]);
    $_SESSION["Err"] = "test";
  }}
  else{
    $_SESSION["Err"] = "Invalid Username.";
  }
    #$conn->query("UPDATE `td` SET `TID`=[$MTeamId],`TNAME`=[value-2],`M" .$CorM. "ID`=[value-3],`M" .$CorM. NAME`=[value-4] WHERE 1"
  #  unset($_SESSION["Err"]);
    #$_SESSION["Err"] = "test";
  #$_SESSION["Err"] = "Invalid Username.";
#}
  session_write_close();
      header('Location: /ALevelCompProjPhpApp/DraftPage.php');

?>
