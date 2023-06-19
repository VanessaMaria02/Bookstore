$(document).ready(function(){
var urlParams = new URLSearchParams(window.location.search);
var id = urlParams.get("id");
console.log(id);

ajaxHandler("getIDUserPerson", id, displayKundenDaten);
ajaxHandler("getIDBestellungen", id, displayBestellungen);

$("#myTable").on("click", ".btn-secondary", function(){
    console.log("click");
    var id = $(this).closest("tr").attr("id");
    location.replace("./bestellung.php?id="+id);
});

$("#submit").click(function(){
    console.log("click");
    updateUser(id);
});

})

function updateUser(id){
    let uname = document.getElementById("uname").value;
    let anrede =  document.getElementById("anrede").value;
    let vorname = document.getElementById("vorname").value;
    let nachname = document.getElementById("nachname").value;
    let adresse = document.getElementById("adresse").value;
    let plz = document.getElementById("plz").value;
    let ort = document.getElementById("ort").value;
    let email = document.getElementById("email").value;
    let urole = document.getElementById("role").value;
    let password = document.getElementById("passwort").value;

    if (password === null || typeof password === 'undefined' || password.length === 0) {
        password = "pwd";
      } 

    let userData = {
        "id": id,
        "uname": uname,
        "anrede": anrede,
        "vorname": vorname,
        "nachname": nachname,
        "adresse": adresse,
        "plz": plz,
        "ort": ort,
        "email": email,
        "urole": urole,
        "password": password
    };

    console.log("here");
    console.log(userData);

    ajaxHandler("UpdateUser", userData, function(response){
        alert("Userdaten erfolgreich geändert");
        displayKundenDaten(response);

    });

}

function displayBestellungen(bestellungen){
console.log(bestellungen);
bestellungen.forEach(element =>{
    console.log(element.id);
    console.log(element.timestamp);
    $("#myTable").append("<tr id ='"
    +element.id+
    "'><td style='text-align:center;'>"
    +element.id+
    "</th><td>"
    +element.timestamp+
    "</th><td><button id = 'choose' class='btn btn-secondary'>select</button></td></tr>");
});
}

function displayKundenDaten(userDaten){
    userDaten.forEach(element =>{
        document.getElementById("uname").value = element.uname;
        if(element.anrede == "Herr"){
            document.getElementById("anrede").selectedIndex = 0; //Herr
        }else if(element.anrede == "Frau"){
            document.getElementById("anrede").selectedIndex = 1; ///Frau
        }else if(element.anrede == "Divers"){
            document.getElementById("anrede").selectedIndex = 2; //Divers
        }
        
        document.getElementById("vorname").value = element.vname;
        document.getElementById("nachname").value = element.nname;
        document.getElementById("adresse").value = element.adresse;
        document.getElementById("plz").value = element.plz;
        document.getElementById("ort").value = element.ort;
        document.getElementById("email").value = element.email;
        if(element.u_role == 0){
            document.getElementById("role").selectedIndex = 0;
        }else if(element.u_role == 1){
            document.getElementById("role").selectedIndex = 1;
        }else if(element.u_role == 2){
            document.getElementById("role").selectedIndex = 2;
        }
       
    });

    $("#kundenDaten").show();
}

function ajaxHandler(method, searchterm, nextFunc = ()=>{}){

    $.ajax({
        type: "GET",
        url: "../Backend/serviceHandler.php",
        cache: false,
        data:{method: method, param: searchterm},
        dataType: "json",
        success: function(response){
            console.log(response);
            nextFunc(response);
        },
        error: function(xhr){
            console.log(xhr);
            alert('Error, ein Problem ist aufgetreten: '+xhr.responseText);
        }
    });
}