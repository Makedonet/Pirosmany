<?php
$servername = "localhost";
$usernameq = "root";
$passwordq = "root";
$dbname = "Magazine-bd";

$connection = mysqli_connect($servername, $usernameq, $passwordq, $dbname);

if($connection == false)
{
  echo "Connection failed!";
  echo mysqli_connect_error();
  exit();
}
