<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="res\css\style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class ="header">
    <div class="header-content">
        <h1>Herzlich Willkommen im BuchHaus!</h1>
        <p>Entdecken Sie eine Welt voller Bücher und Geschichten und finden Sie ihre nächste Lektüre!</p>
    </div>
    <div class="main-content">
        <h2>Erhältliche Bücher</h2>
        <div class="books">
            <div class="book">
                <img src="res\img\produktBilder\citySouls.jpg" alt="City of Lost Souls">
                <h3>City of Lost Souls</h3>
                <p>Cassandra Clare</p>
                <p>12,00€</p>
            </div>
            <div class="book">
                <img src="res\img\produktBilder\loveTheor.jpg" alt="Love, Theoretically">
                <h3>Love, Theoretically</h3>
                <p>Ali Hazelwood</p>
                <p>26,99€</p>
            </div>
            <div class="book">
                <img src="res\img\produktBilder\playlist.jpg" alt="Playlist">
                <h3>Playlist</h3>
                <p>Sebastian Fitzek</p>
                <p>13,00€</p>
            </div>
        </div>
        <a href="produkte.php" class="btn">Alle Bücher ansehen</a>
    </div>
</div>


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
</body>
</html>



