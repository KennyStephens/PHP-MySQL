<?php
$employee_id = $_GET[id];

// Build connection
$dbconnection = mysqli_connect('localhost','thedevf5_3760use','I22slh#DQCU','thedevf5_3760test') or die ('Connection to the database failed.');

// Build query
$query = "SELECT * FROM employee_simple WHERE id=$employee_id";

// Talk to database
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');

// Put results in variable
$found = mysqli_fetch_array($result);

// // Verify photo exists
// if(file_exists('employees/'.$found['photo']) && $found['photo'] <> '') {
//   //echo 'image found';
//   $photoPath = 'employees/'.$found['photo'];
// } else {
//   // echo 'image missing'
//   $photoPath = 'employees/missing.jpg';
// }
// ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Update Employee</title>
  </head>
  <?php
include_once('navbar.php');
?>
  <body>
    <div class="container">
    
      <h4 class="mt-3">Update Employee</h4>

      <form action="updateDatabase.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>First Name:</label>
          <input type="text" class="form-control" placeholder="First Name" name="first" value="<?php echo $found['first']; ?>">
        </div>

        <div class="form-group">
          <label>Last Name:</label>
          <input type="text" class="form-control" name="last" value="<?php echo $found['last']; ?>">
        </div>

        <div class="form-group">
            <label>Phone:</label>
            <input type="phone" class="form-control" name="phone" value="<?php echo $found['phone']; ?>"></input>
        </div>

        <div class="form-group">
        <label>Department</label>
        <select class="form-control mb-2" name="dept">
          <option><?php echo $found['dept']; ?></option>
          <option>-----------</option>
          <option>Animation</option>
          <option>Web Development</option>
          <option>User Experience</option>
          <option>Computer Science</option>
      </select>
    </div>

<input type="hidden" name="id" value="<?php echo $found['id']; ?>">
               
        <button type="submit" class="btn btn-primary mt-3" value="submit">Update</button>
      </form>

    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
