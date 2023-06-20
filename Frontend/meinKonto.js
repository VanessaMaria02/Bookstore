$(document).ready(function() {
  // Handle the form submission
  $("#updateForm").submit(function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get the form data
    var formData = $(this).serialize();

    // Make an AJAX request to update the user information
    ajaxHandler("updateUser", formData, function(response) {
      // Handle the response from the server
      if (response.success) {
        alert("User information updated successfully.");
        // redirect the user to a new page or perform any other action
      } else {
        alert("Error: " + response.error);
      }
    });
  });

  // Handle the change password form submission
  $("#changePasswordForm").submit(function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get form values
    var userId = 1; // Assign the appropriate user ID here
    var oldPassword = $("#oldPassword").val();
    var newPassword = $("#newPassword").val();
    var confirmPassword = $("#confirmPassword").val();

    // Perform client-side validation
    if (newPassword !== confirmPassword) {
      showMessage("Passwords do not match");
      return;
    }

    // Send password change request to server using AJAX
    var formData = "userId=" + encodeURIComponent(userId) +
                   "&oldPassword=" + encodeURIComponent(oldPassword) +
                   "&newPassword=" + encodeURIComponent(newPassword);
    ajaxHandler("changePassword", formData, function(response) {
      // Handle the response from the server
      showMessage(response.message);
    });
  });

  // Function to handle AJAX requests
  function ajaxHandler(method, searchterm, nextFunc = () => {}) {
    $.ajax({
      type: "POST",
      url: "../Backend/serviceHandler.php",
      cache: false,
      data: { method: method, param: searchterm },
      dataType: "json",
      success: function(response) {
        console.log(response);
        nextFunc(response);
      },
      error: function(xhr) {
        console.log(xhr);
        alert("Error: An unexpected problem occurred - " + xhr.responseText);
      }
    });
  }

  function showMessage(message) {
    $("#message").text(message);
  }
});

$(document).ready(function() {
  // AJAX-Anfrage, um Bestellungen abzurufen
  $("#bestellungenBtn").click(function() {
    $.ajax({
      url: "../Backend/serviceHandler.php", // Pfad zur Serverseite, die Bestellungen verarbeitet
      type: "GET",
      cache: false,
      data: { method: method, param: searchterm },
      dataType: "json",
      success: function(response) {
        $("#getIDBestellungundProdukt").html(response);
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
  
  // AJAX-Anfrage, um Rechnung zu generieren
  $("#rechnungBtn").click(function() {
    $.ajax({
      url: "../Backend/config/db_requests/rechnung.php", // Pfad zur Serverseite, die die Rechnung generiert
      type: "POST",
      data: { bestellungsId: $("#bestellungsId").val() }, // Bestellungs-ID, die für die Rechnung benötigt wird
      success: function(response) {
        $("#rechnungErgebnis").html(response);
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
});
