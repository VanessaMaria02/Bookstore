<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="login.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	
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
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
		.form-container {
			width: 400px;
			padding: 40px;
			background-color: #fff;
			box-shadow: 0px 3px 10px rgba(0,0,0,0.2);
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
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    //check if username and password are correct
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'password') {
        $_SESSION['username'] = $_POST['username'];
        echo 'success';
    } else {
        echo 'failure';
    }
}
?>


</body>
</html>
