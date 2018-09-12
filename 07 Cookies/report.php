<?php include_once('protect.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Report an Outage</title>
  </head>

  <body>
    <div class="container">
    <?php include_once('navbar.php'); ?>
      <h1 class="mt-3">Report an Outage</h1>

      <form action="" method="POST" enctype="multipart/form-data">
      
      <h3>Your Information</h3>
        <div class="form-group">
          <label>Your Name:</label>
          <input type="text" class="form-control" placeholder="John Smith" name="name" required value="">
        </div>

        <div class="form-group">
          <label>Customer Account Number:</label>
          <input type="number" class="form-control" name="number" required value="">
        </div>

        <h3>Outage Details</h3>

        <div class="form-group">
          <label>Location</label>
          <input type="text" class="form-control" placeholder="Location" name="name" required value="">
        </div>

        <div class="form-group">
          <label>Date</label>
          <input type="date" class="form-control" placeholder="date" name="username" required value="">
        </div>


        <div class="form-group">
          <label>Time:</label>
          <input type="text" class="form-control" name="time" required>
        </div>
       
        <button type="submit" class="btn btn-primary mt-3" value="submit">Sign Up</button>

      </form>

    </div>
  




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>