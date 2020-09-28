<?php
  $db_hostname = "localhost";
  $db_username = "";
  $db_password = "";
  $db_database = "";

  $mysql = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
 ?>
