<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Orders Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css" rel="stylesheet">

<style>
body { background:#f2f6fc; font-family:'Segoe UI'; }
.content { margin-left:250px; padding:30px; }
.sidebar { width:250px; height:100vh; position:fixed; left:0; top:0; background:#1e293b; padding-top:20px; }
.sidebar a { color:#cbd5e1; padding:12px 20px; display:block; text-decoration:none; }
.sidebar a:hover { background:#334155; color:#fff; }
.card { border:none; border-radius:12px; }
.badge { padding:6px 10px; font-size:12px; }
</style>
</head>

<body>

<?php include 'dash_nav.php'; ?>

<div class="content">

<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
  <h4>Orders Management</h4>
</div>

<!-- Orders Table -->
<div class="card p-3 shadow-sm">
<h5 class="mb-3">All Orders</h5>

<div class="table-responsive">
<table class="table table-hover align-middle">
<thead class="table-light">
<tr>
  <th>ID</th>
  <th>Customer</th>
  <th>Books</th>
  <th>Total</th>
  <th>Payment</th>
  <th>Status</th>
  <th>Date</th>
  <th>Action</th>
</tr>
</thead>
<tbody>

<?php
$query = "
SELECT 
  o.id,
  o.total_amount,
  o.payment_method,
  o.status,
  o.created_at,
  c.name AS customer_name,
  GROUP_CONCAT(oi.book_name SEPARATOR ', ') AS book_names
FROM orders o
JOIN customers c ON o.customer_id = c.id
JOIN order_items oi ON o.id = oi.order_id
GROUP BY o.id
ORDER BY o.id DESC
";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

  while ($row = mysqli_fetch_assoc($result)) {

    // Payment badge
    $paymentBadge = ($row['payment_method'] === 'Online')
      ? '<span class="badge bg-info">Online</span>'
      : '<span class="badge bg-secondary">COD</span>';

    // Status badge
    $statusColors = [
      'Pending' => 'bg-warning',
      'Shipped' => 'bg-primary',
      'Delivered' => 'bg-success',
      'Cancelled' => 'bg-danger'
    ];
    $statusBadge = "<span class='badge {$statusColors[$row['status']]}'>{$row['status']}</span>";

    echo "
    <tr>
      <td>{$row['id']}</td>
      <td>{$row['customer_name']}</td>
      <td>{$row['book_names']}</td>
      <td>₹{$row['total_amount']}</td>
      <td>{$paymentBadge}</td>
      <td>{$statusBadge}</td>
      <td>".date('d M Y', strtotime($row['created_at']))."</td>
      <td>
        <a href='view_order.php?id={$row['id']}' class='btn btn-sm btn-primary'>
          <i class='bi bi-eye'></i>
        </a>
        <a href='update_order.php?id={$row['id']}' class='btn btn-sm btn-success'>
          <i class='bi bi-check-circle'></i>
        </a>
        <a href='delete_order.php?id={$row['id']}'
           onclick='return confirm(\"Delete this order?\")'
           class='btn btn-sm btn-danger'>
          <i class='bi bi-trash'></i>
        </a>
      </td>
    </tr>";
  }

} else {
  echo "<tr><td colspan='8' class='text-center text-muted'>No orders found</td></tr>";
}
?>

</tbody>
</table>
</div>
</div>

</div>

</body>
</html>
