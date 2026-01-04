<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("Invalid Order ID");
}

$id = $_GET['id'];

$query = "SELECT * FROM orders WHERE id = $id";
$result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($result);

if (!$order) {
    die("Order not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];

    $update = "UPDATE orders SET status='$status' WHERE id=$id";
    mysqli_query($conn, $update);

    header("Location: order.php?msg=updated");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Order Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f2f6fc;">



<div class="content" style="margin-left:250px; padding:30px;">

    <div class="d-flex justify-content-between mb-4">
        <h4>Update Order Status</h4>
        <a href="order.php" class="btn btn-secondary">← Back</a>
    </div>

    <div class="card shadow p-4">

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Order ID</label>
                <input type="text" class="form-control" value="<?= $order['id'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Current Status</label>
                <input type="text" class="form-control" value="<?= $order['status'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Change Status</label>
                <select class="form-select" name="status" required>
                    <option <?php if($order['status']=="Pending") echo 'selected' ?>>Pending</option>
                    <option <?php if($order['status']=="Shipped") echo 'selected' ?>>Shipped</option>
                    <option <?php if($order['status']=="Delivered") echo 'selected' ?>>Delivered</option>
                    <option <?php if($order['status']=="Cancelled") echo 'selected' ?>>Cancelled</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Update</button>

        </form>

    </div>

</div>

</body>
</html>
