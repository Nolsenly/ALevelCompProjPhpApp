<!DOCTYPE html>
<?php
  include_once("header.php");
  include_once("connect.php");
  #var_dump($_SESSION);
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LFFL</title>
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <div class="jumbotron">
      <div class="container">
        <h1>LFFL</h1>
        <p>LFFL Draft Page.</p>
        <p><a class="btn btn-primary btn-lg" href="http://localhost/myApp/HelpPage.php#" role="button">Need Help? &raquo;</a></p>
        <!--Here we need to get some Help and explanation of how to use the site on another webpage6-->
      </div>
    </div>
    <?php
#    session_start();
    #var_dump($_SESSION);
    if ($_SESSION['LGIN']==1){

echo('<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Add new pick</h2>
          <p>Picks another Player</p>
          <form  method = "post" action ="getpage.php">
            <input type = "text" class ="form-control" id = "ppname" name = "ppname">
            <select class="form-control" id = "region" name = "region">
              <option value = "euw">EUW</option>
              <option value = "na">NA</option>
              <option value = "kr">KR</option>
              <option value = "tr">TR</option>
              <option value = "br">BR</option>
              <option value = "eune">EUNE</option>
              <option value = "jp">JP</option>
              <option value = "lan">LAN</option>
              <option value = "LAS>LAS</option>
              <option value = "oce">OCE</option>
              <option>RU</option>
            </select><button type="submit" class="btn btn-success"> ADD</button>
          </form>
          <!-- Will give player names and points.-->

        </div>
        <div class="col-md-4">
          <h2>Add Player</h2>
          <p>Player Name input here and region select</p>

          <!--Basically the above bit is going to be a form where you can have name input and region select -->
          <p><a class="btn btn-default" href="#" role="button">Trade For This player &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Chat with other Players</h2>
          <p>Players You can trade with go here ?o_o? </p>
          <div class ="form-group">
          <!-- will work as above in the free agents place -->
          <p><a class="btn btn-default" href="#" role="button">View Players Picks &raquo;</a></p>
        </div>
      </div>
      ' );
    $averagePoints= array();
    $playerName= array();
    $variable = $_SESSION['LIID'];
    $dr = $conn->prepare("SELECT * FROM pickData WHERE teamID = $variable");
    $dr->execute();
    while($data = $dr->fetch(PDO::FETCH_ASSOC)){
      array_push($averagePoints, $data['pickPoints']);
      array_push($playerName, $data['pickName']);
    }
    echo("<div><div>Pick Name</div><div>Average Points</div></div>");
    foreach ($user as $key => $value) {
      echo("<div><div>$playerName[$key]</div>$averagePoints<div></div></div>");
    }
    }
         else {
          $_SESSION['Err'] = "Not Logged In.";
          header("location: LandingPage.php");
        }
    session_write_close();
    ?>

      <hr>

      <div class="row player-list">
        <div class="col-md-4">
          <h2>Your current picks</h2>
          <table class="table table-hover">
          <?php# echo ('<thead> <tr> <th></th> <th>Players Name</th> <th>Avg Points</th></tr> </thead> <tbody> <tr> <th scope="row">Player 1</th> <td>'.$p1n.'</td> <td>'.$p1p.'</td></tr><th scope="row">Player 2</th> <td>'.$p2n.'</td> <td>'.$p2p.'</td></tr><th scope="row">Player 3</th> <td>'.$p3n.'</td> <td>'.$p3p.'</td></tr><th scope="row">Player 4</th> <td>'.$p4n.'</td> <td>'.$p4p.'</td></tr><th scope="row">Player 5 </th> <td>'.$p5n.'</td> <td>'.$p5p.'</td></tr></tbody>');?>
          </table>
        </div>
      </div>

      <footer>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>
    </div>


    <!-- Bootst

    <!-- Bootstrap core JavaScript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
