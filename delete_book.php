<?php
include 'db.php';

// If no ID is provided, stop
if (!isset($_GET['id'])) {
    die("Invalid Request!");
}

$book_id = $_GET['id'];

// Delete book from database
$sql = "DELETE FROM books WHERE id = $book_id";

if (mysqli_query($conn, $sql)) {
    // Redirect back to books list
    header("Location: book.php?msg=Book Deleted Successfully");
    exit();
} else {
    echo "Error deleting book: " . mysqli_error($conn);
}
?>
