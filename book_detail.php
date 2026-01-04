<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Detail - Heaven Book Store</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
body { font-family:'Segoe UI',sans-serif; background:#f5f6fa; color:#333; }
.book-detail-card { background:#fff; border-radius:12px; box-shadow:0 5px 25px rgba(0,0,0,0.07); overflow:hidden; transition:.3s; }
.book-detail-card:hover { box-shadow:0 10px 35px rgba(0,0,0,0.1); }
.book-img { width:100%; border-radius:12px; object-fit:cover; max-height:400px; }
.book-info { padding:25px; }
.book-title { font-size:24px; font-weight:700; margin-bottom:10px; }
.book-author { font-size:16px; color:#555; margin-bottom:15px; }
.book-price { font-size:20px; font-weight:700; color:#1b5e20; margin-bottom:15px; }
.book-isbn { font-size:14px; color:#777; margin-bottom:20px; }
.book-desc { font-size:15px; line-height:1.6; color:#555; margin-bottom:25px; }
.btn-cart { background:#1b5e20; color:#fff; border:none; transition:.3s; }
.btn-cart:hover { background:#145214; }
.btn-buy { background:#0d6efd; color:#fff; border:none; transition:.3s; }
.btn-buy:hover { background:#084298; }
</style>
</head>
<body>

<?php include 'nav.php'?>

<?php $id = $_GET['id']; ?>

<div class="container py-5" style="margin-top: 80px;">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="book-detail-card row g-0">
        <!-- Book Image -->
        <div class="col-md-5">
          <img id="bookImage" src="" class="book-img p-3" alt="Book Image">
        </div>
        <!-- Book Info -->
        <div class="col-md-7">
          <div class="book-info">
            <h2 id="bookTitle" class="book-title"></h2>
            <p id="bookAuthor" class="book-author"></p>
            <p id="bookPrice" class="book-price"></p>
            <p id="bookISBN" class="book-isbn"></p>
            <p id="bookDesc" class="book-desc"></p>
            <div class="d-flex gap-3">
              <button class="btn btn-cart flex-fill" onclick="addToCart()">Add to Cart <i class="bi bi-cart-plus"></i></button>
              <button class="btn btn-buy flex-fill" onclick="buyNow()">Buy Now <i class="bi bi-bag-check"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Toast Notification -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="cartToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">Book added to cart!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<script>
// Example Books Array
const books = [
  {id:1,title:"Atomic Habits",author:"James Clear",price:380,isbn:"9781847941831",img:"uploads/1.jpeg",desc:"Small habits that change your life."},
  {id:2,title:"Rich Dad Poor Dad",author:"Robert Kiyosaki",price:299,isbn:"9781612680194",img:"https://m.media-amazon.com/images/I/71Q0QobWE5L._SL1500_.jpg",desc:"Financial education and mindset."},
  {id:3,title:"Ikigai",author:"Héctor García",price:399,isbn:"9781786330895",img:"https://m.media-amazon.com/images/I/71tbalAHYCL._SL1500_.jpg",desc:"The Japanese secret to long life."},
  {id:4,title:"The Alchemist",author:"Paulo Coelho",price:280,isbn:"9780061122415",img:"https://m.media-amazon.com/images/I/71aFt4+OTOL._SL1500_.jpg",desc:"Follow your dreams and destiny."}
];

let cart = JSON.parse(localStorage.getItem("cart")) || [];
const id = <?= $id ?>;
const book = books.find(b=>b.id==id);

document.getElementById("bookImage").src = book.img;
document.getElementById("bookTitle").innerText = book.title;
document.getElementById("bookAuthor").innerText = "By " + book.author;
document.getElementById("bookPrice").innerText = "₹" + book.price;
document.getElementById("bookISBN").innerText = "ISBN: " + book.isbn;
document.getElementById("bookDesc").innerText = book.desc;


  function addToCart() {
  cart.push({
    id: book.id,        // ✅ URL se aayi hui REAL id
    title: book.title,
    price: book.price,
    qty: 1
  });

  localStorage.setItem("cart", JSON.stringify(cart));

  let toastEl = document.getElementById('cartToast');
  let toast = new bootstrap.Toast(toastEl);
  toast.show();
}

 

function buyNow() {
  addToCart();
  window.location.href = "cart.php"; // Redirect to cart page
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'footer.php'?>
</body>
</html>
