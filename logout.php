<!-- Project: LiveVibe
Author: Xun Gong, Wei Yu
Date: Dec 4th, 2014 -->

<!-- PHP and manipulate with livevibe database -->
<?php
// Session start in connectdb.php file
require ("connectdb.php");
// Unset all session variables
unset($_SESSION["username"]);
unset($_SESSION["login_type"]);
redirect("http://localhost:8888/livevibe/index.php");
exit;
?>

