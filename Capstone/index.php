<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

      <style>
    .card:hover {transform:scale(1.01); transition: all .3s;}
   </style>

  <title>Movie Directory</title>
</head>
<?php
include_once('navbar.php');
?>
<div class="container">
<h1>Movie Database Directory</h1>

<?php
require_once('variables.php');
// connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Failed to connect to database');
// build query
$query = "SELECT * FROM capstone ORDER BY title ASC";
// send to database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

while($row = mysqli_fetch_array($result)) {

  echo '<div class="card mb-3 shadow">';
  echo '<div class="card-body">';
  echo '<img class="m-2" style="float:left;margin-right:20px !important;" src="movies/'.$row['photo'].'"></img>';
  echo '<div>';
  echo '<h2 class="mb-0">'.$row['title'].'</h2><span class="ml-1 text-info">Rating: '.$row['rating'].'</span>';
  echo '<br>';
  echo '<h4 class="mt-2">Description:</h4>';
  echo '<p>'.$row['description'].'</p>';
  echo '<a href="details.php?id='.$row['id'].'">See Details</a>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}

// Hang up
mysqli_close($dbconnection);
?>
  </div>
</body>
</html>