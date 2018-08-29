<?php

$firstname = $_POST[firstname];
$lastname = $_POST[lastname];
$email = $_POST[email];

// Build the Database connection with host, user, pass, database
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');

// Build the query
$query = "INSERT INTO newsletter (first, last, email)".
"VALUES ('$firstname','$lastname','$email')";


// Now try and talk to the database
$result = mysqli_query($dbconnection, $query) or die ('Query failed');

// Close connection
mysqli_close($dbconnection);
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Spamming Email</title>
</head>
<body>
  Thanks for signing up for the newsletter!
</body>
</html>