

$(document).ready(function() {
  console.log(document.cookie);
  getLoginCookie();

  $("#login").on("click", login);

})

function login(){
  console.log("click");
  let uname = document.getElementById("Username").value;
  let password = document.getElementById("Passwort").value;
  var rememberCheckbox = document.getElementById("remember");

 


  console.log(uname);

  ajaxHandler("login", uname, function(response){
    console.log(response);
    
    checkUser(response, password);
    if(rememberCheckbox.checked){
      let userdaten ={
        "uname": uname,
        "password": password
      };
      setLoginCookie(userdaten);
    }
  });
}

  function logincookie(userdaten){
    console.log(userdaten);
    let uname;
    let password;

    uname = userdaten.uname;
    password = userdaten.password;

    ajaxHandler("login", uname, function(response){
      console.log(response);
      checkUser(response, password);
    });

    
  }

  function getLoginCookie(){
    console.log("getLoginCookie");
    var cookieValue = document.cookie
      .split("; ")
      .map(row => row.trim())
      .find(row => row.startsWith("loginDaten="));

    if(cookieValue){
      var userDatenJson = cookieValue.split("=")[1];
      var userDaten = JSON.parse(userDatenJson);
      logincookie(userDaten);
    }else{
      return[];
    }

  }



function checkUser(userDaten, password){
  
  let uname = " ";
  let password2 = " ";
  let role = " ";

  userDaten.forEach(element =>{
    uname = element.uname;
    password2 = element.password;
    role = element.urole;
  });

  let hashPassword = password;

  //Passwort hashen funktioniert nicht?

  //console.log(password);
  //console.log(password2);

 //console.log("befor");
  //ajaxHandler("hashPassword",password, function(response){
   //console.log(response);
    //hashPassword = response.password;
  //});
  //console.log("afer");
  


  if(hashPassword != password2){
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
    location.replace("./index.php?success=");
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
    location.replace("./index.php?success=");
    return;
  }


}

function setRoleCookie(urole){
  var uJSON = JSON.stringify(urole);
  document.cookie = "urole="+uJSON+"; path=/";
}

function setLoginCookie(userdaten){
  var uJSON = JSON.stringify(userdaten);
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
          alert('Error, ein Problem ist aufgetreten überprüfen Sie ihre Eingaben'+xhr.responseText);
      }
  });
}