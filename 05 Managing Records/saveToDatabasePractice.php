<?php
$first = $_POST[first];
$last = $_POST[last];
$department = $_POST[dept];
$phone = $_POST[phone];
$photo = $_POST[photo];

// Make photo path and name
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
echo $ext;


// $filename = '/dgm3760/manage-records/'.$first . $last.'.'.$ext;
// echo $filename;



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Thanks Page</title>
</head>
<h1>Test Upload Page</h1>

<?php

echo '<img src="'.$filename.'" alt="photo"/>';

echo '<br>Size--'.$_FILES['photo']['size'];
echo '<br>Type--'.$_FILES['photo']['type'];
echo '<br>temp--'.$_FILES['photo']['tmp_name'];
echo '<br>Name--'.$_FILES['photo']['name'];

?>
  
</body>
</html>