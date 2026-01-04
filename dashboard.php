<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=unauthorized");
    exit();
}

if ($_SESSION['role'] !== "Admin") {
    header("Location: login.php?error=notadmin");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - BookStore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      background: #f2f6fc;
      font-family: 'Segoe UI', sans-serif;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background: #1e293b;
      color: white;
      padding-top: 20px;
    }
    .sidebar a {
      color: #cbd5e1;
      text-decoration: none;
      padding: 12px 20px;
      display: block;
      font-size: 15px;
      transition: 0.2s;
    }
    .sidebar a:hover, .sidebar a.active {
      background: #334155;
      color: #fff;
    }
    .content {
      margin-left: 250px;
      padding: 30px;
    }
    .card {
      border: none;
      border-radius: 12px;
    }
    .topbar {
      background: white;
      padding: 15px 25px;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      margin-bottom: 20px;
    }

    .stat-card { position: relative; transition: 0.3s; cursor: pointer; }
  .stat-card:hover { transform: translateY(-4px); box-shadow: 0 8px 20px rgba(0,0,0,.08) !important; }
  .list-group-item { background: none !important; border: none; padding: 6px 0; }
  .timeline li { list-style: none; }
  </style>
</head>
<body>
  <?php include 'dash_nav.php'?>
  <?php include 'db.php'; ?>


  <!-- Main Content -->
  <div class="content">

   <!-- Topbar -->
<div class="topbar d-flex justify-content-between align-items-center">
  <h4 class="fw-bold mb-0">📊 Dashboard</h4>
  <div>
    <i class="bi bi-bell fs-4 me-3"></i>
    <span class="text-dark" data-bs-toggle="tooltip" title="<?php echo $_SESSION['name']; ?>">
      <i class="bi bi-person-circle fs-4"></i>
    </span>
  </div>
</div>

<!-- Stats Cards -->
<div class="row mt-4 g-4">
  <div class="col-md-3">
    <div class="shadow-sm p-4 bg-white rounded-4 stat-card">
      <p class="mb-1 text-secondary small">Total Books</p>
      <h2 class="fw-bold">120</h2>
      <i class="bi bi-book fs-1 text-primary position-absolute end-0 bottom-0 opacity-25 pe-3 pb-2"></i>
    </div>
  </div>

  <div class="col-md-3">
    <div class="shadow-sm p-4 bg-white rounded-4 stat-card">
      <p class="mb-1 text-secondary small">Total Orders</p>
      <h2 class="fw-bold">85</h2>
      <i class="bi bi-cart-check fs-1 text-success position-absolute end-0 bottom-0 opacity-25 pe-3 pb-2"></i>
    </div>
  </div>

  <div class="col-md-3">
    <div class="shadow-sm p-4 bg-white rounded-4 stat-card">
      <p class="mb-1 text-secondary small">Total Users</p>
      <h2 class="fw-bold">54</h2>
      <i class="bi bi-people fs-1 text-warning position-absolute end-0 bottom-0 opacity-25 pe-3 pb-2"></i>
    </div>
  </div>

  <div class="col-md-3">
    <div class="shadow-sm p-4 bg-white rounded-4 stat-card">
      <p class="mb-1 text-secondary small">Pending Orders</p>
      <h2 class="fw-bold">12</h2>
      <i class="bi bi-clock-history fs-1 text-danger position-absolute end-0 bottom-0 opacity-25 pe-3 pb-2"></i>
    </div>
  </div>
</div>

<!-- Insights -->
<div class="row mt-4 g-4">

  <!-- Activity -->
  <div class="col-md-4">
    <div class="shadow-sm p-4 bg-white rounded-4 h-100">
      <h6 class="fw-semibold mb-3"><i class="bi bi-activity text-danger"></i> Site Activity</h6>
      <ul class="list-group list-group-flush small">
        <li class="list-group-item"><i class="bi bi-check-circle-fill text-success"></i> 5 New Users Joined Today</li>
        <li class="list-group-item"><i class="bi bi-bag-check-fill text-primary"></i> 14 Books Sold Last 24hrs</li>
        <li class="list-group-item"><i class="bi bi-eye-fill text-warning"></i> 350+ Daily Visitors</li>
      </ul>
    </div>
  </div>

  <!-- System Health -->
  <div class="col-md-4">
    <div class="shadow-sm p-4 bg-white rounded-4 h-100">
      <h6 class="fw-semibold mb-3"><i class="bi bi-heart-pulse text-primary"></i> System Health</h6>

      <p class="small mb-1 fw-semibold">Database Status</p>
      <div class="progress mb-3"><div class="progress-bar progress-bar-striped" style="width: 98%">98%</div></div>

      <p class="small mb-1 fw-semibold">Storage Usage</p>
      <div class="progress"><div class="progress-bar bg-warning progress-bar-striped" style="width: 45%">45%</div></div>
    </div>
  </div>

  <!-- Trending -->
  <div class="col-md-4">
    <div class="shadow-sm p-4 bg-white rounded-4 h-100">
      <h6 class="fw-semibold mb-3"><i class="bi bi-fire text-danger"></i> Trending Book</h6>
      <strong class="fs-5">Rich Dad Poor Dad</strong>
      <p class="small text-muted mb-0">Most Viewed This Week</p>
    </div>
  </div>
</div>

<!-- Latest Updates -->
<div class="shadow-sm mt-4 p-4 bg-white rounded-4">
  <h6 class="fw-semibold mb-3"><i class="bi bi-clock-history text-info"></i> Latest Updates</h6>
  <ul class="small timeline mb-0">
    <li class="mb-2"><i class="bi bi-arrow-right-circle text-success"></i> New Book Added — “Digital Marketing”</li>
    <li class="mb-2"><i class="bi bi-person-plus text-primary"></i> New Admin Assigned — Aditya</li>
    <li><i class="bi bi-star text-warning"></i> “Atomic Habits” hits 500+ sales</li>
  </ul>
</div>




  </div>
<script>
  let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>

</body>
</html>
