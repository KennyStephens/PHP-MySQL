<?php
// Make sure the user is logged in before going any further
if(!isset($_COOKIE['username'])) {
    echo '<p>Please <a href="login.php"> login</a> to access this page.</p>';
    exit();
}

?>