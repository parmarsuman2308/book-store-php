<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Books - Heaven Book Store</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
<?php 
include 'nav.php'; 
session_start();
?>

<div class="container py-5">
  <h3 class="mb-4">Checkout</h3>
  <div class="row">
    <!-- Checkout Form -->
    <div class="col-lg-6 mb-4">
      <div class="card shadow-sm p-3">
        <h5 class="mb-3">Billing & Shipping Details</h5>
        <form id="checkoutForm" method="POST" action="place_order.php">
          <input type="hidden" name="items" id="itemsInput">
          <input type="hidden" name="total_amount" id="totalAmountInput">

          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullName" placeholder="Enter your full name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Shipping Address</label>
            <textarea class="form-control" name="address" rows="3" placeholder="Enter your address" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="tel" class="form-control" name="phone" placeholder="Enter your phone number" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Payment Method</label>
            <select class="form-select" name="paymentMode" required>
              <option value="">Select Payment Mode</option>
              <option value="COD">Cash on Delivery</option>
              <option value="Online">Online Payment</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success w-100">
            Place Order ₹ <span id="totalAmount">0</span>
          </button>
        </form>
      </div>
    </div>

    <!-- Order Summary -->
    <div class="col-lg-6">
      <div class="card shadow-sm p-3">
        <h5 class="mb-3">Order Summary</h5>
        <div id="summaryItems" class="mb-3"></div>
        <hr>
        <p class="h5 text-end"><strong>Total:</strong> ₹<span id="summaryTotal">0</span></p>
      </div>
    </div>
  </div>
</div>

<script>
// Get cart from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];
const summaryItems = document.getElementById("summaryItems");
const summaryTotal = document.getElementById("summaryTotal");
const totalAmount = document.getElementById("totalAmount");

// Render order summary
function renderSummary() {
    if(cart.length === 0){
        summaryItems.innerHTML = '<p class="text-muted">Your cart is empty.</p>';
        summaryTotal.innerText = '0';
        totalAmount.innerText = '0';
        return;
    }

    let total = 0;
    summaryItems.innerHTML = '<div class="list-group">';

    cart.forEach(b => {
        let qty = b.qty || 1;
        let price = b.price * qty;
        total += price;

        summaryItems.innerHTML += `
        <div class="list-group-item d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <img src="${b.image || 'placeholder.jpg'}" alt="${b.title}" style="width:60px; height:80px; object-fit:cover; border-radius:5px; margin-right:10px;">
            <div>
              <strong>${b.title}</strong><br>
              <small>Qty: ${qty} | ₹${b.price} each</small>
            </div>
          </div>
          <div>
            ₹${price}
          </div>
        </div>`;
    });

    summaryItems.innerHTML += '</div>';
    summaryTotal.innerText = total;
    totalAmount.innerText = total;
}

renderSummary();

// Set hidden inputs before submitting form
document.getElementById("checkoutForm").addEventListener("submit", function(){
    document.getElementById("itemsInput").value = JSON.stringify(cart);
    document.getElementById("totalAmountInput").value = summaryTotal.innerText;
});
</script>

<?php include 'footer.php'; ?>
</body>
</html>