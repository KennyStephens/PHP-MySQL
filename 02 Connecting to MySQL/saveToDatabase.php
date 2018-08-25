<?php
// Load the variables from the form
$fullname = $_POST[fullname];
$favband = $_POST[favband];
$email = $_POST[email];
$favpet = $_POST[favpet];
$radio = $_POST[radio];

// Build the database connection with host, user, pass, database
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection Failed');


// Build the query
$query = "INSERT INTO dgm3760 (name, band, email, pet, nightday)".
"VALUES ('$fullname','$favband','$email ','$favpet','$radio ')";


// Now try and talk to the database
$result = mysqli_query($dbconnection, $query) or die('Query Failed');


// We're done so hang up
mysqli_close($dbconnection);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <title>Thanks!</title>
</head>
<body>

<p>Thanks <?php echo $fullname; ?>, for filling out this awesome form!</p>

<p><?php echo $favband; ?> is such a great band and my favorite pet is a <?php echo $favpet; ?> also. And it's nice to know that you <?php echo $radio ?>.</p>

<p>We will be in contact through your email, <?php echo $email ?>.</p>



</body>
</html>