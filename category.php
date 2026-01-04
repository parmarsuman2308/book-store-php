<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Categories - BookStore Admin</title>
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
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    .topbar {
      background: white;
      padding: 15px 25px;
      border-radius: 12px;
      margin-bottom: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>

  <?php include 'dash_nav.php'?>

  <!-- Main Content -->
  <div class="content">

    <!-- Topbar -->
    <div class="topbar d-flex justify-content-between align-items-center">
      <h4>Categories</h4>
      <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        <i class="bi bi-plus"></i> Add Category
      </button>
    </div>

    <!-- Categories Table -->
    <div class="card p-3">
      <h5 class="mb-3"><i class="bi bi-list-check me-2"></i> Manage Categories</h5>
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Slug</th>
              <th>Date Added</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Fiction</td>
              <td>fiction</td>
              <td>21 Nov 2025</td>
              <td>
                <button class="btn btn-sm btn-warning me-2"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
              </td>
            </tr>

            <tr>
              <td>2</td>
              <td>Self-Help</td>
              <td>self-help</td>
              <td>20 Nov 2025</td>
              <td>
                <button class="btn btn-sm btn-warning me-2"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>

  </div>


  <!-- Add Category Modal -->
  <div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Category</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label class="form-label">Category Name</label>
              <input type="text" class="form-control" placeholder="Enter Category Name" required>
            </div>
            <div class="text-end">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
