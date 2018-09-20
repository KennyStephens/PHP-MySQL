<?php
require_once('variables.php');

$title = $_POST['title'];
$rating = $_POST['rating'];
$description = $_POST['description'];
$photo = $_POST['photo'];

// Make photo path and name
$ext = pathinfo( $_FILES['photo']['name'], PATHINFO_EXTENSION);
$filename = $title.time().'.'.$ext.'';
$filepath =  'movies/';

// Verify the image is valid ---------------------------------------------
$validImage = true;
// Check if image missing
if($_FILES['photo']['size'] == 0) {
  echo 'OOPS, you did not select an image';
  $validImage = false;
};

// Check if image is too large
if($_FILES['photo']['size'] > 204800) {
  echo 'OOPS, that image size was larger than 200KB.';
  $validImage = false;
}

// Check file type
if($_FILES['photo']['type'] =='image/gif' || $_FILES['photo']['type'] =='image/jpeg' || $_FILES['photo']['type'] =='image/jpg' || $_FILES['photo']['type'] =='image/png') {
  // That must be a proper format

} else {
  // Tell user not correct 
  echo 'OOPS, that file is the wrong format.'; 
};

if($validImage == true) {
  // Upload file
  $tmp_name = $_FILES['photo']['tmp_name'];
  move_uploaded_file($tmp_name, "$filepath$filename");
  @unlink($_FILES['photo']['tmp_name']);

  // Build connection to database ---------------------------------------
  $dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Failed to connect to database');

  // Build the query
  $query = "INSERT INTO capstone(title, rating, description, photo) VALUES ('$title','$rating','$description','$filename')";

  // Talk to database
  $result = mysqli_query($dbconnection, $query) or die ('Query Failed');

  // Close connection
  mysqli_close($dbconnection);

  header('Location: index.php');

} else {
  // Give user ability to try again
  echo '<a href="add.html">Please Try Again</a>';
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Thanks Page</title>
</head>
<?php
include_once('navbar.php');
?>
<div class="container">
<h1>Movie Successfully Added</h1>

<?php
// connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Failed to connect to database');
// build query
$query = "SELECT * FROM capstone ORDER BY title ASC";
// send to database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

while($row = mysqli_fetch_array($result)) {

  echo '<div class="card mb-3 shadow">';
  echo '<div class="card-body">';
  echo '<img class="m-2" src="movies/'.$row['photo'].'"></img>';
  echo '<h2>'.$row['title'].'</h2>';
  echo 'Rating:'.$row['rating'];
  echo '<br>';
  echo $row['description'];
  echo ' - <a href="update.php?id='.$row['id'].'">  Update </a>';
  echo '</p>';
  echo '</div>';
  echo '</div>';
}

// Hang up
mysqli_close($dbconnection);
?>
  </div>
</body>
</html>