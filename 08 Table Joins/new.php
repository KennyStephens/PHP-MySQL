<?php
  require_once('variables.php');

  // Build connection to database
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('Connection to the database failed.');

// Get the emphasis from database
$query = "SELECT * FROM dgm_emphasis";
$resultEmphasis = mysqli_query($dbconnection, $query) or die ('Query failed');

// Get the software names
$query = "SELECT * FROM dgm_packages ORDER BY package ASC";
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

    <title>Add a New Student</title>
  </head>

  <body style="background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
<?php include_once('navbar.php');   ?>
    <div class="container">
      
      <h1 class="mt-3">Add a New Student</h1>
      
    
    <form action="saveToDatabase.php" method="POST" enctype="multipart/form-data">

    <h3 class="mt-4">Personal Information</h3>
    <hr>
        <div class="form-group">
          <label>First Name:</label>
          <input type="text" class="form-control" placeholder="First Name" name="firstname" value="Kenny">
        </div>

        <div class="form-group">
          <label>Last Name:</label>
          <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="Stephens">
        </div>

        <div class="form-group mb-5">
            <label>Website:</label>
            <input type="text" class="form-control" placeholder="www.google.com" name="website"></input>
        </div>

      <h3 class="mt-4">Gender</h3>
      <hr>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="exampleRadios1" value="1" name="gender" checked>
            <label class="form-check-label">
            Male
            </label>
        </div>
        <div class="form-check mb-5">
          <input class="form-check-input" type="radio" id="exampleRadios1" value="2" name="gender" checked>
            <label class="form-check-label">
            Female
            </label>
        </div>

        <div class="form-group mb-5">
        <h3 class="mt-4">Emphasis</h3>
        <hr>
        <p>Please select an emphasis:</p>
        <select class="form-control mb-2" name="emphasis">
          <option>Please select...</option>
          <?php 
            while($row = mysqli_fetch_array($resultEmphasis)) {
              echo '<option value="'.$row['emphasis_id'].'">'.$row['value'].'</option>';
            };
          ?>
      </select>
    </div>

    <h3 class="mt-4">Software Skills</h3>
    <hr>
    <p>Check the packages you know well:</p>
    <div class="form-check">
     
      <?php 
            while($row = mysqli_fetch_array($resultPackage)) {
             echo '<div class="form-check">';
              echo '<input class="form-check-input" type="checkbox" value="'.$row['package_id'].'" name="packages[]" id="defaultCheck1">';
              echo '<label class="form-check-label" for="defaultCheck1">';
                echo $row['package'];
              echo '</label>';
            echo '</div>';
            };
          ?>
   




               
        <button type="submit" class="btn btn-primary mt-3 mb-5" value="submit" name="submit">Add a New Student</button>
      </form>

      

    </div>
  




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>