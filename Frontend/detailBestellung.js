$(document).ready(function(){
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get("id");
    console.log(id);
    $("#ueberschrift").append("<h3>Nr.: "+id+"</h3>");
    
    ajaxHandler("getIDBestellungundProdukt", id, displayBestellung);
    
    })

    
    function displayBestellung(bestellung){
    console.log(bestellung);
    let BestellungsPreis = 0;
    bestellung.forEach(element => {
        let insgesamtPreis = element.anzahl*element.preis;
        BestellungsPreis += insgesamtPreis;
        $("#myTable").append("<tr id ='"
        +element.p_id+
        "'><td style='text-align:center;'>"
        +element.p_id+
        "</td><td>"
        +element.title+
        "</td><td>"
        +element.anzahl+
        "</td><td>"
        +element.preis+
        "€</td><td>"
        + insgesamtPreis+
        "€</td><td id ='"
        +element.p_id+
        "'></td></tr>");
    });
    BestellungsPreis = BestellungsPreis.toFixed(2);
    $("#myTable").append("<tr><td style='text-align:center;'></th><td></th><td></th><td>Preis Insgesamt: </th><td>"
    + BestellungsPreis+
    "€</th></tr>");
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