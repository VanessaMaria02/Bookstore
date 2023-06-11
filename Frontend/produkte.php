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

<br>

<div class="row">
    <div class="col-sm"></div>
    <div class="col-sm-9">
        <div class="input-group">
            <input type="text" class="form-control" id="seachfield" placeholder="Search via title">
			<select id="kategorie" >
                <option>Fachliteratur</option>
                <option>Fantasy & Science Fiction</option>
                <option>Fremdsprachig</option>
                <option>Krimis & Thriller</option> 
				<option>Manga</option>
                <option selected>Romane</option> 
            </select>
            <img id= "warenkorb" src="./res/img/warenkorbicon.jpg" with = "40px" height = "40px">
            <p id="warenAnzahl" style = "font-size:25px;"><b>0</b></p>
        </div>
    </div>
    <div class="col-sm"></div>
</div>


<br>	

<div class="container">
    <div class="row" id= "produktBereich">
        
        
    </div>
</div>
<hr>

<footer id="footer">
    <div class="footer-basic">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.php">Home</a></li>
                <li class="list-inline-item"><a href="impressum.html">Impressum</a></li>
                <li class="list-inline-item"><a href="produkte.php">Produkte</a></li>
                <li class="list-inline-item"><a href="registrierung.php">Registrierung</a></li>
                <li class="list-inline-item"><a href="login.php">Login</a></li>
            </ul>
            <p class="copyright">BuchHaus © 2023</p>
    </div>
  </footer>   
  
<script src="produkt.js" type="text/javascript"></script>
</body>
</html>
