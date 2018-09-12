<nav class="mt-4">
<p>Hello
<?php
    if(isset($_COOKIE['username'])) {
        echo $_COOKIE['firstname'].' '.$_COOKIE['lastname'];
        echo ' | <a href="logout.php">Sign Out</a>';
    } else {
        echo ' | <a href="login.php">Login</a>';
    }
?>

</p>
</nav>