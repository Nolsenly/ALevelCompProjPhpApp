<?php
#at some point work out a way to redirect to last page. probs to do with trakcing last page in a session, assigning may ba a prob tho.
session_start();
$u_name = htmlspecialchars($_POST['username']);
$pword = md5(htmlspecialchars($_POST['password']));

$user = array("olly", "user", "memelord");
$pass = array("memes","pass","xderino");
$uID = array("1","2","3");
$passwords = array_map('md5', $pass);

foreach ($user as $key => $value) {
  if($value == $u_name){
    if($passwords[$key] === $pword){
      $_SESSION['LIID'] = $uID[$key];
      $_SESSION['LIUN'] = $user[$key];
      $_SESSION['LIN?'] = 1;

      #$_SESSION['LITN'] = $TNO[$key];
      //Basically here we need to return that you're logged in and your details. When logged in, dump password, but keep username and user ID in order to reference and be safe.
    }
  } else {
    #some code
    $SESSION['LIF'] = 1;
  }
  header("location: LandingPage.php");
  exit();
}
?>
