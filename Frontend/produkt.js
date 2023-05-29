$(document).ready(function() {
    console.log("1")
    getAllProducts(displayProducts);
})

function displayProducts(products){
    console.log(4)
    console.log(products)
    products.forEach(element =>{
        $("ol").append('<li> <img src="./res/img/produktBilder/'+ element.image_url +'"> <p>'+element.name+ '</p> <p>'+element.preis+'€</p>')
    });
}

function getAllProducts(nextFunc){
    console.log(2)
    ajaxHandler("getAllProducts", {}, nextFunc)
}



function ajaxHandler(method, searchterm, nextFunc = ()=>{}){
    console.log(3);

    $.ajax({
        type: "GET",
        url: "../Backend/serviceHandler.php",
        cache: false,
        data:{method: method, param: searchterm},
        dataType: "json",
        success: function(response){
            console.log(5);
            console.log(response);
            nextFunc(response);
        },
        error: function(xhr){
            console.log(6);
            console.log(xhr);
            alert('Error, ein Problem ist aufgetreten: '+xhr.responseText);
        }
    });
}