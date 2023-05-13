<?php

//checking if there is no ongoing session //!isset means null or not set
if (!isset($_SESSION)) {
  session_start(); //will start if there is no ongoing session
}

include_once("connections/connection.php");
$con = connection();


if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  //query finding user input from the database
  $sql = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password'";
  $user = $con->query($sql) or die($con->error); //store value of query in user variable
  $row = $user->fetch_assoc();
  $total = $user->num_rows; //returns the total number of user match

  //checking if there is a match user
  if ($total > 0) {
    $_SESSION['UserLogin'] = $row['username'];
    $_SESSION['Access'] = $row['access'];
    echo header("Location: index.php");
  } else {
    echo "No user found.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management System</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1>Login Page</h1>
  <br>
  <form action="" method="post">
    <label>Username</label>
    <input type="text" name="username" id="username">

    <label>Password</label>
    <input type="password" name="password" id="password">

    <button type="submit" name="login">Login</button>
  </form>
</body>

</html>