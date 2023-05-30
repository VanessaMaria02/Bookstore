$(document).ready(function() {
    console.log("1");
    ajaxHandler("getKatProducts","3", displayProducts);

    $("#seachfield").on("input", function(e){
        $("#produktBereich").hide();
        $("#produktBereich").empty();
        ajaxHandler("queryBookTitle", $("#seachfield").val(), displayProducts);
        $("#produktBereich").show();
    });

    

    $("#kategorie").on("change", function(e){
        var selectedCategory = document.getElementById("kategorie").value;
        var intKat = "3";
        if(selectedCategory === "Fachliteratur"){
            intKat = "2";
        }else if(selectedCategory === "Fantasy & Science Fiction"){
            intKat = "5";
        }else if(selectedCategory === "Fremdsprachig"){
            intKat = "4";
        }else if(selectedCategory === "Krimis & Thriller"){
            intKat = "7";
        }else if(selectedCategory === "Manga"){
            intKat = "6";
        }else if(selectedCategory === "Romane"){
            intKat = "3";
        }
        $("#produktBereich").hide();
        $("#produktBereich").empty();
        ajaxHandler("getKatProducts",intKat, displayProducts);
        $("#produktBereich").show();
    });

    $(document).on('click', '.add-to-cart', function(){
        var elementId = $(this).attr('id');
        addtoCart(elementId);
    });

   
    
})



function addtoCart(elementId){
    console.log(elementId);
    
}

function displayProducts(products){
    console.log(4)
    console.log(products)

    products.forEach(element =>{
        $("#produktBereich").append('<div class="col-md-3 col-sm-6"><div class="product-grid2"><div class="product-image2"><a href="#"><img class="pic-1" src="./res/img/produktBilder/'
        + element.image_url +
        '"><img class="pic-2" src="./res/img/produktBilder/'
        + element.image_url +
        '"></a></a></li></ul><a id = "'+element.id+'" class="add-to-cart" href="">Add to cart</a></div><div class="product-content"><h3 class="title"><a href="#">'
        + element.name+
        '</a></h3><span class="price">'
        + element.preis+
        '€</span></div></div></div>')
    });
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