<?php
$queryaddition = '';

if(isset($_GET['race'])) {
  $queryaddition = "WHERE race=$_GET[race]";
}




require_once('variables.php');

 // Build connection to database ---------------------------------------
 $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('Connection to the database failed.');

 // Build the query for inner join
 $query = "SELECT * FROM character_info INNER JOIN char_race ON (character_info.race = char_race.char_id) $queryaddition ORDER BY race";

 // Talk to databse
 $result = mysqli_query($dbconnection, $query) or die ('Query Failed');





?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Character Creation</title>
  </head>

  <body style="background: #cb2d3e;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ef473a, #cb2d3e);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ef473a, #cb2d3e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
<?php include_once('navbar.php');   ?>
    <div class="container">

    <h1 class="mt-3 text-light">Character Directory</h1>
       
      <?php
        if(mysqli_num_rows($result) == 0) {
          echo '<p>Sorry but no matches were found.</p>';
        }


        while($row = mysqli_fetch_array($result)) {
            echo '<div class="card mt-2 d-block">';
            echo '<div class="card-body">';
            echo '<h2>'.$row['name'].'</h2>';
            echo '<p>';
            // Ternary operator
            echo ($row['righteousness'] == 1 ? 'The good ' : 'The bad ') . $row['name'];
            echo ' is a created character of the race <em>'. $row['value'].'</em>.</p>';

            echo '<p>';
      
            echo '<strong>'.$row['name'].'</strong> is trained and skilled with the following traits:</p>';

            // Assign user id to variable
            $theid = $row['id'];

            // Build another inner join
            $query2 = "SELECT * FROM char_skill INNER JOIN char_traits ON (char_skill.ch_id = char_traits.trait_id) WHERE id=$theid";

            // Talk to database
            $resultPackage = mysqli_query($dbconnection, $query2) or die ('Package Query Failed');

            while($row2 = mysqli_fetch_array($resultPackage)) {
                echo '<p class="mb-0">'.$row2['trait'].'</p>';
            }



            echo '</div>';
            echo '</div>';
            echo '<br>';

        } // end of while




    ?>

 
      

      
    </div> <!--end of container-->

    <?php
        mysqli_close($dbconnection);
    ?>
  




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
