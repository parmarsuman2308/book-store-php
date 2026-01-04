<?php
include 'db.php';

if (isset($_GET['id'])) {

    $order_id = $_GET['id'];

    // Delete order_items first
    mysqli_query($conn, "DELETE FROM order_items WHERE order_id = $order_id");

    // Now delete main order
    $query = "DELETE FROM orders WHERE id = $order_id";

    if (mysqli_query($conn, $query)) {
        header("Location: order.php?msg=deleted");
        exit;
    } else {
        echo "Error deleting order: " . mysqli_error($conn);
    }
}
?>
