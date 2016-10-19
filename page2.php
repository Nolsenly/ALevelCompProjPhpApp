<?php
#at some point work out a way to redirect to last page. probs to do with trakcing last page in a session, assigning may ba a prob tho.
include_once("connect.php"); #connect to db
session_start();
$u_name = htmlspecialchars($_POST['username']); #get values that are inputted from the last page.
$pword = md5(htmlspecialchars($_POST['password'])); # hash the password so it's secure.
print_r($u_name);
$user = array();
$pass = array();
$uID = array();
     $dr = $conn->prepare("SELECT * FROM `userTable` WHERE `userName` = '".$u_name."'"); # get data from table.
     #$dr->bindValue(':datUN', $_SESSION['LIUN'], PDO::PARAM_STR);
     $dr->execute();
     $error= $conn->errorInfo();
echo $error[2];
     while($data = $dr->fetch(PDO::FETCH_ASSOC)){ #assign collceted data to it's associated array.
       array_push($uID, $data['userID']);
       array_push($pass, $data['userPassword']);
       array_push($user, $data['userName']);

     }
# pwrd = ""
$passwords = array_map('md5', $pass);
foreach ($user as $key => $value) { # print the values for the check.
  print_r($u_name);
  print_r($value);
  print_r($passwords[$key]);
  print_r($pword);
  if($value == $u_name){
    echo("1");
    if($passwords[$key] == $pword){ #assign session variables that can be used elsewhere
      $_SESSION['LIID'] = $uID[$key];
      $_SESSION['LIUN'] = $user[$key];
      $_SESSION['LGIN'] = 1;
      echo('2');
      #$_SESSION['LITN'] = $TNO[$key];
      //Basically here we need to return that you're logged in and your details. When logged in, dump password, but keep username and user ID in order to reference and be safe.
    }
  } else {
    #bad login? you get logged out, you're playing with the system.
    $_SESSION['LGIN'] = 0;
  }}
  session_write_close(); #end session
  header("location: LandingPage.php"); # redirect user
  exit();
?>
