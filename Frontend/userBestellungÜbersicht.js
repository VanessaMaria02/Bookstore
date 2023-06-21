$(document).ready(function(){
    var userDaten = getCookie();
    ajaxHandler("AllUserName", userDaten.uname, function(response){
        ajaxHandler("getIDBestellungen", response.uid, displayBestellungen);
    });

    $("#myTable").on("click", ".btn-secondary", function(){
    console.log("click");
    var id = $(this).closest("tr").attr("id");
    location.replace("./detailBestellung.php?id="+id);
    });
    
    })

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

function ajaxHandler(method, searchterm, nextFunc = ()=>{}) {
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
function getCookie(){
    var cookieValue = document.cookie
    .split(";")
    .map(row => row.trim())
    .find(row => row.startsWith("urole="));

    if(cookieValue){
        var userDatenJson = cookieValue.split("=")[1];
        var userDaten = JSON.parse(userDatenJson);

        return userDaten;
    }else{
       var emptyUserDaten = [];
       return emptyUserDaten;
       
    }
} 
