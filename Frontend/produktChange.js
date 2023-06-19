$(document).ready(function(){
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get("id");

    $('#safe').click(function() {
        changeProduct();
    });

    ajaxHandler("getProductbyID", id, displayProduct);
    ajaxHandler("getAllCategories", "", displayKategorien);
})

function displayProduct(product)
{
    $("#ProductID").val(product[0].id);
    $("#titel").val(product[0].name);
    $("#preis").val(product[0].preis);
    $("#autor").val(product[0].autor);
    $("#beschreibung").val(product[0].beschreibung);
    $("#catID").val(product[0].kategorie);
}

function displayKategorien(kategorien)
{
    var catid = $("#catID").val();
    kategorien.forEach(element =>{
        $("#kategorien").append("<option value='"+ element.id +"'"+ (catid == element.id ? "selected" : " ") + ">"+ element.name +"</option>");
    });
}

function changeProduct()
{
    // Buchdetails aus den Eingabefeldern erhalten
    var kategorieID = $("#kategorien").val();
    var titel = $("#titel").val();
    var preis = $("#preis").val();
    var beschreibung = $("#beschreibung").val();
    var autor = $("#autor").val();
    var id = $("#ProductID").val();
    if (kategorieID && titel && beschreibung && autor && preis) {
        let product = {
            "ID": id,
            "kategorieID": kategorieID,
            "titel": titel,
            "beschreibung": beschreibung,
            "autor": autor,
            "preis": preis
        };
    
        console.log(product);
        ajaxHandler("updateProduct", product, next);
    } 

    console.log("click");
}

function next()
{
    location.replace("./produktVerwaltung.php");
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