<?php
include_once('protect.php');
    require_once('variables.php');
    
    $movieID = $_GET['id'];

    	//build db connection
	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');

if (isset($_POST['submit'])){

$rating = $_POST['rating'];
$comment = mysqli_real_escape_string($dbconnection, trim($_POST['comment']));
// $comment = $_POST['comment'];
$movieID = $_POST['movieID'];
$userName = $_POST['userName'];

	

//build the select query
$query = "INSERT INTO capstone_comments(rating, comment, movieID, userName) VALUES ('$rating','$comment', '$movieID', '$userName' )";
//now and try to talk to the database
$result = mysqli_query($dbconnection, $query) or die('query failed');
	
//were done so hang up
mysqli_close($dbconnection);

header('Location: index.php');
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

    <title>Make a Comment</title>
  </head>
  <?php include_once('navbar.php'); ?>
  <body>
    <div class="container">
    
      <h1 class="mt-3">Leave a Comment</h1>

      <form action="comment.php" method="POST" enctype="multipart/form-data">
 

          <div class="form-group">
    <label for="exampleFormControlSelect1">Rating</label>
    <select class="form-control" id="exampleFormControlSelect1" name="rating">
      <option>Great</option>
      <option>Okay</option>
      <option>Terrible</option>
    </select>
  </div>

    <div class="form-group">
    <label for="exampleFormControlTextarea1">Comments</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" ></textarea>
  </div>

        <input type="hidden" name="movieID" value="<?php echo $movieID; ?>">
        <input type="hidden" name="userName" value="<?php echo $_COOKIE['username']; ?>">

               
        <button type="submit" class="btn btn-primary mt-3" value="submit" name="submit">Submit</button>
      </form>

    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
