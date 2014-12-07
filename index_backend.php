<!-- Project: LiveVibe
Author: Xun Gong, Wei Yu
Date: Dec 4th, 2014 -->

<!-- PHP and manipulate with livevibe database -->
<?php
// Session start in connectdb.php file
require ("connectdb.php");

// Check if form pass nothing to this page
if (!empty($_POST["username"]) && !empty($_POST["password"])) {
	// Set local variables
    $submit_username = $_POST["username"];
    $submit_pwd = $_POST["password"];
    // Login status
    $user_exist = false;
    $password_valid = false;
    // Define prepared statements
    $stmtUsr = $mysqli->prepare("CALL check_id(?)");
    $stmtPwd = $mysqli->prepare("CALL check_pwd(?, ?)");
    // Bind parameters
    $stmtUsr->bind_param('s', $submit_username);
    $stmtPwd->bind_param('ss', $submit_username, $submit_pwd);
    // Execute SQL and bind to result
    if (!$stmtUsr->execute()) {
        echo "execute failed";
    }
    if (!$stmtUsr->store_result()) {
        echo "store_result failed";
    }
    if ($stmtUsr->num_rows) {
    	// Username existed
    	$user_exist = true;
    }
    $stmtUsr->free_result();
    $stmtUsr->closed;

    /* Everytime we would like to call another sp */
    $mysqli->next_result();

    // Check password
    if ($user_exist) {
        if (!$stmtPwd->execute()) {
        	echo "execute failed";
        }
        if (!$stmtPwd->store_result()) {
        	echo "store_result failed";
        }
        if ($stmtPwd->num_rows) {
        	$password_valid = true;
        }
    }
    else {
    	// Username not exist
        echo "<html>\n";
        echo "<script>alert(\"Username Not Exist !\")</script>";
        echo "</html>";
        header("refresh:0; http://localhost:8888/livevibe/index_backend.php");
        die();    	
    }

    if ($user_exist && $password_valid) {
        // Success logged in
        $_SESSION["username"] = $submit_username;
        echo "<html>";
        echo "<script>";
		echo "window.location = \'http://localhost:8888/livevibe/profile.php\'";
        echo "</script>";
        echo "</html>";
        // header("Location: profile.php");
        // die();
    }
    else {
        echo "<html>\n";
        echo "<script>alert(\"Wrong Password!\")</script>";
        echo "</html>";
        header("refresh:0; http://localhost:8888/livevibe/index_backend.php");
    }
}
else {
	echo "<html>\n";
	echo "<script>alert(\"Username and Password Required !\")</script>";
	echo "</html>";
	header("refresh:0; http://localhost:8888/livevibe/index_backend.php");
}


?>


<!DOCTYPE html>
<!-- Sandwich delivery shop written by Xun Gong -->
<html>
<head>
    <title>LiveVibe</title>
</head>
<body>
    <h1>LiveVibe Login</h1>
    <form action="index_backend.php" method="POST">
        username:<br>
        <input type="text" name="username">
        <br>
        <br>
        password:<br>
        <input type="text" name="password">
        <br>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
