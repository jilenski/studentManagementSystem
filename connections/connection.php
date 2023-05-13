<?php

function connection()
{
  // connecting to database
  $host = "localhost";
  $username = "root";
  $password = "12345";
  $dbname = "student_system";

  // creating connection variable
  $con = new mysqli($host, $username, $password, $dbname);

  // error proofing of connection
  if ($con->connect_error) {
    echo $con->connect_error;
  } else {
    return $con;
  }
}
