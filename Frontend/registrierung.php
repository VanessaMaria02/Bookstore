<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
   exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- rest of the head content -->
</head>
<body>
    <div class="container">
        <form action="../Backend/config/db_requests/registerDB.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="u_username" placeholder="Username:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="u_password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="u_password_repeat" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
    </div>
    <?php
if (isset($_POST["u_username"]) && isset($_POST["u_password"])) {
   $username = $_POST["u_username"];
   $password = $_POST["u_password"];
   $passwordRepeat = $_POST["u_password_repeat"];
   
   $passwordHash = password_hash($password, PASSWORD_DEFAULT);

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
   $stmt->close();
   $db->close();
}
?>

    <!-- footer content -->
</body>
</html>
