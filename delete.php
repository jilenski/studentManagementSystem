<?php

include_once("connections/connection.php");
$con = connection();

if (isset($_POST['delete'])) {

  $id = $_POST['ID'];
  $sql = "DELETE FROM student_list WHERE ID = '$id'";
  $con->query($sql) or die($con->error);
  echo header("Location: index.php");
}
