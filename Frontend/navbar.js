$(document).ready(function() {
    console.log(document.cookie);
    getUserRoleCookie()

})

function getUserRoleCookie(){
    var cookieValue = document.cookie
    .split(";")
    .map(row => row.trim())
    .find(row => row.startsWith("urole="));

    if(cookieValue){
        var userDatenJson = cookieValue.split("=")[1];
        var userDaten = JSON.parse(userDatenJson);

        setNavbar(userDaten);
    }else{
       var emptyUserDaten = [];
       setNavbar(emptyUserDaten);
       
    }
} 

function setNavbar(userDaten){
    let uname;
    let role;

    uname = userDaten.uname;
    role = userDaten.role;

    //Je nach dem ob anonym/user/admin werden unterschiedliche Links gezeigt
    if(role === "admin"){
        $("#navbar").append('<li class="nav-item"><a class="nav-link" href="produktVerwaltung.php">Produkte verwalten</a></li><li class="nav-item"><a class="nav-link" href="userverwaltung.php">Userverwaltung</a></li><li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>');
        $("nav").append(" <p class='fs-6 text-end'> Willkommen, "+uname+" </p>");
    }else if(role === "user"){
        $("#navbar").append('<li class="nav-item"><a class="nav-link" href="produkte.php">Produkte</a></li><li class="nav-item"><a class="nav-link" href="userBestellungÜbersicht.php">Bestellungen</a></li><li class="nav-item"><a class="nav-link" href="meinKonto.php">Mein Konto</a></li><li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>');
        $("nav").append(" <p class='fs-6 text-end'> Willkommen, "+uname+" </p>");
    }else{
        $("#navbar").append('<li class="nav-item"><a class="nav-link" href="produkte.php">Produkte</a></li><li class="nav-item"><a class="nav-link" href="registrierung.php">Registrierung</a></li><li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>');
    }



}
