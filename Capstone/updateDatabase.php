<?php
require_once('variables.php');

$title = $_POST['title'];
$rating = $_POST['rating'];
$description = $_POST['description'];
$photo = $_POST['photo'];
$id = $_POST['id'];


  // Build connection to database ---------------------------------------
  $dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Failed to connect to database');

  // Build the query
  $query = "UPDATE capstone SET title='$title', rating='$rating', description='$description' WHERE id=$id";

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
<h1>Movie Successfully Updated</h1>

<?php
echo "$title <br>";
echo "$rating<br>";
echo "$description <br>";

?>
  </div>
</body>
</html>