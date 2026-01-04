<?php
include 'dashboards/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name    = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $payment = mysqli_real_escape_string($conn, $_POST['paymentMode']);
    $total   = floatval($_POST['total_amount']);
    $items   = json_decode($_POST['items'], true);

    mysqli_begin_transaction($conn);

    try {

        // 1️⃣ Customer
        mysqli_query($conn,"
            INSERT INTO customers (name,email,phone,address)
            VALUES ('$name','$email','$phone','$address')
        ");
        $customer_id = mysqli_insert_id($conn);

        // 2️⃣ Order
        mysqli_query($conn,"
            INSERT INTO orders (customer_id,total_amount,payment_method,status)
            VALUES ('$customer_id','$total','$payment','Pending')
        ");
        $order_id = mysqli_insert_id($conn);

        // 3️⃣ Order Items
        foreach ($items as $item) {

            $book_id = (int)$item['id'];
            $qty     = (int)$item['qty'];
            $price   = (float)$item['price'];
            $total_i = $qty * $price;

            $bookRes = mysqli_query($conn,"
                SELECT title FROM books WHERE id=$book_id
            ");

            if(mysqli_num_rows($bookRes)==0){
                throw new Exception("Book not found");
            }

            $book = mysqli_fetch_assoc($bookRes);
            $book_name = $book['title'];

            mysqli_query($conn,"
                INSERT INTO order_items
                (order_id, book_id, book_name, price, quantity, total)
                VALUES
                ('$order_id','$book_id','$book_name','$price','$qty','$total_i')
            ");
        }

        mysqli_commit($conn);

        echo "<script>
            localStorage.removeItem('cart');
            window.location='order_success.php';
        </script>";

    } catch (Exception $e) {
        mysqli_rollback($conn);
        echo "Order failed: ".$e->getMessage();
    }
}
?>
