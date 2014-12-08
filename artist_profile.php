<!-- Project: LiveVibe
Author: Xun Gong, Wei Yu
Date: Dec 4th, 2014 -->

<!-- PHP and manipulate with livevibe database -->
<?php
require ("connectdb.php");

if (isset($_SESSION["username"])) {
    echo "let set LAT";
    // Update lastaccesstime when page load
    $stmtLAT = $mysqli->prepare("CALL update_LAT(?,?,?)");
    $submit_username = $_SESSION["username"];
    $LAT = date("Y-m-d H:i:s");
    $login_type = $_SESSION["login_type"];
    $stmtLAT->bind_param('sss', $submit_username, $LAT, $login_type);
    $stmtLAT->execute();
}
?>