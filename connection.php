<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
  //echo "Sed Connection Successful";
}

//else echo "Connection Successful";
