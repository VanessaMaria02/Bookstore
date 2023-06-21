$(document).ready(function() {
    console.log(document.cookie);
    displayprodukte();
    $(document).on("change", "#change", changeAnzahl);
    $(document).on("click", "#remove", removeItem);


    //für die Bestellung 
    $(document).on('click', '#produkteBestellen', function () {
        var userDaten = getCookie();
    
        if (userDaten.role === "user") {
          getProductfromCookie()
          return;
        } else {
          alert("Sie müssen sich anmelden, um mit der Bestellung fortzufahren!");
          window.location.href = "login.php";
        }
      });

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

    var gesamtpreis = 0;

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
            gesamtpreis+=productpreis;
        }
    }
    console.log(gesamtpreis)
    $("#gesamtkosten").append("<p>"+gesamtpreis+"</p>");

        
       
    
    
}

//timestamp zu formatieren
function formatTimestamp(timestamp) {
    var date = new Date(timestamp);
  
    var year = date.getFullYear();
    var month = ('0' + (date.getMonth() + 1)).slice(-2);
    var day = ('0' + date.getDate()).slice(-2);
    var hours = ('0' + date.getHours()).slice(-2);
    var minutes = ('0' + date.getMinutes()).slice(-2);
    var seconds = ('0' + date.getSeconds()).slice(-2);
  
    var formattedTimestamp = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    return formattedTimestamp;
  }

//für user bestellung
function getProductfromCookie(){
    var products = getCardProducts();
    var currentTimestamp = Date.now();
    var formattedTimestamp = formatTimestamp(currentTimestamp);
    console.log(formattedTimestamp);
    var userData = getCookie();
    var username = userData.uname;

    if(products.length === 0){
        alert("Es sind keine Produkte im Warenkorb!")
    }

    var productCounts ={};

    var uniqueProducts =[];

    for(var i = 0; i < products.length; i++){
        var innerArray = products[i];
        console.log(innerArray);

        if(innerArray.length >0){
            var product = innerArray[0];
            var productId = product.id;
            
            if(productCounts[productId]){
                productCounts[productId]++;
            }else{
                productCounts[productId] = 1;
                uniqueProducts.push(products[i]);
            }
        }
    }

    for(var i = 0; i < uniqueProducts.length; i++){
        var innerArray2 = uniqueProducts[i];
        console.log(innerArray2);
        if(innerArray2.length >0){
            var product = innerArray2[0];
            let orderData = {
            "uname": username,
            "timestamp": formattedTimestamp,
            "p_id": product.id,
            "anzahl": productCounts[product.id]
            };
           
           ajaxHandler("insertBestellung", orderData, function(response){
            console.log(response);
           });

           ajaxHandler("insertRechnungen", orderData, function(response){
            console.log(response);
           });
 
        }
    }

     //Cookie löschen
     document.cookie = "cartProducts=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
     alert("Bestellung erfolgreich!");
     window.location.href = "index.php";
    
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