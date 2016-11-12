<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Offside" rel="stylesheet">

<title>LFFL</title> <!-- page title -->
<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<head>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header"><!--icon bars for if i decide to add dropdowns e.t.c.-->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span>L</span>eague <span>F</span>antasy <span>F</span>riends <span>L</span>eague</a> <!-- title -->
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class = "hrz-bar">
        <li><a>Home</a></li>
        <li><a>Draft</a></li>
        <li><a>Register</a></li>
        <li><a>Leaderboard</a></li>
      </ul>
      <?php
        #if ($_SESSION['LGIN'] == 0 or null == $_SESSION['LGIN']){ # checking about whether logged in or not.
        if ($_SESSION['LGIN'] != 1){
          echo('
            <!--So, do the bit above with that method and action in order to quote the login -->
            <form class="navbar-form navbar-right" method="post" action="page2.php"> <!-- basically being a log in area -->
            <div class="form-group">
              <input type="text" placeholder="Username" class="form-control" id="unameinp" name="username">
              <!-- need to have name = username and the below name = password -->
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" name="password" class="form-control" id = "pwordinp">
            </div>
            <button type="submit" class="btn-no-margin btn btn-success">Sign in</button>
          </form>');
        }
          else {
            echo('<a role="button" class="btn btn-success navbar-right" href = "DropSession.php">Sign Out</a>');

      }?>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
