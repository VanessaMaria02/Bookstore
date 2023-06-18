$(document).ready(function(){
var urlParams = new URLSearchParams(window.location.search);
var id = urlParams.get("id");
console.log(id);

//ajaxHandler("getIDUserPerson", id, displayKundenDaten);
ajaxHandler("getIDBestellungen", id, displayBestellungen);

})

function displayBestellungen(bestellungen){
console.log(bestellungen);
}

function displayKundenDaten(userDaten){

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