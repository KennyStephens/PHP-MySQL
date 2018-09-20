<?php
require_once('authorize.php');
require_once('variables.php');
$movie_id = $_GET[id];

// Build connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Failed to connect to database');

// Build query
$query = "SELECT * FROM capstone WHERE id=$movie_id";

// Talk to database
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');

// Put results in variable
$found = mysqli_fetch_array($result);

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Update Movie Databse</title>
  </head>
  <?php
include_once('navbar.php');
?>
  <body>
    <div class="container">
    
      <h4 class="mt-3">Update Movie Database</h4>

      <form action="updateDatabase.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Movie Title</label>
          <input type="text" class="form-control" name="title" value="<?php echo $found['title']; ?>">
        </div>

        <div class="form-group">
          <label>Rating</label>
          <select class="form-control mb-2" name="rating">
            <option>G</option>
            <option>PG</option>
            <option>PG-13</option>
            <option>R</option>
        </select>
      </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Description</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" ></textarea>
        </div>

<input type="hidden" name="id" value="<?php echo $found['id']; ?>">
               
        <button type="submit" class="btn btn-primary mt-3" value="submit" name="submit">Update Database</button>
      </form>

    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
