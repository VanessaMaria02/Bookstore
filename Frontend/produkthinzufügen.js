$(document).ready(function(){
    ajaxHandlerGET("getAllCategories", "", displayKategorien);
})

function displayKategorien(kategorien)
{
    kategorien.forEach(element =>{
        $("#kategorien").append("<option value='"+ element.id +"'>"+ element.name +"</option>");
    });
}

function createProduct() {
    // Buchdetails aus den Eingabefeldern erhalten
    var kategorieID = $("#kategorien").val();
    var titel = $("#titel").val();
    var preis = $("#preis").val();
    var bild = $("#file")[0].files[0];
    var beschreibung = $("#beschreibung").val();
    var autor = $("#autor").val();
    var filename = $("#filename").val();
    var bildername;

    if (kategorieID && titel && bild && beschreibung && autor) {

        if (filename.trim() !== '') {
            var fileExtension = bild.name.split('.').pop();
            var newFilename = filename + '.' + fileExtension;
        
            bildername = newFilename;
        } else {
            bildername = bild.name;
        }

        let product = {
            "kategorieID": kategorieID,
            "titel": titel,
            "bild": bildername,
            "beschreibung": beschreibung,
            "autor": autor,
            "preis": preis
        };
    
        ajaxHandlerPOST("creatProduct", product, function(){
            location.replace("./produktVerwaltung.php");
        }
        );
        
    } 
}

function ajaxHandlerGET(method, searchterm, nextFunc = ()=>{}){

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

function ajaxHandlerPOST(method, param, nextFunc = () => {})
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
        }
    });
}