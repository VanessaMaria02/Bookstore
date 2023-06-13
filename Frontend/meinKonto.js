// Funktion zum Ändern des Passworts
function Stammdaten() {
    var u_username = $('#username').val();
    var oldPassword = $('#oldPassword').val();
    var newPassword = $('#newPassword').val();
    var confirmPassword = $('#confirmPassword').val();
    
    if (newPassword !== confirmPassword) {
      alert('Die neuen Passwörter stimmen nicht überein.');
      return;
    }
    
    $.ajax({
      url: 'passwort_aendern.php',
      method: 'POST',
      data: {
        u_usernameusername: username,
        oldPassword: oldPassword,
        newPassword: newPassword
      },
      success: function(data) {
        if (data === 'success') {
          alert('Das Passwort wurde erfolgreich geändert.');
          $('#passwortForm')[0].reset(); // Formular zurücksetzen
        } else {
          alert('Fehler beim Ändern des Passworts.');
        }
      }
    });
  }
  