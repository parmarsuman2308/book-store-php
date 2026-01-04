<?php
session_start();

// Destroy session if user confirms logout
if (isset($_POST['confirmLogout'])) {
  session_unset();
  session_destroy();
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Logout - BookStore Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      background: #f2f6fc;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .logout-card {
      background: #fff;
      border-radius: 14px;
      width: 420px;
      padding: 30px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .logout-card i {
      font-size: 60px;
      color: #dc3545;
      margin-bottom: 15px;
    }
  </style>
</head>

<body>

  <div class="logout-card">
    <i class="bi bi-box-arrow-right"></i>
    <h3 class="mb-2">Logout Confirmation</h3>
    <p class="text-muted">Are you sure you want to logout from Admin Dashboard?</p>

    <form method="POST">
      <button type="submit" name="confirmLogout" class="btn btn-danger w-100 my-2">Yes, Logout</button>
      <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>
    </form>
  </div>

</body>
</html>
