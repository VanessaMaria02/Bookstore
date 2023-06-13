$(document).ready(function () {
  // Set the "Remember Me" checkbox status based on the cookie value
  var rememberCheckbox = document.getElementById('remember');
  var rememberCookie = getCookie('remember');
  if (rememberCookie === '1') {
    rememberCheckbox.checked = true;
  }

  // Function to retrieve cookie value by name
  function getCookie(name) {
    var cookies = document.cookie.split('; ');
    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i].split('=');
      if (cookie[0] === name) {
        return cookie[1];
      }
    }
    return '';
  }

  // Handle login form submission
  $('#loginForm').submit(function (event) {
    event.preventDefault(); // Prevent form submission

    var u_username = $('#u_username').val();
    var u_password = $('#u_password').val();

    // Make AJAX request for login
    $.ajax({
      type: 'GET',
      url: '../Backend/serviceHandler.php', // Adjust this path based on your directory structure
      dataType: 'json',
      data: {
        method:"login",
        param:JSON.stringify({
          username: u_username,
          password: u_password,
        })
      },
      success: function (response) {
        // Handle the login response
        if (response) {
            if (response.success) {
                // Login successful, redirect to the desired page
                window.location.href = 'index.php'; // Replace with the desired page after login
                console.log(JSON.stringify(response));
            } else {
                // Login failed, display error message
                console.log('error24');
                console.log(JSON.stringify(response));
            }
        } else {
            console.log('Empty response from server');
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // An error occurred during the AJAX request
        console.error('An error occurred during the AJAX request: ', textStatus, ', ', errorThrown);
      }
    });
  });
});
