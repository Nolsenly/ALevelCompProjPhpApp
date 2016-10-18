<div><div class = 'col-md-4'>
<?php include_once("shoutoxrecieve.php");?>

<?php if (isset($body[4])){ echo("<p>$body[4]</p><br/><p> - $usern[4]</p>");}?>
<?php if (isset($body[3])){ echo("<p>$body[3]</p><br/><p> - $usern[3]</p>");}?>
<?php if (isset($body[2])){ echo("<p>$body[2]</p><br/><p> - $usern[2]</p>");}?>
<?php if (isset($body[1])){ echo("<p>$body[1]</p><br/><p> - $usern[1]</p>");}?>
<?php if (isset($body[0])){ echo("<p>$body[0]</p><br/><p> - $usern[0]</p>");}?>
<form class="navbar-form navbar-right" method="post" action="shoutboxsend.php">
  <!--So, do the bit above with that method and action in order to quote the login -->
  <div class="form-group">
    <input type="text" placeholder="enter a message" class="form-control" id="msginp" name="messageInput">
    <!-- need to have name = username and the below name = password -->
  </div>
  <button type="submit" class="btn btn-success">Sign in</button>
</form>
</div>
</div>
