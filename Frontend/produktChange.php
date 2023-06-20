<!DocTYPE html>
<html lang="de">

<head>
	<title>Produkt Hinzufügen</title>
	<link rel="stylesheet" href="res/css/styleproduct.css">
    <link rel="stylesheet" href="res/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
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
        <h2 class="fw-bold mb-2 text-uppercase">Produkt Ändern</h2>
        <p class="text-white-50 mb-5"></p>

        <div class="form-outline form-white mb-4">
            <input type="text" id="titel" class="form-control form-control-lg" placeholder="Titel" required>
        </div>
        <div class="form-outline form-white mb-4">
            <input type="number" id="preis" placeholder="Preis" required class="form-control form-control-lg" step=".01">
        </div>
        <div class="form-outline form-white mb-4">
            <input type="text" id="autor" placeholder="Autor" required class="form-control form-control-lg">
        </div>
        <div class="form-outline form-white mb-4">
            <textarea id="beschreibung" placeholder="Beschreibung" required class="form-control form-control-lg" maxlength="900"></textarea>
        </div>
        <div class="form-outline form-white mb-4">
            <select name="kategorien" id="kategorien" required class="form-control form-control-lg">
                <option selected disabled>Kategorie </option>
            </select>
        </div>
        <input hidden type="number" id="catID">
        <input hidden type="number" id="ProductID">
        <button class="btn btn-outline-light btn-lg px-5" id="safe" name="safe">Speichern</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>
<?php include 'footer.php'; ?>
  
<script src="produktChange.js" type="text/javascript"></script>
</body>
</html>
