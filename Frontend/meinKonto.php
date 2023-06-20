<!DOCTYPE html>
<html>
<head>
    <title>Mein Konto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php include 'navbar.php'; ?>
    
<section>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-secondary text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Daten bearbeiten</h2>
                            <p class="text-white-50 mb-5"></p>
                            <form id="updateForm">
                                <div class="form-outline form-white mb-4">
                                    <select id="anrede" name="anrede" required autofocus class="form-control form-control-lg">
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
                                    <input type="text" name="adresse" id="adresse" class="form-control form-control-lg" placeholder="Adresse" required/>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="number" name="plz" id="plz" class="form-control form-control-lg" placeholder="Plz" required/>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="ort" id="ort" class="form-control form-control-lg" placeholder="Ort" required/>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input id="email" name="email" type="email" required class="form-control form-control-lg" placeholder="E-mail"/>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="uname" id="username" class="form-control form-control-lg" placeholder="Username" required/>
                              
                                <button type="submit" class="btn btn-outline-light btn-lg px-5" id="updateButton" name="update">Update</button>
                            </form>
                            
                            <form>

                            <h1>Password ändern</h1>
                        <form id="changePasswordForm" action="" method="POST">
                            <label for="oldPassword">Ältes Password:</label>
                            <input type="password" id="oldPassword" name="oldPassword" required><br>
                            <label for="newPassword">Neues Password:</label>
                            <input type="password" id="newPassword" name="newPassword" required><br>
                            <label for="confirmPassword">Confirm Password:</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" required><br>
                            <button type="submit">Password ändern</button>

                        </form>

                      <body>
                          <h1>Bestellungen und Rechnungen</h1>
  
                        <h2>Bestellungen</h2>
                        <button id="bestellungenBtn">Bestellungen anzeigen</button>
                        <div id="bestellungenErgebnis"></div>
  
                        <h2>Rechnung generieren</h2>
                        <label for="bestellungsId">Bestellungs-ID:</label>
                        <input type="text" id="bestellungsId" />
                        <button id="rechnungBtn">Rechnungen</button>
                        <div id="rechnungErgebnis"></div>
                      </body>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script src="meinKonto.js"></script>

</body>
</html>
