<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


  <title>Movie Details</title>
</head>
<?php
include_once('navbar.php');
?>
<div class="container">
<h1>Movie Database Directory</h1>

<?php
require_once('variables.php');

$id = $_GET['id'];


// connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Failed to connect to database');
// build query
$query = "SELECT * FROM capstone WHERE id='$id'";

// send to database
$result = mysqli_query($dbconnection, $query) or die ('query failed');


while($row = mysqli_fetch_array($result)) {

  echo '<div class="card mb-3 shadow">';
  echo '<div class="card-body">';
  echo '<img style="float:left; margin-right:20px !important;" class="m-2" src="movies/'.$row['photo'].'"></img>';
  echo '<h2 class="mb-0">'.$row['title'].'</h2>';
  echo '<p class="mb-3">Rating: '.$row['rating'].'</p>';
  echo '<h4>Description:</h4>';
  echo '<p>'.$row['description'].'</p>';
  echo '<a href="update.php?id='.$row['id'].'">  Update |</a>';
  echo '<a href="comment.php?id='.$row['id'].'">  Comment </a>';
  echo '</div>';
  echo '</div>';
}

// // Hang up
// mysqli_close($dbconnection);
?>

<?php
require_once('variables.php');

// $comment_id = $_GET['id'];

// connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Failed to connect to database');
// build query
$query2 = "SELECT * FROM capstone_comments";
echo $comment_id;
// send to database
$result2 = mysqli_query($dbconnection, $query2) or die ('query failed');


while($row2 = mysqli_fetch_array($result2)) {

    echo '<div class="card mb-3 shadow">';
    echo '<div class="card-body">';
    echo '<h4>Rating:</h4>';
    echo '<p class="mb-2">'.$row2['rating'].'</p>';

    echo '<h4>Comment:</h4>';
    echo '<p class="mb-0">'.$row2['comment'].'</p>';
   
    echo '</div>';
    echo '</div>';
  }

// Hang up
mysqli_close($dbconnection);
?>

  </div>
</body>
</html>



