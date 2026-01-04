<?php
session_start();
include 'db.php';

// Access Restriction
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== "Admin") {
    header("Location: login.php?error=Access+Denied");
    exit();
}

// ------- Update Settings when form submitted -------
if(isset($_POST['save_settings'])) {

    $site_name = $_POST['site_name'];
    $tagline = $_POST['tagline'];
    $two_factor = $_POST['two_factor'];
    $session_timeout = $_POST['session_timeout'];

    $update = "UPDATE settings SET 
               site_name='$site_name',
               tagline='$tagline',
               two_factor='$two_factor',
               session_timeout='$session_timeout'
               WHERE id=1";

    if(mysqli_query($conn, $update)) {
        $success = "Settings Updated Successfully!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}

// Fetch Updated Data Always
$settings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM settings WHERE id=1"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Settings</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css" rel="stylesheet">

<style>
body { background:#f2f6fc; font-family:'Segoe UI'; }
.content { margin-left:250px; padding:30px; }
.card { border:none; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.06); }
.sidebar{width:250px;height:100vh;background:#1e293b;position:fixed;top:0;left:0;padding-top:20px;color:white;}
.sidebar a{color:#cbd5e1;text-decoration:none;padding:12px 20px;display:block;}
.sidebar a:hover,.active{background:#334155;color:white;}
</style>
</head>

<body>

<?php include 'dash_nav.php'; ?>

<div class="content">
<div class="container">

<h4 class="mb-3"><i class="bi bi-gear"></i> Settings</h4>

<?php if(isset($success)){ ?>
<div class="alert alert-success"><?= $success ?></div>
<?php } ?>
<?php if(isset($error)){ ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php } ?>

<form method="POST" class="card p-4 mt-3">

<h5 class="mb-3">General Settings</h5>

<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Website Name</label>
    <input type="text" class="form-control" name="site_name" value="<?= $settings['site_name'] ?>">
  </div>

  <div class="col-md-6">
    <label class="form-label">Tagline</label>
    <input type="text" class="form-control" name="tagline" value="<?= $settings['tagline'] ?>">
  </div>
</div>

<h5 class="mb-3 mt-4">Security Settings</h5>

<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Two-Factor Authentication</label>
    <select class="form-select" name="two_factor">
      <option <?= ($settings['two_factor']=="Disabled"?"selected":"") ?>>Disabled</option>
      <option <?= ($settings['two_factor']=="Enabled"?"selected":"") ?>>Enabled</option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="form-label">Session Timeout (minutes)</label>
    <input type="number" class="form-control" name="session_timeout" value="<?= $settings['session_timeout'] ?>">
  </div>
</div>

<button class="btn btn-primary px-4 mt-2" name="save_settings">
  <i class="bi bi-save me-1"></i> Save Settings
</button>

</form>

</div>
</div>

</body>
</html>
