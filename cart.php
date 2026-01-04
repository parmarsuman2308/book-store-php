<!DOCTYPE html>
<html lang="hi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Heaven Book Store - Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      padding-top: 100px;
      background-color: #f9f9f9;
    }
    .card {
      border-radius: 10px;
    }
    .cart-img {
      width: 80px;
      height: 100px;
      object-fit: cover;
      border-radius: 5px;
    }
    .qty-btn {
      width: 30px;
      height: 30px;
      padding: 0;
      font-size: 18px;
    }
    .cart-actions button {
      margin-left: 5px;
    }
  </style>
</head>
<body>

<?php include 'nav.php'; ?>

<div class="container py-4">
    <h3 class="mb-4">My Cart</h3>

    <div id="cartItems" class="mb-3"></div>

    <hr>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>Total: ₹<span id="cartTotal">0</span></h5>
        <div>
          <button class="btn btn-danger me-2" onclick="clearCart()">Clear Cart</button>
          <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
        </div>
    </div>
</div>

<script>
let cart = JSON.parse(localStorage.getItem('cart')) || [];

function renderCart() {
    const cartItemsDiv = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');

    if(cart.length === 0){
        cartItemsDiv.innerHTML = '<p class="text-muted">Your cart is empty.</p>';
        cartTotal.innerText = '0';
        return;
    }

    let total = 0;
    cartItemsDiv.innerHTML = '';

    cart.forEach((b, index) => {
        let qty = b.qty || 1;
        let price = b.price * qty;
        total += price;

        cartItemsDiv.innerHTML += `
          <div class="card mb-3 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <img src="${b.image || 'placeholder.jpg'}" alt="${b.title}" class="cart-img me-3">
                <div>
                  <strong>${b.title}</strong> <br>
                  <small>Price: ₹${b.price}</small>
                  <div class="mt-2 cart-actions">
                    <button class="btn btn-outline-secondary qty-btn" onclick="updateQty(${index}, -1)">-</button>
                    <span class="mx-2">${qty}</span>
                    <button class="btn btn-outline-secondary qty-btn" onclick="updateQty(${index}, 1)">+</button>
                  </div>
                </div>
              </div>
              <div>
                ₹${price} 
                <button class="btn btn-sm btn-danger ms-2" onclick="removeItem(${index})">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </div>
          </div>
        `;
    });

    cartTotal.innerText = total;
}

function updateQty(index, change) {
    cart[index].qty = (cart[index].qty || 1) + change;
    if(cart[index].qty < 1) cart[index].qty = 1; // Minimum 1
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}

function removeItem(index){
    cart.splice(index,1);
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}

function clearCart(){
    cart = [];
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}

renderCart();
</script>

<?php include 'footer.php'; ?>
</body>
</html>
