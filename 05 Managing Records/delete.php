<?php
// Build connection
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');

// Build query
$query = "SELECT * FROM employee_simple ORDER BY last ASC";

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
  <title>Remove Employees</title>
</head>
<h1>Delete Employees</h1>

<?php

// Display what we found
while($row = mysqli_fetch_array($results)) {
    echo '<p>';
    echo $row['last'] .', '. $row['first']. ' - '.$row['dept'];
    echo '<a href="delete2.php?id='. $row['id'].'">delete2.php</a>';
    echo '</p>';
};

?>
  
</body>
</html>