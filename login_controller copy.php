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
    // Deal with unwanted HTML
    $submit_username = htmlspecialchars($submit_username);
    $submit_pwd = htmlspecialchars($submit_pwd);
    $login_type = NULL;
    // Login status
    $user_exist = false;
    $password_valid = false;
    // Define prepared statements
    $stmtUsr = $mysqli->prepare("CALL check_id(?)");
    $stmtPwd = $mysqli->prepare("CALL check_pwd(?, ?, ?)");
    // Bind parameters
    $stmtUsr->bind_param('s', $submit_username);
    // Execute SQL and bind to result
    if (!$stmtUsr->execute()) {
        echo "execute failed";
    }
    $stmtUsr->bind_result($out);
    while ($stmtUsr->fetch()) {
        $login_type = $out;
    } 
    if ($login_type) {
        $user_exist = true;   
    }
    $stmtUsr->free_result();
    $stmtUsr->close();
    /* Everytime we would like to call another sp */
    $mysqli->next_result();
    /* ------------------------------------------ */

    // Check password
    // Bind with login_type
    $stmtPwd->bind_param('sss', $submit_username, $submit_pwd, $login_type);
    // Credential matching
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
        echo "<script>alert(\"Username Not Exist !\")</script>";
        redirect("http://localhost:8888/livevibe/index.php");
        exit();      
    }
    // ----------------------
    $stmtPwd->close();
    $mysqli->next_result();
    // ----------------------
    // Check Login Status
    if ($user_exist && $password_valid) {
        // Successfull Logged in ==> Redirect to Profile Page
        $_SESSION["username"] = $submit_username;
        $_SESSION["login_type"] = $login_type;
        // Update login_time
        $stmtLoginT = $mysqli->prepare("CALL update_login_time(?,?,?)");
        $login_time = date("Y-m-d H:i:s");
        $stmtLoginT->bind_param('sss', $submit_username, $login_time, $login_type);
        $stmtLoginT->execute();
        redirect('http://localhost:8888/livevibe/profile.php');
        $stmtLoginT->closed();
        exit();
    }
    else {
        // Credential failed
        echo "<script>alert(\"Wrong Password!\")</script>";
        redirect("http://localhost:8888/livevibe/index.php");
        exit();
    }
}
else {
    // Blank textarea
    echo "<script>alert(\"Username and Password Required !\")</script>";
    redirect("http://localhost:8888/livevibe/index.php");
    exit();        
}
?>