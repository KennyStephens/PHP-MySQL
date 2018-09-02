
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Deleting Records</title>
  </head>
  <body>
    <div class="container">
    
      <h4 class="mt-3">Deleting Records</h4>

      <form action="<?php $SERVER['PHP_SELF'];?>" method="POST">
        <p>Please select the emails you'd like to remove.</p>
        <?php
 
// Build the Database connection with host, user, pass, database
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');

// Delete selected records
if(isset($_POST['submit'])) {
  foreach($_POST['todelete'] as $delete_id) {
    // echo $delete_id;
    $query = "DELETE FROM newsletter WHERE id=$delete_id";

    // Now try and talk to the database
$result = mysqli_query($dbconnection, $query) or die ('Query failed');
  };
};

// Build the query
$query = "SELECT * FROM newsletter";

// Now try and talk to the database
$result = mysqli_query($dbconnection, $query) or die ('Query failed');

// Display remaining records
while($row = mysqli_fetch_array($result)) {
  echo '<div class="form-check">';
  echo '<label class="form-check-label">';
  echo '<input type="checkbox" value ="'.$row['id'].'  " name="todelete[]"class="form-check-input"/>';
  echo $row['first'] .' '. $row['last'] .' - '. $row['email'];
  echo '</label>';
  echo '</div>';
};

// Close connection
mysqli_close($dbconnection);

?>

      

               
        <button type="submit" class="btn btn-success mt-3" name="submit" value="Remove from list">Remove From List</button>
      </form>



    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
