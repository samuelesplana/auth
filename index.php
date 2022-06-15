<?php
include('register.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title> Register </title>
  <link rel="stylesheet" href="CSS/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>

  <form action="index.php" method="POST">

    <p>Create Account</p>
    <!-- Response -->
    <div id="usernameResponse"></div>
    <input type="text" name="username" id="username" placeholder="Username" required>

    <input type="password" name="password" id="password" placeholder="Password" required>

    <!-- Password Response -->
    <div id="matchResponse"></div>
    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>

    <input type="email" name="email" id="email" placeholder="Email" required>

    <input type="submit" name="submit" value="Register" id="btn">
  </form>


  <!-- Script -->

  <script>
    $(document).ready(function() {

      $("#username").keyup(function() {

        let username = $(this).val().trim();

        if (username != "") {

          $.ajax({
            url: 'check_username.php',
            type: 'post',
            data: {
              username: username
            },
            success: function(response) {
              $('#usernameResponse').html(response);
            }
          });
        } else {
          $("#usernameResponse").html("");
        }

      });

    });

    $(document).ready(function() {

      $('#confirmPassword, #password').keyup(function() {
        if ($('#password').val() == $('#confirmPassword').val()) {
          $('#matchResponse').html("");
        } else {
          $('#matchResponse').html("Password don't match").css({
            'color': '#ff6b6b',
            'font-size': '12px',
            'position': 'absolute',
            'right': '10%',
            'top': '54%',
          });
        }
      });

    });
  </script>

</body>

</html>