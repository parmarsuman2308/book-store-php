<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("Invalid Order ID");
}

$id = $_GET['id'];

$query = "
    SELECT orders.*, customers.name AS customer_name, customers.email, customers.phone,
           books.title AS book_name, books.author
    FROM orders
    JOIN customers ON orders.customer_id = customers.id
    JOIN books ON orders.book_id = books.id
    WHERE orders.id = $id
";

$result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($result);

if (!$order) {
    die("Order not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f2f6fc;">



<div class="content" style="margin-left:250px; padding:30px;">

    <div class="d-flex justify-content-between mb-4">
        <h4>View Order</h4>
        <a href="order.php" class="btn btn-secondary">← Back</a>
    </div>

    <div class="card shadow p-4">

        <h5 class="mb-3">Order Details</h5>

        <table class="table">
            <tr><th>Order ID</th><td><?= $order['id'] ?></td></tr>
            <tr><th>Customer</th><td><?= $order['customer_name'] ?></td></tr>
            <tr><th>Email</th><td><?= $order['email'] ?></td></tr>
            <tr><th>Phone</th><td><?= $order['phone'] ?></td></tr>
            <tr><th>Book</th><td><?= $order['book_name'] ?> (<?= $order['author'] ?>)</td></tr>
            <tr><th>Total Amount</th><td>₹<?= $order['total_amount'] ?></td></tr>
            <tr><th>Payment</th><td><?= $order['payment_method'] ?></td></tr>
            <tr><th>Status</th><td><?= $order['status'] ?></td></tr>
            <tr><th>Date</th><td><?= date("d M Y", strtotime($order['order_date'])) ?></td></tr>
        </table>

    </div>

</div>

</body>
</html>
