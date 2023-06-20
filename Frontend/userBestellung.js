$(document).ready(function () {
  $(document).on('click', '#produkteBestellen', function () {
    var userDaten = getCookie();

    if (userDaten.role === "user") {
      let uname = userDaten.uname;
      loadAddress(uname);
      window.location.href = "userBestellung.php"; 
      return;
    } else {
      alert("Sie müssen sich anmelden, um mit der Bestellung fortzufahren!");
      window.location.href = "login.php";
    }
  });

});

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

function getProductfromCookie(){
    var products = getCardProducts();
    var timestamp = new Date().getTime;
    var userData = getCookie();
    var username = userData.uname;

    if(products.length === 0){
        $("#produkteWarenkorb").append('<p>Es sind keine Produkte im Warenkorb</p>'); 
    }

    var productCounts ={};

    var uniqueProducts =[];

    console.log(cart);

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
            "uname": uname,
            "timestamp": timestamp,
            "p_id": product.id,
            "anzahl": productCounts[product.id]
            };
           ajaxHandler("insertBestellung", orderData, function(response){
        ajaxHandler("insertRechnungen", response, function(){
            // Cookie löschen
            document.cookie = "cartProducts=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            alert("Bestellung erfolgreich!")
            window.location.href = "index.php";
        });

    });
 
        }
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
