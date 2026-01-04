<?php
include 'db.php';

// ----- Fetch book data -----
if (!isset($_GET['id'])) {
    die("Book ID missing!");
}

$id = $_GET['id'];

$sql = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $sql);
$book = mysqli_fetch_assoc($result);

if (!$book) {
    die("Book not found!");
}

// ----- Update book -----
$message = "";

if (isset($_POST['update'])) {

    $title    = $_POST['title'];
    $author   = $_POST['author'];
    $price    = $_POST['price'];
    $category = $_POST['category'];
    $stock    = $_POST['stock'];

    $update = "UPDATE books SET 
                title='$title',
                author='$author',
                price='$price',
                category='$category',
                stock='$stock',
                updated_at = NOW()
               WHERE id=$id";

    if (mysqli_query($conn, $update)) {
        $message = "Book Updated Successfully!";
    } else {
        $message = "Error updating: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">

    <div class="card p-4 shadow-sm">
        <h3>Edit Book</h3>
        <hr>

        <?php if ($message != "") { ?>
            <div class="alert alert-info"><?= $message ?></div>
        <?php } ?>

        <form method="POST">

            <div class="mb-3">
                <label>Book Title</label>
                <input type="text" name="title" class="form-control" required 
                       value="<?= $book['title']; ?>">
            </div>

            <div class="mb-3">
                <label>Author</label>
                <input type="text" name="author" class="form-control" required 
                       value="<?= $book['author']; ?>">
            </div>

            <div class="mb-3">
                <label>Price (₹)</label>
                <input type="number" name="price" class="form-control" required 
                       value="<?= $book['price']; ?>">
            </div>

            <div class="mb-3">
                <label>Category</label>
                <input type="text" name="category" class="form-control" required 
                       value="<?= $book['category']; ?>">
            </div>

            <div class="mb-3">
                <label>Stock</label>
                <input type="number" name="stock" class="form-control" required 
                       value="<?= $book['stock']; ?>">
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="book.php" class="btn btn-secondary">Back</a>

        </form>

    </div>

</div>
</body>
</html>
