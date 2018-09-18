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
<h1 class="mb-4">Search Music Fan List Directory</h1>

<form action="search.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Band Name:</label>
          <input type="text" class="form-control" name="band">
        </div>

  
               
        <button type="submit" class="btn btn-primary mt-3" value="submit" name="submit">Search</button>
      </form>

<?php 


  if (isset($_POST['submit'])){
    // Load post data
    $bands = strtolower($_POST['band']);

    // Remove commas
    $bandCleanUp = str_replace(',', ' ', $bands);

    // Break into array
    $searchTerms = explode(' ',$bandCleanUp);

    foreach($searchTerms as $temp ) {
      if(!empty($temp)) {
        $searchArray[] = $temp;
      } // End if
    } // End of loop

    // Build a WHERE clause
    $whereList = array();
    foreach($searchArray as $temp) {
      $whereList[] = "bands LIKE '%$temp%'";
    } // End foreach

    // Build the complete WHER with OR between each term
    $whereClause = implode(' OR ', $whereList);

    

  // build query
  $query = "SELECT * FROM bands";

  if(!empty($whereClause)) {
    $query .= " WHERE $whereClause";
  } // End if

  echo '<h2 class="mt-3">Search Results for <span class="text-primary">'.$bandCleanUp.'</span></h2>';
  echo '<hr>';

  require_once('variables.php');

      // connection
  $dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Connection to the database failed.');

  // send to database
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      echo '<h3>'.$row['name'].'</h3>';

      $myResults = strtolower($row['bands']);

      foreach($searchArray as $temp) {
        $insert = '<span class="text-primary">'.$temp.'</span>';
        $myResults = str_replace($temp, $insert, $myResults);
      } // End of foreach



      echo '<p>'.$myResults.'</p>';
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