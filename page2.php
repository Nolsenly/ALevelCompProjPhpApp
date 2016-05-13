<?php
$u_name = htmlspecialchars($_POST['username']);
$pword = md5(htmlspecialchars($_POST['password']));

$user = array("olly", "user", "memelord");
$pass = array("memes","pass","xderino");
$passwords = array_map('md5', $pass);

foreach ($user as $key => $value) {
  if($value == $u_name){
    if($passwords[$key] === $pword){
      echo "success";
      //Basically here we need to return that you're logged in and your details. When logged in, dump password, but keep username and user ID in order to reference and be safe.
    }
  } else {
    #some code
  }
}
?>
