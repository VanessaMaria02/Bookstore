

$(document).ready(function() {
  console.log("hello");
  console.log(document.cookie);

  $("#login").on("click", login);

})

function login(){
  console.log("click");
  let uname = document.getElementById("Username").value;
  let password = document.getElementById("Passwort").value;
  


  console.log(uname);

  ajaxHandler("login", "Vanessa2", function(response){
    console.log(response);
    checkUser(response, password);
  });



}

function checkUser(response, password){
  //const bcrypt = require('bcryptjs');
  
  let uname = " ";
  let password2 = " ";
  let role = " ";

  response.forEach(element =>{
    uname = element.uname;
    password2 = element.password;
    role = element.urole;
  });

  //let haspassword = bcrypt.hashSync(password2, 10);
  let haspassword = password2;


  if(haspassword != password){
    alert("Passwörter stimmen nicht überein!");
    return;
  }

  if(role == 2){
    alert("Inaktiver User");
    return;
  }

  if(role == 1){
    let urole = "admin";
    let userRole ={
      "role": urole,
      "uname": uname
    };
    setRoleCookie(userRole);
    console.log(document.cookie);
    alert("Erfolgreich eingelogt");
    return;
  }

  if(role == 0){
    let urole = "user";
    let userRole ={
      "role": urole,
      "uname": uname
    };
    setRoleCookie(userRole);
    console.log(document.cookie);
    alert("Erfolgreich eingelogt");
    return;
  }


}

function setRoleCookie(urole){
  var uJSON = JSON.stringify(urole);
  document.cookie = "urole="+uJSON+"; path=/";
}

function setLoginCookie(userdaten){
  var uJSON = JSON.stringify(urole);
  document.cookie = "loginDaten="+uJSON+"; path=/";
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