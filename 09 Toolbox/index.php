
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" con tent="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Music Fan List Directory</title>
</head>
<?php
include_once('navbar.php');
?>
<div class="container">
<h1 class="mb-4">Music Fan List Directory</h1>

<?php
require_once('variables.php');
// connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Connection to the database failed.');
// build query
$query = "SELECT * FROM bands ORDER BY name ASC";
// send to database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

while($row = mysqli_fetch_array($result)) {

  echo '<div class="card mb-3 shadow">';
  echo '<div class="card-body">';
  echo '<h2>'.$row['name'].'</h2>';
  echo '<br>';
  echo '<h5>Birthday</h5>';
  echo $row['birthday'];
  echo '<br>';
  echo '<h6 class="mt-3">Favorite Bands</h6>';
  echo $row['bands'];
  echo '</div>';
  echo '</div>';

}

// Hang up
mysqli_close($dbconnection);
?>
  </div>
</body>
</html>