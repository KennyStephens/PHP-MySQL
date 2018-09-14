

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
<?php
include_once('navbar.php');
?>
<div class="container">
<h1 class="mt-3">Employee Directory</h1>

<?php
// connection
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');
// build query
$query = "SELECT * FROM midterm ORDER BY name ASC";
// send to database
$result = mysqli_query($dbconnection, $query) or die ('query failed');



while($row = mysqli_fetch_array($result)) {



  echo '<div class="card mb-3 shadow">';
  echo '<div class="card-body">';
  echo '<img class="m-2" src="employees/'.$row['photo'].'"></img>';
  echo $row['name'].', '. $row['phone'].' - '.$row['expertise'];
  echo ' - <a href="update.php?id='.$row['id'].'">  Update </a>';
  echo ' - <a href="email.php?id='.$row['id'].'">  Email </a>';
  echo '</p>';
  echo '<br>';
  echo '<p>'.$row['specialization'].'</p>';
  echo '</div>';
  echo '</div>';
}

// Hang up
mysqli_close($dbconnection);
?>
  </div>
</body>
</html>