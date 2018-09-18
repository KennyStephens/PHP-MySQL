<?php 
  require_once('variables.php');
  // connection
  $dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Connection to the database failed.');
  // build query
  $query = "SELECT * FROM bands ORDER BY name ASC";
  // send to database
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  // convertMonth function
  function convertMonth($a) {
    switch($a) {
      case '01': 
      $b = 'January';
      break;
      case '02':
      $b = 'February';
      break;
      case '03':
      $b = 'March';
      break;
      case '04':
      $b = 'April';
      break;
      case '05':
      $b = 'May';
      break;
      case '06':
      $b = 'June';
      break;
      case '07':
      $b = 'July';
      break;
      case '08':
      $b = 'August';
      break;
      case '09':
      $b = 'September';
      break;
      case '10':
      $b = 'October';
      break;
      case '11':
      $b = 'November';
      break;
      case '12':
      $b = 'December';
      break;
    }
    return $b;
  } // End of function

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" con tent="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <style>
    .card:hover {transform:scale(1.01); transition: all ease .3s;}
  </style>  
  <title>Music Fan List Directory</title>
</head>
<?php
include_once('navbar.php');
?>
<div class="container">
<h1 class="mb-4">Music Fan List Directory</h1>

<?php

while($row = mysqli_fetch_array($result)) {
  $day = substr($row['birthday'], 3 , 2);
  $monthNum = substr($row['birthday'],0 , 2);
  $monthName = convertMonth($monthNum); // call a function
  $year = substr($row['birthday'],6 , 4);

  echo '<div class="card mb-3 shadow">';
  echo '<div class="card-body">';
  echo '<h2>'.$row['name'].'</h2>';
  echo '<small class="text-muted" style="display:inline">Date Added:   </small><small class="text-muted">'.$monthName.' '.$day.', '.$year.'</small>';
  echo '<hr>';

  echo '<h5 class="mt-3">Favorite Bands</h5>';
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