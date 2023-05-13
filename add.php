<?php

include_once("connections/connection.php");
$con = connection();

//adding data to the database
if (isset($_POST['submit'])) { //condition //isset() function is used to check if variable is set or null

  //declaring variable for each input
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $gender = $_POST['gender'];

  //query for input data
  $sql = "INSERT INTO `student_list`(`first_name`, `last_name`, `gender`) VALUES ('$fname','$lname','$gender')";
  $con->query($sql) or die($con->error);

  //redirect to index.php after clicking submit
  echo header("Location: index.php");
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
  <form action="" method="post">
    <label>First Name</label>
    <input type="text" name="first_name" id="first_name">

    <label>Last Name</label>
    <input type="text" name="last_name" id="last_name">

    <label>Gender</label>
    <select name="gender" id="gender">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>

    <input type="submit" name="submit" value="Submit Form">
  </form>
</body>

</html>