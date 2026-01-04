<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Books Management - Admin Panel</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { background: #f2f6fc; font-family: 'Segoe UI'; }
    .content { margin-left: 250px; padding: 30px; }
    .card { border: none; border-radius: 12px; }
    .sidebar { width:250px; height:100vh; position:fixed; left:0; top:0; background:#1e293b; padding-top:20px; }
    .sidebar a { color:#cbd5e1; padding:12px 20px; display:block; text-decoration:none; }
    .sidebar a:hover { background:#334155; color:#fff; }
    .topbar { background:#fff; padding:15px 25px; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.05); }
    .table img { width:50px; height:60px; object-fit:cover; border-radius:5px; }
  </style>
</head>

<body>

<?php include 'dash_nav.php'; ?>
<?php include 'db.php'; ?>

<div class="content">

  <!-- Topbar -->
  <div class="topbar d-flex justify-content-between align-items-center mb-4">
      <h4>Books Management</h4>
      <a href="add_book.php" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Add New Book
      </a>
  </div>

  <!-- Books Table -->
  <div class="card p-3 shadow-sm">
    <h5 class="mb-3">All Books</h5>

    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Price</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
        <?php
        $sql = "SELECT * FROM books";
        $result = mysqli_query($conn, $sql);
        $index = 1;

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?= $index++ ?></td>
            <td><?= $row['title']; ?></td>
            <td><?= $row['author']; ?></td>
             <td><?= $row['isbn']; ?></td>
            <td>₹<?= $row['price']; ?></td>
            <td><?= $row['category']; ?></td>
            <td><?= $row['stock']; ?></td>
            <td>
              <a href="edit_book.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">
                <i class="bi bi-pencil-square"></i>
              </a>

              <a href="delete_book.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" 
                 onclick="return confirm('Are you sure you want to delete this book?');">
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
