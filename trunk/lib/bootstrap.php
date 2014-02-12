<?php

// Include the Core Framework Classes
require_once('framework/framework.php');
require_once('framework/db_manager.php');
require_once('framework/url_manager.php');
require_once('framework/page_manager.php');
require_once('framework/user_manager.php');

// Include Site Specific Classes

// Inlude Site Config
require_once('config.php');


/* Start Loading the Website */

// Create the Database Instance
$DB = new DB($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);

$URL = new URL($DB, $_SERVER["HTTP_HOST"], $_SERVER["REQUEST_URI"]);

$PAGE = new PAGE($URL);