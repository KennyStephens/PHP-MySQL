<?php
$name = $_POST['name'];
$expertise = $_POST['expertise'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$specialization = $_POST['specialization'];
$photo = $_POST['photo'];

// Make photo path and name
$ext = pathinfo( $_FILES['photo']['name'], PATHINFO_EXTENSION);
$filename = $name.time().'.'.$ext.'';
$filepath =  'employees/';

// Verify the image is valid ---------------------------------------------
$validImage = true;
// Check if image missing
if($_FILES['photo']['size'] == 0) {
  echo 'OOPS, you did not select an image';
  $validImage = false;
};

// Check if image is too large
if($_FILES['photo']['size'] > 204800) {
  echo 'OOPS, that image size was larger than 200KB.';
  $validImage = false;
}

// Check file type
if($_FILES['photo']['type'] =='image/gif' || $_FILES['photo']['type'] =='image/jpeg' || $_FILES['photo']['type'] =='image/pjpeg' || $_FILES['photo']['type'] =='image/png') {
  // That must be a proper format

} else {
  // Tell user not correct 
  echo 'OOPS, that file is the wrong format.'; 
};

if($validImage == true) {
  // Upload file
  $tmp_name = $_FILES['photo']['tmp_name'];
  move_uploaded_file($tmp_name, "$filepath$filename");
  @unlink($_FILES['photo']['tmp_name']);

  // Build connection to database ---------------------------------------
  $dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');

  // Build the query
  $query = "INSERT INTO midterm(name, expertise, email, phone, specialization, photo)"."VALUES ('$name','$expertise','$email','$phone', '$specialization', '$filename')";

  // Talk to database
  $result = mysqli_query($dbconnection, $query) or die ('Query Failed');

  // Close connection
  mysqli_close($dbconnection);

  

} else {
  // Give user ability to try again
  echo '<a href="add.html">Please Try Again</a>';
}



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
<h1>Employee Successfully Added</h1>

<?php
echo "$name <br>";
echo "$phone<br>";
echo "$expertise <br>";
echo '<img src="'.$filepath.$filename.'"/>';

?>
  </div>
</body>
</html>