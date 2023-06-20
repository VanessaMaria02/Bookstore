$(document).ready(function(){
    ajaxHandler("getAllProductsVW", "", displayProducts);

    $('#addButton').click(function() {
        location.replace("./produkthinzufügen.php");
    });

    $("#myTable").on("click", ".btn-secondary", function(){
        console.log("click");
        var id = $(this).closest("tr").attr("id");
        location.replace("./produktChange.php?id="+id);
    });
})

function displayProducts(products){
    products.forEach(element =>{
        $("#myTable").append("<tr id ='"+element.id+"'><td style='text-align:center;'>"
        +element.id+
        "</th><td>"
        +element.name+
        "</td><td>"
        +element.preis+
        "</td><td>"
        +element.autor+
        "</td><td><button id='choose' class='btn btn-secondary'>select</button></td></tr>");
    });
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
