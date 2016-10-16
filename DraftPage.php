<!DOCTYPE html>
<?php include_once("header.php");
session_start();
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
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
          <h2>Picks:</h2>
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
          <h2>Chat(?Tentative) With other Players</h2>
          <p>Players You can trade with go here ?o_o? </p>
          <div class ="form-group">
          <!-- will work as above in the free agents place -->
          <p><a class="btn btn-default" href="#" role="button">View Players Picks &raquo;</a></p>
        </div>
      </div>
      ' );
    }
    else{
      echo("<p class = 'col-md-12' style = 'text-align:middle;'>Please Log In to use this page.</p>");
    }
session_write_close();
    ?>

      <hr>

      <footer>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
