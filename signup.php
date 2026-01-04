<?php
session_start();
include 'db.php';

if(isset($_POST['signup'])){
  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Password hashing
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert user (as Admin by default)
  $query = "INSERT INTO users (name, email, password_hash, role, status, created_at)
            VALUES ('$name', '$email', '$hashed_password', 'Admin', 'Active', NOW())";

  if(mysqli_query($conn, $query)){
      $_SESSION['user_id'] = mysqli_insert_id($conn);
      $_SESSION['name'] = $name;
      $_SESSION['role'] = "Admin";
      header("Location: dashboard.php");
      exit();
  } else {
      echo "<script>alert('Something went wrong!');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Signup</title>

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

    .signup-card {
      width: 460px;
      padding: 40px;
      border-radius: 25px;
      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(12px);
      color: white;
      box-shadow: 0 10px 28px rgba(0, 0, 0, 0.35);
      animation: fade 0.8s ease-in-out;
    }

    @keyframes fade {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .form-control {
      border-radius: 15px;
      padding: 12px;
      background: rgba(255,255,255,0.7);
      border: none;
    }

    .form-control:focus {
      box-shadow: 0 0 0 3px rgba(255,255,255,0.35);
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

    .signup-card h3 {
      font-weight: 700;
      margin-bottom: 10px;
    }

    a {
      color: #a5f3fc;
      text-decoration: none;
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

<div class="signup-card">
  <h3 class="text-center">Create Your Account</h3>
  <p class="text-center small mb-4">Join and get instant access to dashboard</p>

  <form method="POST">

    <div class="mb-3">
      <label class="form-label fw-semibold">Full Name</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
        <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
      </div>
    </div>

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
        <input type="password" name="password" class="form-control" placeholder="Create password" required>
      </div>
    </div>

    <button type="submit" name="signup" class="btn-main">Sign Up <i class="bi bi-person-plus ms-1"></i></button>
  </form>

  <p class="text-center mt-3 small">
    Already have an account?
    <a href="login.php">Login</a>
  </p>
</div>

</body>
</html>
