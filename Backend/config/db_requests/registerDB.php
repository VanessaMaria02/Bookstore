<?php
if (isset($_POST["submit"])) {
   $username = $_POST["u_username"];
   $password = $_POST["u_password"];
   $passwordRepeat = $_POST["u_password_repeat"];
   
   $passwordHash = md5($password); // Change this line

   $errors = array();
   
   if (empty($username) OR empty($password) OR empty($passwordRepeat)) {
    array_push($errors,"All fields are required");
   }
   if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Email is not valid");
   }
   if (strlen($password)<8) {
    array_push($errors,"Password must be at least 8 characters long");
   }
   if ($password!==$passwordRepeat) {
    array_push($errors,"Passwords do not match");
   }
   require_once "dbacess.php";
   $sql = "SELECT * FROM user WHERE u_username = ?";
   $stmt = $db->prepare($sql);
   $stmt->bind_param("s", $username);
   $stmt->execute();
   $result = $stmt->get_result();
   if ($result->num_rows>0) {
    array_push($errors,"Email already exists!");
   }
   if (count($errors)>0) {
    foreach ($errors as  $error) {
        echo "<div class='alert alert-danger'>$error</div>";
    }
   } else {
    $sql = "INSERT INTO user (u_username, u_password) VALUES (?, ?)";
    $stmt = $db->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $username, $passwordHash);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        } else {
            die("Failed to execute statement: " . $stmt->error);
        }
    } else {
        die("Failed to prepare statement: " . $db->error);
    }
   }
}
?>
