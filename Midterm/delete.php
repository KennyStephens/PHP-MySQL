
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
<?php
include_once('navbar.php');
?>
<div class="container">
<h1>Delete Employees</h1>

<?php
// connection
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');
// build query
$query = "SELECT * FROM midterm ORDER BY last ASC";
// send to database
$result = mysqli_query($dbconnection, $query) or die ('query failed');
while($row = mysqli_fetch_array($result)) {
    echo '<p>';
    echo $row['name'] .', '. $row['phone'] .' - '. $row['expertise'];
    echo '<a href="delete2.php?id='.$row[id].'"> Delete</a>';
    echo '</p>';
}
// close collection
mysqli_close($dbconnection);
?>
  </div>
</body>
</html>