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
<!-- gibt Tabelle mit allen usern aus-->
<div class ="p-4 container mt-5 table-responsive fancyFont">

            <h3 class="d-inline">Alle Nutzer*innen</h3>
            <input type="text" class="form-control" id="seachfield" placeholder="Search via username">
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col" style="text-align: center;">U_ID</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col" style="text-align: center;"></th>
                </tr>
            </thead>

            <tbody id="myTable">


            </tbody>
            </table>
        </div>


<?php include 'footer.php'; ?>
  
<script src="userverwaltung.js" type="text/javascript"></script>
</body>
</html>
