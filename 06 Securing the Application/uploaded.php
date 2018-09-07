<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Information Request</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
crossorigin="anonymous">
</head>
<?php include_once('navbar.php'); ?>
<div class="container">
<?php
$name = $_POST['name'];
$topic = $_POST['topic'];
$comment = $_POST['comment'];
$date = date("Y/m/d");
// connect
require_once('variables.php');
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');
// query
$query = "INSERT INTO blog (name, topic, comment, date) VALUES ('$name','$topic','$comment','$date')";
// send to database
$result = mysqli_query($dbconnection, $query) or die ('query failed');
// end connection
mysqli_close($dbconnection);

echo 'Thank you for submitting your comment. It has been sent for approval to our administrators.';
echo '<br><a class="btn btn-success" href="index.php">Home</a>';

?>
</div>