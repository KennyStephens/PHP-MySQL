
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
<h1>Employee Directory</h1>

<?php
$photo = $_POST['photo'];
// Make photo path and name
$ext = pathinfo( $_FILES['photo']['name'], PATHINFO_EXTENSION);
$filename = $first. $last.time().'.'.$ext.'';
$filepath =  'employees/';

// connection
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');
// build query
$query = "SELECT * FROM employee_simple ORDER BY last ASC";
// send to database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

while($row = mysqli_fetch_array($result)) {

  echo $row['last'].', '. $row['first'].' - '.$row['dept'];
  echo '<a href="update.php?id='.$row['id'].'"> - Update </a>';
  echo '</p>';
}

// Hang up
mysqli_close($dbconnection);
?>
  </div>
</body>
</html>