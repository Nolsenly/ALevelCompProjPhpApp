<?php
include_once("connect.php");
include_once("header.php");
include_once("Navbar.php");?>
<div class = "col-md-4 center col-md-offset-1">
  <form method="post" action="AddFollowScript.php">
      <?php# if (isset($_SESSION['RErr'])){
      #  echo($_SESSION['RErr']);
      #}?>
      <!-- need to have name = username and the below name = password -->
    <div class="form-group">
      <input type="text"  name="FollowUserA" class="form-control" id ="FolUA">
    </div>
    <button type="submit" class="btn btn-success">Follow</button>
  </form>
  <div class = "col-md-4 center col-md-offset-1">
    <form method="post" action="FollowerRemove.php">
        <?php# if (isset($_SESSION['RErr'])){
        #  echo($_SESSION['RErr']);
        #}?>
        <!-- need to have name = username and the below name = password -->
      <div class="form-group">
        <input type="text"  name="FollowUserR" class="form-control" id ="FolUR">
      </div>
      <button type="submit" class="btn btn-success">Remove</button>
    </form>
</div>
