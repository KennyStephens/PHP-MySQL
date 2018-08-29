<?php 
$subject = $_POST[subject]; 
$message = $_POST[message];
$from = "kennethcstephens@gmail.com";


// Build the Database connection with host, user, pass, database
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');

// Build the query
$query = "SELECT * FROM newsletter";

// Now try and talk to the database
$result = mysqli_query($dbconnection, $query) or die ('Query failed');

// Display what we found
while($row = mysqli_fetch_array($result)) {
  $first_name = $row['first'];
  $last_name = $row['last'];
  $to = $row['email'];

  $newMessage = "Dear $first_name $last_name,\n $message";

  mail($to, $subject, $newMessage, 'From:'.$from);

  echo '<br>Message sent to ' . $to . '<br>';
};

// Close connection
mysqli_close($dbconnection);





?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Send Message</title>
</head>
<body>
  You have sent email to your interested people.
</body>
</html>