<?php
include "db.php";

// Detect action
$action = $_GET['action'] ?? '';

// 1️⃣ ADD USER
if ($action == "add" && isset($_POST["save_user"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $role = $_POST["role"];

    mysqli_query($conn, "INSERT INTO users (name,email,phone,role,status)
                         VALUES ('$name','$email','$phone','$role','Active')");

    echo "<script>alert('User Added'); window.location='users.php';</script>";
    exit;
}

// 2️⃣ EDIT USER — load data
if ($action == "edit") {
    $id = $_GET["id"];
    $q = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    $user = mysqli_fetch_assoc($q);
}

// UPDATE USER — after submit
if ($action == "edit" && isset($_POST["update_user"])) {

    $id = $_POST['id'];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $role = $_POST["role"];

    mysqli_query($conn, "UPDATE users SET 
            name='$name', email='$email', phone='$phone', role='$role'
            WHERE id=$id");

    echo "<script>alert('User Updated'); window.location='users.php';</script>";
    exit;
}

// 3️⃣ BLOCK USER
if ($action == "block") {
    $id = $_GET["id"];
    mysqli_query($conn, "UPDATE users SET status='Blocked' WHERE id=$id");
    echo "<script>alert('User Blocked'); window.location='users.php';</script>";
    exit;
}

// 4️⃣ ACTIVATE USER
if ($action == "activate") {
    $id = $_GET["id"];
    mysqli_query($conn, "UPDATE users SET status='Active' WHERE id=$id");
    echo "<script>alert('User Activated'); window.location='users.php';</script>";
    exit;
}

// 5️⃣ DELETE USER
if ($action == "delete") {
    $id = $_GET["id"];
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
    echo "<script>alert('User Deleted'); window.location='users.php';</script>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Action</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container" style="max-width: 600px;">
    
    <?php if ($action == "add") { ?>

        <h3>Add New User</h3>
        <form method="POST">
            <label>Name</label>
            <input type="text" class="form-control" name="name" required>

            <label class="mt-2">Email</label>
            <input type="email" class="form-control" name="email" required>

            <label class="mt-2">Phone</label>
            <input type="text" class="form-control" name="phone" required>

            <label class="mt-2">Role</label>
            <select name="role" class="form-control">
                <option>Customer</option>
                <option>Admin</option>
            </select>

            <button class="btn btn-primary mt-3 w-100" name="save_user">Save User</button>
            <a href="users.php" class="btn btn-secondary mt-2 w-100">Cancel</a>
        </form>

    <?php } ?>


    <?php if ($action == "edit") { ?>

        <h3>Edit User</h3>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">

            <label>Name</label>
            <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>" required>

            <label class="mt-2">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>

            <label class="mt-2">Phone</label>
            <input type="text" class="form-control" name="phone" value="<?= $user['phone'] ?>" required>

            <label class="mt-2">Role</label>
            <select name="role" class="form-control">
                <option <?= $user['role']=='Customer' ? 'selected':'' ?>>Customer</option>
                <option <?= $user['role']=='Admin' ? 'selected':'' ?>>Admin</option>
            </select>

            <button class="btn btn-primary mt-3 w-100" name="update_user">Update User</button>
            <a href="users.php" class="btn btn-secondary mt-2 w-100">Cancel</a>
        </form>

    <?php } ?>

</div>

</body>
</html>
