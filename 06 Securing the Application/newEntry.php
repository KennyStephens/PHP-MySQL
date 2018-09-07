

<?php
	require_once('variables.php');
if (isset($_POST['submit'])){
$name = $_POST['name'];
$topic = $_POST['topic'];
$comment = $_POST['comment'];
	
	//build db connection
	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
//build the select query
$query = "INSERT INTO blog(name, topic, comment, date, approved)"."VALUES ('$name','$topic','$comment', now() ,'$approved')";
//now and try to talk to the database
$result = mysqli_query($dbconnection, $query) or die('query failed');
	
//were done so hang up
mysqli_close($dbconnection);
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
    
      <h1 class="mt-3">Make a Comment</h1>

      <form action="uploaded.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" placeholder="First Name" name="name" value="Kenny">
        </div>

          <div class="form-group">
    <label for="exampleFormControlSelect1">Topic</label>
    <select class="form-control" id="exampleFormControlSelect1" name="topic">
      <option>Web Development</option>
      <option>I.T.</option>
      <option>Engineering</option>
      <option>Digital Cinema</option>
    </select>
  </div>

    <div class="form-group">
    <label for="exampleFormControlTextarea1">Comments</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" ></textarea>
  </div>



               
        <button type="submit" class="btn btn-primary mt-3" value="submit">Submit</button>
      </form>

    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
