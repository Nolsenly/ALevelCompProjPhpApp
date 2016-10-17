<div>
<?php include_once("shoutoxrecieve.php");?>

<?php echo("<p>$body[4] - $usern[4]</p>");?>
<?php echo("<p>$body[3] - $usern[3]</p>");?>
<?php echo("<p>$body[2] - $usern[2]</p>");?>
<?php echo("<p>$body[1] - $usern[1]</p>");?>
<?php echo("<p>$body[0] - $usern[0]</p>");?>
<form class="navbar-form navbar-right" method="post" action="shoutboxsend.php">
  <!--So, do the bit above with that method and action in order to quote the login -->
  <div class="form-group">
    <input type="text" placeholder="enter a message" class="form-control" id="msginp" name="messageInput">
    <!-- need to have name = username and the below name = password -->
  </div>
  <button type="submit" class="btn btn-success">Sign in</button>
</form>
</div>
