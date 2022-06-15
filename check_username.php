<?php

include('connection.php');

if(isset($_POST['username'])) {
  $username = $_POST['username'];

  $query = "SELECT COUNT(*) as allcount FROM accounts WHERE username='".$username."' ";
  $result = mysqli_query($conn, $query);

  $response = "<span style='color: #10ac84; font-size: 13px; position: absolute; right: 50px; top: 130px;'> Available </span>";
  if(mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);

    $count = $row['allcount'];
    if($count > 0) {
      $response = "<span style='color: #ff6b6b; font-size: 13px; position: absolute; right: 40px; top: 130px;'>Not Available </span>";
    }
  }

  echo $response;
  die;
}

?>