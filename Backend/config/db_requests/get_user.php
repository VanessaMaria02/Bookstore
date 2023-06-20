<?php

// Include the database connection file
require_once('dbacess.php');

$u_id = $_POST['u_id']; // Assuming you're sending the user's ID via POST method

// Prepare the SQL statement
$stmt = $db->prepare("SELECT * FROM personen WHERE u_id = ?");

if($stmt === false) {
    die("Failed to prepare statement: " . $db->error);
}

$stmt->bind_param('i', $u_id); // 'i' indicates that $u_id is an integer

// Execute the prepared statement
$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

// Return the result as a JSON string
echo json_encode($user);
?>
