<?php
require_once('navbar.php');

$employee_id = $_GET[id];

// Build connection
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');

// Build query
$query = "SELECT * FROM midterm WHERE id=$employee_id";

// Talk to database
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');

// Put results in variable
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
  <title>Contact Employees</title>
</head>

<div class="container">
  <h1 class="mt-3">Contact an Employee</h1>
<form action="processEmail.php" method="POST" enctype="">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="<?php echo $found['name']; ?>">
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" value="<?php echo $found['email']; ?>" name="email">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Message</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
        </div>
      

               
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
  </div>

  </div>
</body>
</html>