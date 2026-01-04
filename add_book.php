<?php
include 'db.php';

$message = "";

// When form is submitted
if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];

    // Insert into table (no image column)
    $sql = "INSERT INTO books (title, author, price, category, stock)
            VALUES ('$title', '$author', '$price', '$category', '$stock')";

    if (mysqli_query($conn, $sql)) {
        $message = "Book added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Book</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#f4f6fa; }
.card { border-radius:12px; }
</style>

</head>
<body>

<div class="container mt-5">

    <div class="card p-4 shadow-sm">
        <h3>Add New Book</h3>
        <hr>

        <?php if ($message != "") { ?>
            <div class="alert alert-info"><?= $message ?></div>
        <?php } ?>

        <form method="POST">

            <div class="mb-3">
                <label>Book Title</label>
                <input type="text" name="title" required class="form-control">
            </div>

            <div class="mb-3">
                <label>Author</label>
                <input type="text" name="author" required class="form-control">
            </div>

            <div class="mb-3">
                <label>Price (₹)</label>
                <input type="number" name="price" required class="form-control">
            </div>

            <div class="mb-3">
                <label>Category</label>
                <input type="text" name="category" required class="form-control">
            </div>

            <div class="mb-3">
                <label>Stock</label>
                <input type="number" name="stock" required class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">
                Add Book
            </button>

            <a href="book.php" class="btn btn-secondary">Back</a>

        </form>

    </div>

</div>

</body>
</html>
