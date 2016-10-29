<?php
include_once("connect.php");
include_once("header.php");
include_once("Navbar.php");?>
<div class = "col-md-4 center col-md-offset-1">
  <form method="post" action="registerscript.php">
    <div class="form-group">
      <?php if (isset($_SESSION['RErr'])){
        echo($_SESSION['RErr']);
      }?>
      <input type="text" placeholder="Username" class="form-control" id="unameinp" name="regusername">
      <!-- need to have name = username and the below name = password -->
    </div>
    <div class="form-group">
      <input type="password" placeholder="Password" name="regpassword" class="form-control" id ="pwordinp">
      <input type="password" placeholder="Password" name="regpasswordcheck" class="form-control" id ="pwordinp">
    </div>
    <button type="submit" class="btn btn-success">Sign in</button>
  </form>
</div>
