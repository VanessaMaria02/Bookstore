
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="res\css\style.css">

</head>
<body>
<?php include "navbar.php";?>



<?php
if (isset($_GET['success'])) {
  echo 
  "<div class='alert alert-success alert-dismissible fade show clearfix' role='alert'>
      <strong>Erfolgreich!</strong> 
      " . $_GET["success"] . "
      <a href='login.php' type='button' class='close'style='text-decoration:none;color:black;' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span></a>
  </div>";
}
?>
<Form method="post" class="row g-3">
<section>
  <div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
  <div class="col-12 col-md-8 col-lg-6 col-xl-5">
  <div class="card bg-secondary text-white" style="border-radius: 1rem;">
  <div class="card-body p-5 text-center">

  <div class="mb-md-5 mt-md-4 pb-5">

    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
    <p class="text-white-50 mb-5"></p>

    <div class="form-outline form-white mb-4">
      <input type="text" name ="uname" id="Username" class="form-control form-control-lg" placeholder="Username" required>
    </div>

    <div class="form-outline form-white mb-4">
      <input type="password" name = "ps" id="Passwort" placeholder="Passwort" required minlength="8" class="form-control form-control-lg">
    </div>

    <div class="form-outline form-white mb-4">
        <input type="checkbox" class="form-check-input" name="remember" id="remember">
        <label class="form-check-label" for="remember">Login merken</label>
    </div>
   
    <button class="btn btn-outline-light btn-lg px-5" id="login" name = "login">Login</button>
  </div>

  <div>
     <p>Noch keinen Account? <a href="registrierung.php">Registrier dich hier!</a></p>
  </div>


</div>
</div>
</div>
</div>
</div>
</section>
</Form>
    
    <?php include 'footer.php'; ?>
    <script src="login.js"  type="text/javascript"></script>
</body>
</html>
