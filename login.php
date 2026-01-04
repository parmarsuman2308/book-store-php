<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) == 1){
      $user = mysqli_fetch_assoc($result);

      if(password_verify($password, $user['password_hash'])){

          if($user['status'] == 'Blocked'){
              echo "<script>alert('Your account is blocked! Contact admin');</script>";
          } else {
              $_SESSION['user_id'] = $user['id'];
              $_SESSION['name'] = $user['name'];
              $_SESSION['role'] = $user['role'];

              header("Location: dashboard.php");
              exit();
          }

      } else {
          echo "<script>alert('Incorrect Password!');</script>";
      }

  } else {
      echo "<script>alert('Email not registered!');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #0f172a, #1e3a8a);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
    }

    .login-card {
      width: 460px;
      padding: 45px 40px;
      border-radius: 25px;
      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(13px);
      color: white;
      box-shadow: 0 10px 28px rgba(0, 0, 0, 0.35);
      text-align: center;
      animation: fade 0.8s ease-in-out;
    }

    @keyframes fade {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .login-card h3 {
      font-weight: 700;
      margin-bottom: 10px;
    }

    .form-control {
      border-radius: 15px;
      padding: 12px;
      background: rgba(255, 255, 255, 0.75);
      border: none;
      font-size: 15px;
    }

    .form-control:focus {
      box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.35);
    }

    .btn-main {
      border-radius: 15px;
      width: 100%;
      padding: 12px;
      background: #22c55e;
      border: none;
      font-weight: 600;
      font-size: 17px;
      transition: 0.3s;
    }

    .btn-main:hover {
      background: #16a34a;
      transform: scale(1.03);
    }

    a {
      color: #a5f3fc;
      text-decoration: none;
      font-weight: 500;
    }

    a:hover {
      text-decoration: underline;
    }

    .input-group-text {
      border-radius: 12px 0 0 12px;
    }

  </style>
</head>

<body>

<div class="login-card">
  <h3>Welcome Back 👋</h3>
  <p class="small mb-4">Login to continue to your dashboard</p>

  <form method="POST">

    <div class="mb-3">
      <label class="form-label fw-semibold">Email</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Password</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>
    </div>

    <button type="submit" name="login" class="btn-main mt-2">
      Login <i class="bi bi-arrow-right-circle ms-1"></i>
    </button>
  </form>

  <p class="text-center mt-3 small">
    Don’t have an account?
    <a href="signup.php">Sign up</a>
  </p>
</div>

</body>
</html>
