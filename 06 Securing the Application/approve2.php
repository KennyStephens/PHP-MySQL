<?php
require_once('authorize.php');
$id = $_GET['id'];

  
  require_once('variables.php');

// Build connection
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('Connection to the database failed.');

// Build select query
$query = "UPDATE blog SET approved=1 WHERE id=$id";

// Talk to database
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');

// Return to approve page
header('Location: approve.php');




?>