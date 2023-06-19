
<!DOCTYPE html>
<html lang="de">

<head>
	<title>Registrierung</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="res\css\style.css">

    
</head>
<body>
<?php include 'navbar.php'; 
 //Fängt error ein
 if(isset($_GET["error"])){
    echo "<div class='alert alert-danger alert-dismissible fade show clearfix' role='alert'>
            <strong>Achtung!</strong> 
            ".$_GET["error"]."
            <a href='registrierung.php' type='button' class='close'style='text-decoration:none;color:black;' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span></a>
        </div>";
  }
?>

    
<section>
            <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-secondary text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Registrierung</h2>
              <p class="text-white-50 mb-5"></p>

              <div class="form-outline form-white mb-4">
                <select id= "anrede" name="Anrede" required autofocus class="form-control form-control-lg">
                  <option value="Frau">Frau</option>
                  <option value="Herr">Herr</option>
                  <option value="Divers">Divers</option>
                 </select>
              </div>
              
              <div class="form-outline form-white mb-4">
                <input type="text" id="vname" name="vname" class="form-control form-control-lg" placeholder="Vorname" required/>
              </div>
              
              <div class="form-outline form-white mb-4">
                <input type="text" id="nname" name="nname" required class="form-control form-control-lg" placeholder="Nachname"/>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" name ="adresse" id="Adresse" class="form-control form-control-lg" placeholder="Adresse" required/>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="number" name ="plz" id="plz" class="form-control form-control-lg" placeholder="Plz" required/>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" name ="ort" id="Ort" class="form-control form-control-lg" placeholder="Ort" required/>
              </div>
              
              <div class="form-outline form-white mb-4">
                <input id="email" name="email" type="email" required class="form-control form-control-lg" placeholder= "E-mail"/>
              </div>
              
              <div class="form-outline form-white mb-4">
                <input type="text" name ="uname" id="Username" class="form-control form-control-lg" placeholder="Username" required/>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="ps" name="ps" placeholder="Passwort" required minlength="8" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="ps2" name="psSec" placeholder="Passwort" required minlength="8" class="form-control form-control-lg" />
              </div>

              <button type = "submit" class="btn btn-outline-light btn-lg px-5" id="submit" value="Send" name="signUp">Registrieren</button>
            </div>


          </div>
          </div>
          </div>
          </div>
          </div>
       </section>
      

       <?php include 'footer.php'; ?>

<script src="registrierung.js" type="text/javascript"></script>
</body>
</html>
