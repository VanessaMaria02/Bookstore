<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="login.js"></script>
	<link rel="stylesheet" href="res/css/style.css">

</head>

<body>
	<?php include 'navbar.php'; ?>

	<form id="login-form" method="post">
		<h2>Login</h2>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required>
		<br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required>
		<br>
		<input type="submit" value="Login">
	</form>
	<p id="result"></p>

	<style>
		.form-container {
			width: 400px;
			padding: 40px;
			background-color: #fff;
			box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
		}

		.form-control:focus {
			border-color: #d6d6d6;
			box-shadow: 0 0 0 0.2rem rgba(214, 214, 214, 0.5);
		}

		.form-control.error {
			border-color: #dc3545;
			box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
		}

		.form-control.success {
			border-color: #28a745;
			box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
		}
	</style>

	<?php
	// Check if a session is not already active
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}

	// Establish database connection
	$servername = "localhost";
	$username = "admin";
	$password = "admin123";
	$dbname = "projekt";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Process login form submission
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Prepare the query with proper escaping to prevent SQL injection
		$username = $conn->real_escape_string($username);
		$password = $conn->real_escape_string($password);
		$sql = "SELECT * FROM loginuser WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($sql);

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
	$conn->close();
	?>

</body>

</html>

