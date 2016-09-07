<!DOCTYPE html>
<?php include_once("header.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>LFFL</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
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

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>LFFL</h1>
        <p>LFFL Draft Page.</p>
        <p><a class="btn btn-primary btn-lg" href="http://localhost/myApp/HelpPage.php#" role="button">Need Help? &raquo;</a></p>
        <!--Here we need to get some Help and explanation of how to use the site on another webpage6-->
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Picks:</h2>
          <p>Picks another Player</p>
          <form class = "form-control" method = "post" action ="getpage.php">
            <input type = "text" class ="form-control" id = "ppname">
            <select class="form-control">
              <option>EUW</option>
              <option>NA</option>
              <option>KR</option>
              <option>TR</option>
              <option>BR</option>
              <option>EUNE</option>
              <option>JP</option>
              <option>LAN</option>
              <option>LAS</option>
              <option>OCE</option>
              <option>RU</option>
            </select>
              <p><a class="btn btn-default" href="getpage.php" role="button">View details &raquo;</a></p>
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
          <p><a class="btn btn-default" href="#" role="button">View Player's Picks &raquo;</a></p>
        </div>
      </div>

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
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
