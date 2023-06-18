$(document).ready(function() {

    $("#submit").on("click", saveUser);

})

function saveUser(){
    console.log("click");
    let anrede = document.getElementById("anrede").value;
    let vname = document.getElementById("vname").value;
    let nname = document.getElementById("nname").value;
    let adresse = document.getElementById("Adresse").value;
    let plz = document.getElementById("plz").value;
    let ort = document.getElementById("Ort").value;
    let email = document.getElementById("email").value;
    let uname = document.getElementById("Username").value;
    let password = document.getElementById("ps").value;
    let password2 = document.getElementById("ps2").value;

    if(password != password2){
        alert('Error, die Passwörter stimmen nicht überein');
        return;
    }

    let userData = {
        "anrede": anrede,
        "vname": vname,
        "nname": nname,
        "adresse": adresse,
        "plz": plz,
        "ort": ort,
        "email": email,
        "uname": uname,
        "password": password,
        "password2": password2
    };

    console.log(userData);
    ajaxHandler("saveUser", userData, function(response){
        console.log(response);
        location.replace("./login.php?success=")
    });



}

function ajaxHandler(method, param, nextFunc = () => {})
{
    $.ajax({
        type: "POST",
        url: "../Backend/serviceHandler.php",
        data: {method: method, param: param},
        dataType: "json",
        success: function (response) 
        {
            console.log(response);
            nextFunc(response);
        },
        error: function(xhr)
        {
            console.log(xhr);
            alert('Ein Fehler ist Aufgetreten!'+xhr);
        }
    });
}
