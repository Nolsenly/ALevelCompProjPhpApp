<!DOCTYPE html>
<?php
  include_once("header.php");
  include_once("connect.php");# the includes, for connecting to php, adding the bootstrap and the navbar.
  include_once("Navbar.php");
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
  </head> <!--adding some stylesheets and stuff-->

  <body>

    <div class="jumbotron">
      <div class="container">
        <h1>LFFL</h1>
        <p>LFFL Draft Page.</p>
        <p><a class="btn btn-primary btn-lg" href="http://localhost/myApp/HelpPage.php#" role="button">Need Help? &raquo;</a></p>
        <!--Here we need to get some Help and explanation of how to use the site on another webpage6-->
      </div><!-- the help page link. -->
    </div>
    <?php
#    session_start();
    #var_dump($_SESSION);
    if ($_SESSION['LGIN']==1){ #basically, if the person is logged in, it'll display the rest of the page content.

echo('<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Add new pick</h2>
          <p>Picks another Player</p>                   <!--basically the form for adding a new player to your picks.-->
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
            </select>  <select class="form-control" id = "tpl" name = "tpl">
                <option value = "1">Spot 1</option>
                <option value = "2">Spot 2</option>
                <option value = "3">Spot 3</option>
                <option value = "4">Spot 4</option>
                <option value = "5">Spot 5</option>
              </select><button type="submit" class="btn btn-success"> ADD</button>
          </form>
          <!-- Will give player names and points.-->

        </div>
        <div class="col-md-4">
          <h2>Add Player</h2>
          <p>Player Name input here and region select</p>

        </div>
      ' );

    $averagePoints= array(); # this here is the part where you get to look at the points your picks have earned.
    $playerName= array();
    $dr = $conn->prepare("SELECT * FROM pickTable WHERE teamID = $variable"); #get said player's picks and the associated data.
    $variable = $_SESSION['LIID']; # get the user who is logged in's ID
    $dr->execute();
    while($data = $dr->fetch(PDO::FETCH_ASSOC)){
      array_push($averagePoints, $data['pickPoints']);
      array_push($playerName, $data['pickName']);
    }# mmaking the table with the pickdata in.
    echo("<div class = 'chatbox'><div class = 'col-md-4'><h2>Your Roster.</h2>");
    echo("<table class = 'table'><thead><tr><th>Pick Name</th><th>Average Points</th></tr></thead><tbody>");
    foreach ($playerName as $key => $value) { #iterative table making
      echo("<tbody><tr><th>$playerName[$key]</th><th>$averagePoints[$key]</th></tr>");
    }#<th scope="row">Player 2</th> <td>'.$p2n.'</td> <td>'.$p2p.'</td></tr>
    echo("</tbody></table>");
    }
         else { # if you're not logged in.
          $_SESSION['Err'] = "Not Logged In."; # return error if there is one.
          header("location: LandingPage.php");#return to the landingpage
        }
    session_write_close();
    ?>

      <hr>

    <div id = "shoutboxbox">
      <?php include_once("shoutbox.php"); ?>
    </div><footer>
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
