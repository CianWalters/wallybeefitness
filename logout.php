<?php
//This includes the session start() to resume the session on this page. It identifies the session that needs to be desroyed. 
include_once 'includes/session.php'
?>
<?php
//session_destroy() destroy the session. Then the header() function redirects to the home page.
session_destroy();
header('Location: index.php');

?>