<?php

  if (isset($_POST['submit'])) {
    require_once('variables.php');
    // Load the post data into PHP variables
    $name = $_POST['name'];
    $bands = $_POST['bands'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $birthday = $month.'_'.$day.'_'.$year; 

    // Connect to database
    $dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('Failed to connect to database');

    // Build the query
    $query = "INSERT INTO bands (name, birthday, bands) VALUES ('$name', '$birthday', '$bands')";

    // Talk to database
    $result = mysqli_query($dbconnection, $query) or die ('Query failed');

    // Hang up
    mysqli_close($dbconnection);

    header('Location: index.php');
    exit ;
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

    <title>Add Member to Music Directory</title>
  </head>
  <?php include_once('navbar.php'); ?>
  <body>
    <div class="container">
    
      <h1 class="mt-3">Add to Music Fan List</h1>

      <form action="add.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Full Name:</label>
          <input type="text" class="form-control" name="name" value="Kenny">
        </div>

        <div class="form-group">
          <label>Current Month</label>
          <select class="form-control mb-2" name="month">
            <option>Month</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            <option>06</option>
            <option>07</option>
            <option>08</option>
            <option>09</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
          </select>
        </div>

           <div class="form-group">
          <label>Current Day</label>
          <select class="form-control mb-2" name="day">
            <option>Day</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            <option>06</option>
            <option>07</option>
            <option>08</option>
            <option>09</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option>31</option>
          </select>
        </div>

        <div class="form-group">
          <label>Current Year</label>
          <input type="text" class="form-control" placeholder="1988" name="year" value="1988" pattern="[0-9]{4}">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Comments</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bands" ></textarea>
        </div>

               
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
