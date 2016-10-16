<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>LFFL</title>
<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<head>
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
      <?php
        if ($_SESSION['LGIN'] == 0){
          echo('
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
          </form>');
      }?>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
