<?php
// Load the variables from the form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = 'kennethcstephens@gmail.com';
$subject = 'You received a new email';

// Send email
mail($to, $subject, $message, 'FROM:'.$email);
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Thanks!</title>
</head>
<body>
<div class="container pt-5">
<h2>Thanks for filling out our contact form</h2>

<p>We will be in contact through your email, <?php echo $email ?>.</p>

</div>

</body>
</html>