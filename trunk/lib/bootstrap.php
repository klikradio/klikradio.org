<?php

// Include the Core Framework Classes
require_once('framework/framework.php');
require_once('framework/db_manager.php');
require_once('framework/url_manager.php');
require_once('framework/page_manager.php');
require_once('framework/user_manager.php');
require_once('framework/session_manager.php');
require_once('framework/backend.php');

// Include Site Specific Classes

// Inlude Site Config
require_once('config.php');


/* Start Loading the Website */

// Create the Database Instance
$DB = new DB($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);

$SESSION = new SESSION($DB);

$URL = new URL($DB, $_SERVER["HTTP_HOST"], $_SERVER["REQUEST_URI"]);

if($URL->is_backend())
{
  print 'boss man has been activated';
  $PAGE = new BACKEND($URL);
  // require_once('backend/pages/')
}
else
{
  $template = $URL->get_template();
  $page_vars = $URL->get_all();
  require_once('pages/templates/' . $template . ".php");
}
