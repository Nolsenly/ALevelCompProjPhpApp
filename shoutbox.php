
<?php include_once("shoutoxrecieve.php"); #including the recieve func of shoutbox ?>
<!-- next bit is the messages being printed out for the user to see. -->
<?php echo("<table class = 'table'><thead><tr><th>Messages:</th></tr></thead><tbody>");
if (isset($body[4])){ echo("<tr><th>".$body[4]." - ".$usern[4]."</th></tr>");}?>
<?php if (isset($body[3])){ echo("<tr><th>".$body[3]." - ".$usern[3]."</th></tr>");}?>
<?php if (isset($body[2])){ echo("<tr><th>".$body[2]." - ".$usern[2]."</th></tr>");}?>
<?php if (isset($body[1])){ echo("<tr><th>".$body[1]." - ".$usern[1]."</th></tr>");}?>
<?php if (isset($body[0])){ echo("<tr><th>".$body[0]." - ".$usern[0]."</th></tr>");}
echo("</tbody></table>");?>
<form class="form" method="post" action="shoutboxsend.php">
  <!--So, do the bit above with that method and action in order to quote the login -->
  <div class="form-group"> <!-- bit which sends off the message. -->
    <input type="text" placeholder="enter a message" class="clear form-control chat" id="msginp" name="messageInput">
    <!-- need to have name = username and the below name = password -->
  </div>
  <button type="submit" class="btn btn-success">Send</button>
</form>
