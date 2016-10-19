<!DOCTYPE html>
<?php include_once("header.php");
include_once("Navbar.php"); #include navbar and header so that stuff works
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LFFL</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

  </head>

  <body>


    <!-- main area for everything-->
    <div class="jumbotron">
      <div class="container">
        <h1>LFFL</h1>
        <?php
        $var = $_SESSION['LGIN']; # if you're logged in
        echo"<p>Welcome To LFFL, LFFL an app to play a fantasy league of league of legends with your friends as the players! I hope you enjoy it and I wish you much luck in the jungle of soloq. $var </p>"?>
        <p><a class="btn btn-primary btn-lg" href="http://localhost/ALevelCompProjPhpApp/DraftPage.php#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- some columns detailing links to other pages -->
      <div class="row">
        <div class="col-md-4">
          <h2>Fantasy</h2>
          <p>Pit friend against friend in our fantasy simulator, determining who will be the number one soloq star, even pick those who aren't your friends, such as Famous players</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4"> <!-- Leaderboard bit goes here-->
          <h2>Perp</h2>
          <p>Parp</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4"> <!-- take this shit out boyo -->
          <h2>Porp</h2>
          <p>Perp</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>
    </div>


    <!-- Bootstrap core JavaScript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
