<!DocTYPE html>
<html lang="de">

<head>
	<title>Produkt Verwaltung</title>
	<link rel="stylesheet" href="res/css/styleproduct.css">
    <link rel="stylesheet" href="res/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

    
</head>
<body>
<?php include 'navbar.php'; ?>
<!-- gibt Tabelle mit allen Produkten aus-->
<div class="p-4 container mt-5 table-responsive fancyFont">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="d-inline">Alle Produkte</h3>
        <button class="btn btn-dark" id="addButton">Add</button>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">PR_ID</th>
                <th scope="col">Titel</th>
                <th scope="col">Preis</th>
                <th scope="col">Autor</th>
                <th scope="col" style="text-align: center;"></th>
            </tr>
        </thead>

        <tbody id="myTable"> </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>
  
<script src="produktverwaltung.js" type="text/javascript"></script>
</body>
</html>
