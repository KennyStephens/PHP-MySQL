<?php
require_once('variables.php');

    $name = $_POST['name'];
    $age = $_POST['age'];
    $righteousness = $_POST['righteousness'];
    $clan = $_POST['clan'];
    $race = $_POST['race'];

 // Build connection to database ---------------------------------------
 $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('Connection to the database failed.');

// Build the query
$query = "INSERT INTO character_info(name, age, righteousness, clan, race) VALUES ('$name','$age','$righteousness','$clan','$race')";

// Talk to database
$result = mysqli_query($dbconnection, $query) or die ('Query failed');

// Update software skills
// This id was just added
$recent_id = mysqli_insert_id($dbconnection);

// Loop through array that contains all the packages they selected
foreach($_POST['trait'] as $ch_id) {
    // Build the query
$query = "INSERT INTO char_skill(id, ch_id) VALUES ('$recent_id','$ch_id')";

// Talk to database
$result = mysqli_query($dbconnection, $query) or die ('Query failed');

}; // End of foreach

mysqli_close($dbconnection);


  require_once('variables.php');

  // Build connection to database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('Connection to the database failed.');

// Get the emphasis from database
$query = "SELECT * FROM char_race";
$resultEmphasis = mysqli_query($dbconnection, $query) or die ('Query failed');

// Get the software names
$query = "SELECT * FROM char_traits ORDER BY trait ASC";
$resultPackage = mysqli_query($dbconnection, $query) or die ('Query failed');






?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Confirm Addition</title>
  </head>

  <body style="background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
<?php include_once('navbar.php');   ?>
    <div class="container">
      
      <h3 class="mt-3">Your character has been added to the character database.</h3>
        <a href="new.php">Add another character</a><br>
      <a href="index.php">Return to the home page</a>
      


    </div>
  




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

