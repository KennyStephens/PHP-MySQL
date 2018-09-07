<?php
require_once('variables.php');

// Build connection
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('Connection to the database failed.');

// Build query
$query = "SELECT * FROM blog WHERE approved=1 ORDER BY date ASC";

// Talk to database
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" con tent="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Employee Directory</title>
</head>
<?php include_once('navbar.php'); ?>
<div class="container">
<h1>Employee Directory</h1>
<h2>Blog Comments</h2>


  </div>
</body>
</html>