<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify Account</title>
  <link rel="stylesheet" href="CSS/confirm_email.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>

<body>

  <div class="header">
    <div class="container">
      <div class="check">
        <ion-icon name="checkmark-outline"></ion-icon>
      </div>
      <h1>Account Verified!</h1>
      <div class="content">
        <p>Your account successfully verified</p>
      </div>
      <button type="submit">OK</button>
    </div>
  </div>

  <script>
    document.querySelector('button') .onclick = function() {
      location.href = "index.php";
    }
  </script>

</body>

</html>

<?php

include('connection.php');

if (isset($_GET['code'])) {

  $activationString = $_GET['code'];

  $resultSet = mysqli_query($conn, "SELECT activation_string,status FROM accounts WHERE status = 0 and activation_string = '$activationString' LIMIT 1");

  if ($resultSet->num_rows == 1) {
    // Validate email
    $update = mysqli_query($conn, "UPDATE ACCOUNTS SET status = 1 WHERE activation_string = '$activationString' LIMIT 1");

    if ($update) {
    } else {
      echo $conn->error;
    }
  } else {
    echo "";
  }
} else {
  die("Something went wrong!");
}

?>