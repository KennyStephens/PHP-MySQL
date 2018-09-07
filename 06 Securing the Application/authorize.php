<?php
$username = 'admin';
$password = 'time';

if(!isset($_SERVER['PHP_AUTH_USER']) || (!isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER' != $username])) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
  header('HTTP/1.1 401 Unauthorized');
  header('WWW-Authenticate: Basic realm="Update"');
  exit('No Access');
};




?>