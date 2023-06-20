<?php
// Include the database connection file
require_once 'database.php';

// Get the user ID, old password, and new password from the POST request
$userId = $_POST['userId'];
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];

// Validate the user ID, old password, and new password
if (!is_numeric($userId)) {
  $response = array('success' => false, 'message' => 'Invalid user ID');
  echo json_encode($response);
  exit;
}

// ... Perform additional validation as needed

// Hash the new password
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Update the user's password in the database
$sql = "UPDATE `user` SET `u_password` = '$hashedPassword' WHERE `u_id` = $userId";
$result = mysqli_query($connection, $sql);

if ($result) {
  $response = array('success' => true, 'message' => 'Password changed successfully');
  echo json_encode($response);
} else {
  $response = array('success' => false, 'message' => 'Failed to change password');
  echo json_encode($response);
}

// Close the database connection
mysqli_close($connection);
?>
