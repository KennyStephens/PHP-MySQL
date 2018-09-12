<?php
require_once('variables.php');

// Default message to user
$feedback = '<p><a href="signup.php">Create an account</a></p>';

// If the user isn't logged in, try to log them in
if (isset($_POST['submit'])) {
    // Build connection to database
    $dbconnection = mysqli_connect('HOST','USER','PASSWORD','DB_NAME') or die ('Connection to the database failed.');

    // Grab user entered login data
    $username = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
    $password = mysqli_real_escape_string($dbconnection, trim($_POST['password']));

    // Look up username in database
    $query = "SELECT * FROM users WHERE username = '$username' and password = SHA('$password')";
    $data = mysqli_query($dbconnection, $query) or die ('Query failed');

    if(mysqli_number_rows($data) == 1 ) {
        $row = mysqli_fetch_array($data);

        // Make the cookies
        setcookie('username', $row['username'], time() + (60*60*24*30)); // Expires in 30 days
        setcookie('firstname', $row['firstname'], time() + (60*60*24*30)); // Expires in 30 days
        setcookie('lastname', $row['lastname'], time() + (60*60*24*30)); // Expires in 30 days

        header('Location: index.php');
    } else {
        $feedback = '<p>Could not find an account for '.$_POST['username'].'. Would you like to <a href="signup.php">create a new account</a></p>';
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

    <title>Manage Records</title>
  </head>

  <body>
    <div class="container">
    <?php include_once('navbar.php'); ?>
      <h1 class="mt-3">Login</h1>
<?php echo $feedback; ?>
      <form action="login.php" method="POST" enctype="multipart/form-data">
      
      <h3>Login to an existing account</h3>
        <div class="form-group">
          <label>Username:</label>
          <input type="text" class="form-control" placeholder="Username" name="username" required value="<?php if(!empty($username)) echo $username; ?>">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control"  name="password" required value="<?php if(!empty($password)) echo $password; ?>">
        </div>

        <button type="submit" class="btn btn-primary mt-3" value="submit">Login</button>

      </form>

      <p><a href="index.php">Cancel</a></p>

    </div>
  




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>