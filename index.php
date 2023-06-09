<?php

if (!isset($_SESSION)) {
  session_start();
}

//checking whether there is a user logged-in and return message with user's name
if (isset($_SESSION['UserLogin'])) {
  echo "Welcome " . $_SESSION['UserLogin'];
} else {
  echo "Welcome Guest";
}

// linking connection.php file
include_once("connections/connection.php");

// calling the connection() function
$con = connection();

// getting data from database
$sql = "SELECT * FROM student_list ORDER BY id DESC"; //adding ORDER BY to display the latest input first
$students = $con->query($sql) or die($con->error); //query the database //note: die() function is used for error proofing in case of query failure
$row = $students->fetch_assoc(); //fetch the associated data

/*
// test code if we can get all the data from database using do-while loop
do {
  echo $row['first_name'] . " " . $row['last_name'] . "<br/>";
} while ($row = $students->fetch_assoc());
*/

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
  <h1>Student Management System</h1>
  <br><br>

  <form action="result.php" method="get">
    <input type="text" name="search" id="search">
    <button type="submit">Search</button>
  </form>

  <!-- set values and conditions of a button depending if there is user logged-in -->
  <?php if (isset($_SESSION['UserLogin'])) { ?>
    <a href="logout.php">Logout</a>
  <?php } else { ?>
    <a href="login.php">Login</a>
  <?php } ?>

  <a href="add.php">Add New</a>

  <table>
    <thead>
      <tr>
        <th></th>
        <th>First Name</th>
        <th>Last Name</th>
      </tr>
    </thead>

    <!-- looping and inserting php code on tbody -->
    <tbody>
      <?php do { ?>
        <tr>
          <!-- code below call the id number based on database -->
          <td><a href="details.php?ID=<?php echo $row['id']; ?>">view</a></td>

          <td><?php echo $row['first_name']; ?></td>
          <td><?php echo $row['last_name']; ?></td>
        </tr>
      <?php } while ($row = $students->fetch_assoc()); ?>
    </tbody>
  </table>
</body>

</html>