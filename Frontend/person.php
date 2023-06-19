<!DocTYPE html>
<html lang="de">

<head>
	<title>Produkte</title>
	<link rel="stylesheet" href="res/css/styleproduct.css">
    <link rel="stylesheet" href="res/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

    
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container">
    <h3 class="d-inline">Kunden Daten</h3>
    <div class ="container table-responsive fancyFont">
        <table class="table table-striped">
            <tbody id = "kundenDaten">
            <tr>
                <td>Username</td>
                <td>
                    <input id = "uname" value="test" type="text" name="username" required>
                </td>
            </tr>
            <tr>
                <td>Anrede</td>
                <td>
                    <select class="form-select w-25" id = "anrede" name="anrede" required>
                        <option  value="Herr">Herr</option>
                        <option  value="Frau">Frau</option>
                        <option value="Divers">Divers</option>
                        </select>
                </td>
            </tr>
            <tr>
                <td>Vorname</td>
                <td>
                    <input id = "vorname" value="test" type="text" name="fname" required>
                </td>
            </tr>
            <tr>
                <td>Nachname</td>
                <td>
                    <input id = "nachname" value="test" type="text" name="lname" required>
                </td>
            </tr>

            <tr>
                <td>Adresse</td>
                <td>
                    <input id = "adresse" value="test" type="text" name="adresse" required>
                </td>
            </tr>

            <tr>
                <td>plz</td>
                <td>
                    <input id = "plz" value="test" type="number" name="plz" required>
                </td>
            </tr>

            <tr>
                <td>Ort</td>
                <td>
                    <input id = "ort" value="test" type="text" name="ort" required>
                </td>
            </tr>

            <tr>
                <td>E-Mail</td>
                <td>
                <input id = "email" value="test" type="email" name="email" required>
                </td>
            </tr>

            <tr>
                <td>Rolle</td>
                <td>
                    <select id ="role" class="form-select w-25" name="role" required>
                        <option  value=0>User</option>
                        <option value=1>Admin</option>
                        <option value=2>Inaktiv</option>
                    </select>
                </td>
            </tr>
           
            <tr>
                <td>Passwort</td>
                <td>
                    <input id = "passwort" placeholder="Password"  autocomplete="off" type="password" name="passwort">
                </td>
            </tr>
            
            </tbody>                
        </table>
        <button class="btn btn-secondary" id="submit">Bearbeiten</button>
    </div>
</div>

<!-- Tabelle mit allen Bestellungen -->
<div class ="p-4 container mt-5 table-responsive fancyFont">

            <h3 class="d-inline">Bestellungen</h3>
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col" style="text-align: center;">Bestellnummer</th>
                <th scope="col">Zeitpunkt der Bestellung</th>
                <th scope="col" style="text-align: center;"></th>
                </tr>
            </thead>

            <tbody id="myTable">


            </tbody>
            </table>
        </div>
</div>

<?php include 'footer.php'; ?>
  
<script src="person.js" type="text/javascript"></script>
</body>
</html>