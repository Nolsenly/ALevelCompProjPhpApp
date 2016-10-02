
<?php
$servername = "localhost";
$username = "root";
$password = "";
include_once("header.php");
session_start();
if ($_SESSION['LGIN'] == 1){
  $conn = new PDO("mysql:host=$servername;dbname=alp_db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
#    echo "Connected successfully";
   $dr = $conn->prepare("SELECT * FROM td");
   #$dr->bindValue(':datUN', $_SESSION['LIUN'], PDO::PARAM_STR);
   $dr->execute();
   while($data = $dr->fetch(PDO::FETCH_ASSOC)){
     $p1p = $data['M1PTS'];
     $p1n = $data['M1NAME'];
     $p2p = $data['M2PTS'];
     $p2n = $data['M2NAME'];
     $p3p = $data['M3PTS'];
     $p3n = $data['M3NAME'];
     $p4p = $data['M4PTS'];
     $p4n = $data['M4NAME'];
     $p5p = $data['M5PTS'];
     $p5n = $data['M5NAME'];
   }
  echo('<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Dont actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>

        </button>
        <a class="navbar-brand" href="#">LFFL</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <form class="navbar-form navbar-right" method="post" action="page2.php">
          <!--So, do the bit above with that method and action in order to quote the login -->
          <div class="form-group">
            <input type="text" placeholder="Username" class="form-control" id="unameinp" name="username">
            <!-- need to have name = username and the below name = password -->
          </div>
          <div class="form-group">
            <input type="password" placeholder="Password" name="password" class="form-control" id = "pwordinp">
          </div>
          <button type="submit" class="btn btn-success">Sign in</button>
        </form>
      </div><!--/.navbar-collapse -->
    </div>
  </nav>
  </br>
  </br>
  </br>
  <table class="table table-hover">
  <thead> <tr> <th>#</th> <th>Players Name</th> <th>Avg Points</th></tr> </thead> <tbody> <tr> <th scope="row">Player 1</th> <td>'.$p1n.'</td> <td>'.$p1p.'</td></tr><th scope="row">Player 2</th> <td>'.$p2n.'</td> <td>'.$p2p.'</td></tr><th scope="row">Player 3</th> <td>'.$p3n.'</td> <td>'.$p3p.'</td></tr><th scope="row">Player 4</th> <td>'.$p4n.'</td> <td>'.$p4p.'</td></tr><th scope="row">Player 5 </th> <td>'.$p5n.'</td> <td>'.$p5p.'</td></tr></tbody>
  </table>
  </body>
</html>
');
}
else{
  header("location: LandingPage.php");
  exit();
}
?>
