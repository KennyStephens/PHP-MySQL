<!-- <nav class="mt-4">
<p>Hello



</p>
</nav> -->


<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
<a class="navbar-brand" href="index.php">Movie Directory</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addMovie.php">Add New Movie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search.php">Search</a>
      </li>
      <li class="nav-item">
      <?php
    if(isset($_COOKIE['username'])) {
        // echo $_COOKIE['firstname'].' '.$_COOKIE['lastname'];
        echo '<a  class="nav-link" href="logout.php">'. $_COOKIE['firstname'].' '.$_COOKIE['lastname'].' | Sign Out</a>';
    } else {
        echo '<a class="nav-link" href="login.php"> | Login</a>';
    }
?>
      </li>
    </ul>
  </div>
</nav>