<?php
$queryaddition = '';

if(isset($_GET['emphasis'])) {
  $queryaddition = "WHERE emphasis=$_GET[emphasis]";
}




require_once('variables.php');

 // Build connection to database ---------------------------------------
 $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('Connection to the database failed.');

 // Build the query for inner join
 $query = "SELECT * FROM dgm_student INNER JOIN dgm_emphasis ON (dgm_student.emphasis = dgm_emphasis.emphasis_id) $queryaddition ORDER BY last";

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

    <title>Show All Students</title>
  </head>

  <body style="background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
<?php include_once('navbar.php');   ?>
    <div class="container">
       
      <?php
        if(mysqli_num_rows($result) == 0) {
          echo '<p>Sorry but no matches were found.</p>';
        }


        while($row = mysqli_fetch_array($result)) {
            echo '<div class="card mt-2 d-block">';
            echo '<div class="card-body">';
            echo '<h2>'.$row['first'].' '.$row['last'].'</h2>';
            echo '<p>';
            // Ternary operator
            echo ($row['gender'] == 1 ? 'Mr.' : 'Ms.') . $row['last'];
            echo ' is a Digital Media Student emphasizing in '. $row['value'].'.</p>';

            echo '<p>';
            // Ternary operator
            echo ($row['gender'] == 1 ? 'He ' : 'She ');
            echo 'is competent with the following software packages:</p>';

            // Assign user id to variable
            $theid = $row['id'];

            // Build another inner join
            $query2 = "SELECT * FROM dgm_softwareskill INNER JOIN dgm_packages ON (dgm_softwareskill.package_id = dgm_packages.package_id) WHERE id=$theid";

            // Talk to database
            $resultPackage = mysqli_query($dbconnection, $query2) or die ('Package Query Failed');

            while($row2 = mysqli_fetch_array($resultPackage)) {
                echo '<p class="mb-0">'.$row2['package'].'</p>';
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
