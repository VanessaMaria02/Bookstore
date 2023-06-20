$(document).ready(function() {
    console.log(document.cookie);
    displayprodukte();
    $(document).on("change", "#change", changeAnzahl);
    $(document).on("click", "#remove", removeItem);

});

//wenn die anzahl eines produkt verändert wird, wird diese Funktion aufgerufen
function changeAnzahl(){
    var productId = this.parentNode.id;
    var anzahl = this.value;
    var cartProducts = getCardProducts();
    var newProducts =[];
    var product;
    cartProducts.forEach(element =>{
        if(element[0].id != productId){
            newProducts.push(element);
        } else {
            product = element;
        }
    });

    for(var i = 0; i < anzahl; i++){
        newProducts.push(product);
        console.log(i);
    };
    setCartProducts(newProducts);
    location.reload();
}

function removeItem(){
    var productId = this.parentNode.id;
    
    var cartProducts = getCardProducts();
    console.log(cartProducts);
    var newProducts =[];
    cartProducts.forEach(element =>{
        if(element[0].id != productId){
            newProducts.push(element);
        }
    });
    console.log(newProducts);
    setCartProducts(newProducts);
    location.reload();
}


function setCartProducts(products){
    var productsJSON = JSON.stringify(products);
    document.cookie = "cartProducts=" + productsJSON +"; path=/"
}




function getCardProducts(){
    var cookieValue = document.cookie
        .split("; ")
        .find(row => row.startsWith("cartProducts="));

    if(cookieValue) {
        var productsJson = cookieValue.split("=")[1];
        return JSON.parse(productsJson);
    }else{
        return[];
    }

       
}

function displayprodukte(){
    var cart = getCardProducts();

    if(cart.length === 0){
        $("#produkteWarenkorb").append('<p>Es sind keine Produkte im Warenkorb</p>'); 
    }

    var productCounts ={};

    var uniqueProducts =[];

    console.log(cart);

    for(var i = 0; i < cart.length; i++){
        var innerArray = cart[i];
        console.log(innerArray);

        if(innerArray.length >0){
            var product = innerArray[0];
            var productId = product.id;
            
            if(productCounts[productId]){
                productCounts[productId]++;
            }else{
                productCounts[productId] = 1;
                uniqueProducts.push(cart[i]);
            }
        }
    }

    console.log(uniqueProducts);
    console.log(productCounts);

    for(var i = 0; i < uniqueProducts.length; i++){
        var innerArray2 = uniqueProducts[i];
        console.log(innerArray2);
        if(innerArray2.length >0){
            var product = innerArray2[0];
            var productpreis = product.preis*productCounts[product.id];
            $("#produkteWarenkorb").append('<p id="'+product.id+'"><img with = 80px height = 130px src = "./res/img/produktBilder/'
            +product.image_url
            +'"><b>'
            +product.name
            +'</b> Anzahl: <input type = "number" id="change" value="'
            +productCounts[product.id]
            +'"> Preis: '
            +productpreis
            +'€'+ ' <button id = "remove">X</button>'
            +'</p>' 
            );
        }
    }

        
       
    
    
}