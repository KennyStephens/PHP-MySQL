<?php
$employee_id = $_GET[id];

// Build connection
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');

// Build query
$query = "SELECT * FROM employee_simple WHERE id=$employee_id";

// Talk to database
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');

$found = mysqli_feetch_array($result);

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" con tent="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Employee Directory Details</title>
</head>
<h1>Deleting an Employee</h1>
<form action="delete2.php" method="POST">
<?php

// Display what we found
echo '<h2>'.$found['first'].''.$found['last'].'</h2>';
echo '<p>';
echo $found['dept'].'<br>'.$found['phone'];
echo '</p>';
?>

<button type="submit" name="submit" class="btn btn-primary mt-3">Delete This Person</button>
<a href="delete.php">Cancel</a>
</form>

// 4:30

   
</body>
</html>