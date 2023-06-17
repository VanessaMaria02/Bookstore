$(document).ready(function() {
    console.log(document.cookie);
    getUserRoleCookie()

})

function getUserRoleCookie(){
    var cookieValue = document.cookie
    .split(";")
    .map(row => row.trim())
    .find(row => row.startsWith("urole="));


    console.log(cookieValue);

    if(cookieValue){
        var userDatenJson = cookieValue.split("=")[1];
        var userDaten = JSON.parse(userDatenJson);
        
        console.log(userDaten);
        setNavbar(userDaten);
    }else{
       var emptyUserDaten = [];
       console.log("test2");
       setNavbar(emptyUserDaten);
       
    }
}

function setNavbar(userDaten){
    console.log("setNavbar");
    console.log("test3");
    let uname;
    let role;

    uname = userDaten.uname;
    role = userDaten.role;

    //Je nach dem ob anonym/user/admin werden unterschiedliche Links gezeigt
    if(role === "admin"){
        console.log(role);
        $("#navbar").append('<li class="nav-item"><a class="nav-link" href="produktVerwaltung.php">Produkte verwalten</a></li><li class="nav-item"><a class="nav-link" href="userverwaltung.php">Userverwaltung</a></li><li class="nav-item"><a class="nav-link" href="gutscheine.php">Gutscheine verwalten</a></li><li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>');
        $("nav").append(" <p class='fs-6 text-end'> Willkommen, "+uname+" </p>");
    }else if(role === "user"){
        console.log(role);
        $("#navbar").append('<li class="nav-item"><a class="nav-link" href="produkte.php">Produkte</a></li><li class="nav-item"><a class="nav-link" href="userbestellungen.php">Bestellungen</a></li><li class="nav-item"><a class="nav-link" href="meinKonto.php">Mein Konto</a></li><li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>');
        $("nav").append(" <p class='fs-6 text-end'> Willkommen, "+uname+" </p>");
    }else{
        console.log("not login");
        console.log(role);
        $("#navbar").append('<li class="nav-item"><a class="nav-link" href="produkte.php">Produkte</a></li><li class="nav-item"><a class="nav-link" href="registrierung.php">Registrierung</a></li><li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>');
    }



}
