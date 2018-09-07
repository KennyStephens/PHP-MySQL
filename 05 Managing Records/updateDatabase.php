<?php
$id = $_POST['id'];
$first = $_POST['first'];
$last = $_POST['last'];
$department = $_POST['dept'];
$phone = $_POST['phone'];

  // Build connection to database ---------------------------------------
  $dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');

  // Build the query
  $query = "UPDATE employee_simple SET first='$first', last='$last', dept='$department', phone='$phone' WHERE id=$id";

  // Talk to database
  $result = mysqli_query($dbconnection, $query) or die ('Query Failed');

  // Close connection
  mysqli_close($dbconnection);

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
<h1>Employee Successfully Updated</h1>

<?php
echo "$first $last <br>";
echo "$department<br>";
echo "$phone <br>";
echo '<img src="'.$filepath.$filename.'"/>';

?>
  </div>
</body>
</html>