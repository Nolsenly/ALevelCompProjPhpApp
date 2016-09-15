<?php
#at some point work out a way to redirect to last page. probs to do with trakcing last page in a session, assigning may ba a prob tho.
session_start();
$u_name = htmlspecialchars($_POST['username']);
$pword = md5(htmlspecialchars($_POST['password']));

$user = array();
$pass = array();
$uID = array();
$servername = "localhost";
$username = "root";
$password = "";

    $conn = new PDO("mysql:host=$servername;dbname=alp_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
#    echo "Connected successfully";
     $dr = $conn->prepare("SELECT * FROM ud");
     #$dr->bindValue(':datUN', $_SESSION['LIUN'], PDO::PARAM_STR);
     $dr->execute();
     while($data = $dr->fetch(PDO::FETCH_ASSOC)){
       array_push($uID, $data['UID']);
       array_push($pass, $data['PWORD']);
       array_push($user, $data['UNAME']);

     }
#b44ce9d46c311d1aa1c4ecb46c97c994
#b44ce9d46c311d1aa1c4ecb46c97c994
$passwords = array_map('md5', $pass);
foreach ($user as $key => $value) {
  print_r($u_name);
  print_r($value);
  print_r($passwords[$key]);
  print_r($pword);
  if($value == $u_name){
    echo("1");
    if($passwords[$key] == $pword){
      $_SESSION['LIID'] = $uID[$key];
      $_SESSION['LIUN'] = $user[$key];
      $_SESSION['LGIN'] = 1;
      echo('2');
      #$_SESSION['LITN'] = $TNO[$key];
      //Basically here we need to return that you're logged in and your details. When logged in, dump password, but keep username and user ID in order to reference and be safe.
    }
  } else {
    #some code
    $_SESSION['LGIN'] = 0;
  }}
  session_write_close();
  header("location: LandingPage.php");
  exit();
?>
