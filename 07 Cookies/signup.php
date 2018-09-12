<?php
require_once('variables.php');

$feedback = '';

// Build connection to database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('Connection to the database failed.');

if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($dbconnection, trim($_POST['firstname']));
    $lastname = mysqli_real_escape_string($dbconnection, trim($_POST['lastname']));
    $username = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbconnection, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbconnection, trim($_POST['password2']));

    // Double check to make sure that we have values
    if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {

    $query = "SELECT * FROM users WHERE username = '$username'";
    $alreadyexists = mysqli_query($dbconnection, $query) or die ('Query failed');

    // Make sure there isn't a duplicate username in DB
    if(mysqli_num_rows($alreadyexists) == 0) {
        // Insert the data
        $query = "INSERT INTO users (firstname, lastname, username, password, date) VALUES ('$firstname', '$lastname', '$username', SHA('$password1'), NOW())";
        
        // Confirm Message
        $feedback = '<p>Your new account has been successfully created</p><br><p>Return to the <a href="index.php">main page</a></p>';

        // Make the cookies
        setcookie('username', $username, time() + (60*60*24*30)); // Expires in 30 days
        setcookie('firstname', $firstname, time() + (60*60*24*30)); // Expires in 30 days
        setcookie('lastname', $lastname, time() + (60*60*24*30)); // Expires in 30 days

        // Close connection
        mysqli_close($dbconnection);
        // Exit page
        exit();
    } else {
        // Username exists
        $feedback = '<p>An account already exists for this username. Please use a different name</p>';
        // $username = '';
    }
}
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Sign Up</title>
  </head>

  <body>
    <div class="container">
    <?php include_once('navbar.php'); ?>
      <h1 class="mt-3">Sign Up</h1>
      <?php echo $feedback; ?>

      <form action="signup.php" method="POST" enctype="multipart/form-data">
      
      <h3>Registration Info</h3>
        <div class="form-group">
          <label>First Name:</label>
          <input type="text" class="form-control" placeholder="John" name="firstname" required value="<?php if(!empty($firstname)) echo $firstname; ?>">
        </div>

        <div class="form-group">
          <label>Last Name:</label>
          <input type="text" class="form-control" placeholder="Smith" name="lastname" required value="<?php if(!empty($lastname)) echo $lastname; ?>">
        </div>

        <div class="form-group">
          <label>Username:</label>
          <input type="text" class="form-control"  name="username" required value="<?php if(!empty($username)) echo $username; ?>">
        </div>


        <div class="form-group">
          <label>Password:</label>
          <input type="password" class="form-control"  name="password1" required>
        </div>

        <div class="form-group">
          <label>Password (retype):</label>
          <input type="password" class="form-control"  name="password2" required>
        </div>
       
        <button type="submit" class="btn btn-primary mt-3" value="submit" name="submit">Sign Up</button>

      </form>

    </div>
  




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>