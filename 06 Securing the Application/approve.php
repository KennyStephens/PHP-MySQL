<?php
require_once('variables.php');

// Build connection
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('Connection to the database failed.');

// Build the select query
$query = "SELECT * FROM blog WHERE approved=0 ORDER BY date";

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
  <title>Employee Directory</title>
</head>
<?php include_once('navbar.php'); ?>
<div class="container">
<h1>Blog Comments</h1>

<?php
    


// Display findings
while($row = mysqli_fetch_array($result)) {
    echo '<div class="panel panel-default">';
    echo '<div class="panel-body">';
    echo '<a class="btn btn-success btn-sm" href=approve2.phpid='.$row['id'].'>Approve</a>';
    echo '<a class="btn btn-danger btn-sm" href=delete.phpid='.$row['id'].'>Delete</a>';
    echo '<h3>'.$row['name'].'</h3>';
    echo '<p>'.$row['topic'].'</p>';
    echo '<p>'.$row['date'].'</p>';
    echo '</div>';
    echo '</div>';
}
?>


  </div>
</body>
</html>