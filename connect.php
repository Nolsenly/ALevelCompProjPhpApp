<?php
include_once("Credentials.php"); #get variables from outside source
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); #connect to mysql database
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } # if connected, say so.
catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }#else say that you haven't
?>
