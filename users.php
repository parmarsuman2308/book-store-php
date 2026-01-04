<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=unauthorized");
    exit();
}

if ($_SESSION['role'] !== "Admin") {
    header("Location: dashboard.php?error=restricted");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users Management - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background:#f2f6fc; font-family:'Segoe UI'; }
    .content { margin-left:250px; padding:30px; }
    .card { border:none; border-radius:12px; }
    .sidebar { width:250px; height:100vh; position:fixed; left:0; top:0; background:#1e293b; padding-top:20px; }
    .sidebar a { color:#cbd5e1; padding:12px 20px; display:block; text-decoration:none; }
    .sidebar a:hover { background:#334155; color:#fff; }
    .topbar { background:#fff; padding:15px 25px; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.05); }
  </style>
</head>
<body>

<?php include 'dash_nav.php'; ?>
<?php include 'db.php'; ?>

<!-- Main Content -->
<div class="content">

  <!-- Topbar -->
  <div class="topbar d-flex justify-content-between align-items-center mb-4 bg-white p-3 shadow-sm rounded">
    <h4>Users Management</h4>

    <!-- OPEN ADD USER IN user_actions.php -->
    <a href="user_actions.php?action=add" class="btn btn-primary">
      <i class="bi bi-person-plus me-1"></i> Add User
    </a>
  </div>

  <!-- Users Table -->
  <div class="card p-3 shadow-sm">
    <h5 class="mb-3">All Users</h5>
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
        <?php
        $i = 1;
        $query = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['phone']; ?></td>

            <td>
              <span class="badge 
                <?= ($row['role'] == 'Admin') ? 'bg-warning' : 'bg-info'; ?>">
                <?= $row['role']; ?>
              </span>
            </td>

            <td>
              <span class="badge 
                <?= ($row['status'] == 'Active') ? 'bg-success' : 'bg-danger'; ?>">
                <?= $row['status']; ?>
              </span>
            </td>

            <td>
              <!-- Edit -->
              <a href="user_actions.php?action=edit&id=<?= $row['id']; ?>" 
                 class="btn btn-sm btn-warning">
                <i class="bi bi-pencil-square"></i>
              </a>

              <!-- Activate / Block -->
              <?php if ($row['status'] == "Active") { ?>
                <a href="user_actions.php?action=block&id=<?= $row['id']; ?>" 
                   class="btn btn-sm btn-secondary">
                  <i class="bi bi-x-circle"></i>
                </a>
              <?php } else { ?>
                <a href="user_actions.php?action=activate&id=<?= $row['id']; ?>" 
                   class="btn btn-sm btn-success">
                  <i class="bi bi-check-circle"></i>
                </a>
              <?php } ?>

              <!-- Delete -->
              <a href="user_actions.php?action=delete&id=<?= $row['id']; ?>" 
                 onclick="return confirm('Delete this user?');"
                 class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>
        <?php } ?>
        </tbody>

      </table>
    </div>
  </div>

</div>

</body>
</html>
