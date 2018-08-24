<?php
// Load the variables from the form
$fullname = $_POST[fullname];
$favband = $_POST[favband];
$email = $_POST[email];
$favpet = $_POST[favpet];
$radio = $_POST[radio];

// echo $fullname;
// echo $favband;
// echo $email;
// echo $favpet;
// echo $radio;

// Build the email
$to = 'kennethcstephens@gmail.com';
$subject = 'Send Email with PHP';
$message = "$fullname has filled out your SEND EMAIL WITH PHP form.";

// Send email
mail($to, $subject, $message, 'FROM:'.$email);

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