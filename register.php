<?php
session_start();
include "dashboards/db.php";

$msg = "";

if (isset($_POST['register'])) {

  $name  = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $addr  = mysqli_real_escape_string($conn, $_POST['address']);
  $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $check = mysqli_query($conn, "SELECT id FROM customers WHERE email='$email'");

  if (mysqli_num_rows($check) > 0) {
    $msg = "<div class='alert alert-danger'>Email already registered</div>";
  } else {

    $sql = "INSERT INTO customers (name,email,password,phone,address)
            VALUES ('$name','$email','$pass','$phone','$addr')";

    if (mysqli_query($conn, $sql)) {
      $msg = "<div class='alert alert-success'>
                Registration successful! <a href='login.php'>Login</a>
              </div>";
    } else {
      $msg = "<div class='alert alert-danger'>Registration failed</div>";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card p-4 shadow">
<h3>Register</h3>
<?= $msg ?>

<form method="POST">
<input class="form-control mb-3" name="name" placeholder="Full Name" required>
<input class="form-control mb-3" name="email" type="email" placeholder="Email" required>
<input class="form-control mb-3" name="password" type="password" placeholder="Password" required>
<input class="form-control mb-3" name="phone" placeholder="Phone">
<textarea class="form-control mb-3" name="address" placeholder="Address"></textarea>

<button name="register" class="btn btn-primary w-100">Register</button>
<a href="login.php" class="btn btn-link w-100">Already have account? Login</a>
</form>

</div>
</div>
</div>
</div>

</body>
</html>
