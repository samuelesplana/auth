<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirm Account</title>
  <link rel="stylesheet" href="CSS/confirm_email.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>

<body>
  
  <div class="header">
    <div class="container">
      <div class="check">
        <ion-icon name="checkmark-outline"></ion-icon>
      </div>
      <h1>Confirm Account!</h1>
      <div class="content">
        <p>A verification link has been sent to your email</p>
      </div>
      <button type="submit">OK</button>
    </div>
  </div>

  <script>
    document.querySelector('button').onclick = function() {
      location.href = "index.php";
    };
  </script>

</body>

</html>