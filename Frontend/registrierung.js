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

    if(anrede && vname && nname && adresse && plz && ort && email && uname && password && password2){
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
    
        ajaxHandler("saveUser", userData, function(response){
            console.log(response);
            location.replace("./login.php?success=");
        });
    }else{
        alert('Es dürfen keine Felder leer bleiben');
    }

    



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
            alert('Error, ein Problem ist aufgetreten überprüfen Sie ihre Eingaben'+xhr.responseText);
        }
    });
}
