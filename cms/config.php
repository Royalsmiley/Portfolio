<?php
if ( !isset($_SESSION) ) {
	session_set_cookie_params(600);
	session_start();
}
include('cms/class.database.php');
// Create connection
$db = db::getInstance();
// Check connection
if ($db->connect_errno)
  {
  echo "Failed to connect to MySQL: " . $db->connect_errno;
  }
 
if ( !isset($_SESSION) ) {
	session_set_cookie_params(600);
	session_start();
}
?>