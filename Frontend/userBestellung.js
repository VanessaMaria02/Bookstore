$(document).ready(function () {
  $(document).on('click', '#produkteBestellen', function () {
    var userDaten = setNavbar();

    if (userDaten.role === "user") {
      var uname = userDaten.uname;
      showAddress(uname);
      window.location.href = "userBestellung.php"; 
      return;
    } else {
      alert("Sie müssen sich anmelden, um mit der Bestellung fortzufahren!");
      window.location.href = "login.php";
    }
  });
})
