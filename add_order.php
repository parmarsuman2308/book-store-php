<?php
include 'db.php';

// When form is submitted
if (isset($_POST['add_order'])) {
    $customer_id = $_POST['customer_id'];
    $book_id = $_POST['book_id'];
    $total_amount = $_POST['total_amount'];
    $payment_method = $_POST['payment_method'];
    $status = $_POST['status'];

    $query = "
        INSERT INTO orders (customer_id, book_id, total_amount, payment_method, status, order_date) 
        VALUES ('$customer_id', '$book_id', '$total_amount', '$payment_method', '$status', NOW())
    ";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Order Added Successfully');
                window.location='order.php';
              </script>";
    } else {
        echo "<script>alert('Error Adding Order');</script>";
    }
}

// Fetch customers
$customers = mysqli_query($conn, "SELECT * FROM customers");

// Fetch books
$books = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Order</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4" style="background: #f2f6fc;">

<div class="container shadow p-4 bg-white rounded" style="max-width:600px;">

  <!-- BACK BUTTON -->
  <div class="d-flex justify-content-end mb-3">
      <a href="order.php" class="btn btn-outline-primary">
          <i class="bi bi-arrow-left"></i> Back
      </a>
  </div>

  <h3 class="mb-3">Add New Order</h3>
  <hr>

  <form method="POST">

    <!-- Select Customer -->
    <label class="form-label">Select Customer</label>
    <select name="customer_id" class="form-control" required>
      <option value="">Choose Customer</option>
      <?php while ($c = mysqli_fetch_assoc($customers)) { ?>
        <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
      <?php } ?>
    </select>

    <!-- Select Book -->
    <label class="form-label mt-3">Select Book</label>
    <select name="book_id" class="form-control" required onchange="updatePrice(this)">
      <option value="">Choose Book</option>
      <?php
      $bookPriceList = [];
      while ($b = mysqli_fetch_assoc($books)) {
        $bookPriceList[$b['id']] = $b['price'];
      ?>
        <option value="<?= $b['id'] ?>"><?= $b['title'] ?></option>
      <?php } ?>
    </select>

    <!-- Auto Price -->
    <label class="form-label mt-3">Total Amount (₹)</label>
    <input type="number" id="priceBox" name="total_amount" class="form-control" required>

    <!-- Payment Method -->
    <label class="form-label mt-3">Payment Method</label>
    <select name="payment_method" class="form-control" required>
      <option>Online</option>
      <option>COD</option>
    </select>

    <!-- Status -->
    <label class="form-label mt-3">Order Status</label>
    <select name="status" class="form-control" required>
      <option>Pending</option>
      <option>Shipped</option>
      <option>Delivered</option>
      <option>Cancelled</option>
    </select>

    <button name="add_order" class="btn btn-primary mt-4 w-100">Add Order</button>

  </form>
</div>

<!-- Auto-fill Price Script -->
<script>
var priceList = <?php echo json_encode($bookPriceList); ?>;

function updatePrice(select) {
    let bookId = select.value;
    document.getElementById('priceBox').value = priceList[bookId] || '';
}
</script>

</body>
</html>
