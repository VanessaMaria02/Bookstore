<!DocTYPE html>
<html lang="de">

<head>
	<title>Bestellungen</title>
	<link rel="stylesheet" href="res/css/styleproduct.css">
    <link rel="stylesheet" href="res/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

    
</head>
<body>
<?php include 'navbar.php'; ?>

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
  
<script src="userBestellungÜbersicht.js" type="text/javascript"></script>
</body>
</html>