<?php
$host = "localhost";     // server
$user = "root";          // MySQL username (XAMPP/WAMP default = root)
$pass = "";              // MySQL password (default empty)
$db   = "bookstore";     // your database name

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
