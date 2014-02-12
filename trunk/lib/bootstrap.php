<?php

// Include the Core Framework Classes
require_once('framework/framework.php');
require_once('framework/db_manager.php');
require_once('framework/url_manager.php');
require_once('framework/page_manager.php');

// Include Site Specific Classes

// Inlude Site Config
require_once('config.php');


/* Start Loading the Website */

// Connect to the Database
$DB = new DB($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);

$PAGE = new PAGE($DB);