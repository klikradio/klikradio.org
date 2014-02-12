<?php

// Welcome to Cody's PHP Framework

// Include the Config File
require_once('../globals/config.php');

// Connect to the Database
mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);

// Check Database Connection
if (mysqli_connect_errno())
{
  print "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}

// Determine the URL being requested
define('URL', $_SERVER["REQUEST_URI"]);
$url_exploded = explode("/", URL);
// Determine if Backend is being requested
if($BACKEND_SLUG == $url_exploded[1])
{
  // Backend Requested
  $slug = $url_exploded[2];
}
else
{
  $slug = $url_exploded[1];
}

// Check if User is Logged In Or Not && Has Access

// What Page is being requested (slug manager)
var_dump($_SERVER);

?>