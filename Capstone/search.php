<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" con tent="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Search Music Fan List Directory</title>
</head>
<?php
include_once('navbar.php');
?>
<div class="container">
<h1 class="mb-4">Search Movie Directory</h1>

<form action="search.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Search Movies</label>
          <input type="text" class="form-control" name="title">
        </div>

  
               
        <button type="submit" class="btn btn-primary mt-3" value="submit" name="submit">Search</button>
      </form>

<?php 
$id = $_GET['id'];

  if (isset($_POST['submit'])){
    // Load post data
    $titles = strtolower($_POST['title']);

    // Remove commas
    $titleCleanUp = str_replace(',', ' ', $titles);

    // Break into array
    $searchTerms = explode(' ',$titleCleanUp);

    foreach($searchTerms as $temp ) {
      if(!empty($temp)) {
        $searchArray[] = $temp;
      } // End if
    } // End of loop

    // Build a WHERE clause
    $whereList = array();
    foreach($searchArray as $temp) {
      $whereList[] = "title LIKE '%$temp%'";
    } // End foreach

    // Build the complete WHER with OR between each term
    $whereClause = implode(' OR ', $whereList);

    

  // build query
  $query = "SELECT * FROM capstone";

  if(!empty($whereClause)) {
    $query .= " WHERE $whereClause";
  } // End if

  echo '<h2 class="mt-3">Search Results for <span class="text-primary">'.$titleCleanUp.'</span></h2>';
  echo '<hr>';

  require_once('variables.php');

      // connection
  $dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Connection to the database failed.');

  // send to database
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      echo '<img class="m-2" style="margin-right:20px !important;" src="movies/'.$row['photo'].'"></img>';
      echo '<div style="display: inline-block;">';
      echo '<a href="details.php?id='.$row['id'].'"><h3>'.$row['title'].'</h3> </a>';
      

      $myResults = strtolower($row['title']);

      foreach($searchArray as $temp) {
        $insert = '<span class="text-primary">'.$temp.'</span>';
        $myResults = str_replace($temp, $insert, $myResults);
      } // End of foreach



      echo '<p>'.$myResults.'</p>';
      echo '</div>';
      echo '<hr>';
    } // end while
  } else {
    echo '<h5>No Results</h5>';
  }


  // Hang up
  mysqli_close($dbconnection);

  } // End of isset




?>








  </div>
</body>
</html>