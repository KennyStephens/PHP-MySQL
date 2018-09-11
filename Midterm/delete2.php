<?php
$employee_id = $_GET[id];

// Build connection
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');

// Delete selected record (in from post)
if(isset($_POST['submit'])) {
  
  // Build select query
  $query = "DELETE FROM midterm WHERE id=$_POST[id]";
  

  // Delete record
  $result = mysqli_query($dbconnection, $query) or die ('Delete Query Failed');

  // Delete the image
  @unlink($_POST['photo']);

  // Redirect
  header("Location: http://thedevelopedweb.com/dgm3760/midterm/delete.php");

  exit;
};




// Build query
$query = "SELECT * FROM midterm WHERE id=$employee_id";

// Talk to database
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');

$found = mysqli_fetch_array($result);

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
<?php
include_once('navbar.php');
?>
<div class="container">
<h1 class="mt-3">Deleting an Employee</h1>
<form action="delete2.php" method="POST">
<?php

// Display what we found
echo '<div class="card mb-3 shadow">';
echo '<div class="card-body">';
echo '<h2>'.$found['name'] .'</h2>';
echo '<p>';
echo $found['expertise'].'<br>'.$found['phone'];
echo '</p>';
echo '</div>';
echo '</div>';
?>

<input type="hidden" name="photo" value="employees/<?php echo $found['photo']; ?>"/>
<input type="hidden" name="id" value="<?php echo $found['id']; ?>"/>

<button type="submit" name="submit" class="btn btn-primary mt-3">Delete This Person</button>
<a href="delete.php"><button class="btn btn-secondary btn-sm mt-3">Cancel</button></a>
</form>



   </div>
</body>
</html>