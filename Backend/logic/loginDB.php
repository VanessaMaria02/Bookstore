<?php
$host = "localhost";
$dbuser = "hoteladmin";
$dbpassword = "hoteladmin";
$dbname = "buchhaus";

$db = new mysqli($host, $dbuser, $dbpassword, $dbname);

// Check if a session is not already active
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Process login form submission
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the query with proper escaping to prevent SQL injection
    $username = $db->real_escape_string($username);
    $password = $db->real_escape_string($password);
    $sql = "SELECT * FROM loginuser WHERE username = '$username' AND password = '$password'";
    $result = $db->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION['username'] = $username;
        echo 'success';
    } else {
        // Login failed
        echo 'failure';
    }
}

// Close the database connection
$db->close();
?>



