<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Books - Heaven Book Store</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
body { font-family:'Segoe UI',sans-serif; background:#f5f6fa; color:#333; }
.container h3 { text-align:center; font-weight:700; margin-bottom:100px; letter-spacing:-0.5px; }
.book-card { background:#fff; border-radius:12px; overflow:hidden; transition:0.4s; box-shadow:0 5px 20px rgba(0,0,0,0.08); display:flex; flex-direction:column; height:100%; }
.book-card:hover { transform:translateY(-8px); box-shadow:0 15px 35px rgba(0,0,0,0.12); }
.book-card img { width:100%; height:250px; object-fit:cover; transition:0.4s; }
.book-card img:hover { transform:scale(1.05); }
.book-body { padding:15px; display:flex; flex-direction:column; justify-content:space-between; flex:1; }
.book-title { font-size:17px; font-weight:600; margin-bottom:5px; }
.book-author { font-size:14px; color:#555; margin-bottom:10px; }
.book-price { font-weight:700; color:#1b5e20; font-size:16px; margin-bottom:10px; }
.book-buttons { display:flex; gap:10px; }
.btn-view { flex:1; border:1px solid #0d6efd; color:#0d6efd; transition:0.3s; font-size:14px; }
.btn-view:hover { background:#0d6efd; color:#fff; }
.btn-add { flex:1; background:#1b5e20; color:#fff; border:none; transition:0.3s; font-size:14px; }
.btn-add:hover { background:#145214; }

/* Responsive adjustments */
@media (max-width:576px){
  .book-card img { height:200px; }
}
</style>
</head>
<body>

<?php include 'nav.php'?>

<div class="container" style="padding-top:100px; padding-bottom:50px;">
  <h3 class="text-center mb-4">All Books</h3>
  <div class="row g-4" id="booksGrid"></div>
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
const books = [
  {id:1,title:"Php for beginners",author:"James Clear",price:380,isbn:"9781847941831",img:"uploads/1.jpeg"},
  {id:2,title:"Rich Dad Poor Dad",author:"Robert Kiyosaki",price:299,isbn:"9781612680194",img:"https://m.media-amazon.com/images/I/71Q0QobWE5L._SL1500_.jpg"},
  {id:3,title:"Ikigai",author:"Héctor García",price:399,isbn:"9781786330895",img:"https://m.media-amazon.com/images/I/71tbalAHYCL._SL1500_.jpg"},
  {id:4,title:"The Alchemist",author:"Paulo Coelho",price:280,isbn:"9780061122415",img:"https://m.media-amazon.com/images/I/71aFt4+OTOL._SL1500_.jpg"},
  {id:5,title:"Psychology of Money",author:"Morgan Housel",price:420,isbn:"9789390166268",img:"https://m.media-amazon.com/images/I/81vpsIs58WL._SL1500_.jpg"},
  {id:6,title:"Think and Grow Rich",author:"Napoleon Hill",price:310,isbn:"9788194898801",img:"https://m.media-amazon.com/images/I/71UypkUjStL._SL1500_.jpg"},
  {id:7,title:"Wings of Fire",author:"A. P. J. Abdul Kalam",price:350,isbn:"9788173711466",img:"https://m.media-amazon.com/images/I/81bKK4h6n0L._SL1500_.jpg"},
  {id:8,title:"Do It Today",author:"Darius Foroux",price:260,isbn:"9780143452127",img:"https://m.media-amazon.com/images/I/71+hS5AbZBL._SL1500_.jpg"},
  {id:9,title:"The Power of Subconscious Mind",author:"Joseph Murphy",price:399,isbn:"9788183225098",img:"https://m.media-amazon.com/images/I/61jBLw5Bq9L._SL1000_.jpg"},
  {id:10,title:"You Can Win",author:"Shiv Khera",price:370,isbn:"9789382951711",img:"https://m.media-amazon.com/images/I/71WKpZrV8GL._SL1500_.jpg"},
  {id:11,title:"Life’s Amazing Secrets",author:"Gaur Gopal Das",price:320,isbn:"9780143442296",img:"https://m.media-amazon.com/images/I/71B28m2uDCL._SL1500_.jpg"},
  {id:12,title:"Harry Potter and the Sorcerer’s Stone",author:"J.K. Rowling",price:550,isbn:"9781408855652",img:"https://m.media-amazon.com/images/I/81YOuOGFCJL._SL1500_.jpg"},
  {id:13,title:"Sherlock Holmes",author:"Arthur Conan Doyle",price:480,isbn:"9780140439076",img:"https://m.media-amazon.com/images/I/81kqZrnc+CL._SL1500_.jpg"},
  {id:14,title:"Deep Work",author:"Cal Newport",price:430,isbn:"9780349413686",img:"https://m.media-amazon.com/images/I/71l1C8G+gyL._SL1500_.jpg"},
  {id:15,title:"ReWork",author:"Jason Fried",price:390,isbn:"9780307463746",img:"https://m.media-amazon.com/images/I/71Pwro2OTvL._SL1500_.jpg"},
  {id:16,title:"Start With Why",author:"Simon Sinek",price:410,isbn:"9781591846444",img:"https://m.media-amazon.com/images/I/71L0w6HKSAL._SL1500_.jpg"},
  {id:17,title:"Zero to One",author:"Peter Thiel",price:450,isbn:"9780804139298",img:"https://m.media-amazon.com/images/I/71m-MxdJ3WL._SL1500_.jpg"},
  {id:18,title:"The Secret",author:"Rhonda Byrne",price:380,isbn:"9781582701707",img:"https://m.media-amazon.com/images/I/71UwSHSZRnS._SL1500_.jpg"},
  {id:19,title:"Sapiens",author:"Yuval Noah Harari",price:600,isbn:"9780099590088",img:"https://m.media-amazon.com/images/I/713jIoMO3UL._SL1500_.jpg"},
  {id:20,title:"Mindset",author:"Carol Dweck",price:520,isbn:"9780345472328",img:"https://m.media-amazon.com/images/I/61FbTtYeQML._SL1000_.jpg"},
  {id:21,title:"The Monk Who Sold His Ferrari",author:"Robin Sharma",price:330,isbn:"9780061122408",img:"https://m.media-amazon.com/images/I/71aGtF1V5YL._SL1500_.jpg"},
  {id:22,title:"The 7 Habits of Highly Effective People",author:"Stephen R. Covey",price:470,isbn:"9780743269513",img:"https://m.media-amazon.com/images/I/71z8Lz8D5YL._SL1500_.jpg"},
  {id:23,title:"The Four Agreements",author:"Don Miguel Ruiz",price:350,isbn:"9781878424310",img:"https://m.media-amazon.com/images/I/81x5b6z6JrL._SL1500_.jpg"},
  {id:24,title:"Grit",author:"Angela Duckworth",price:410,isbn:"9781501111105",img:"https://m.media-amazon.com/images/I/71IueLMgUBL._SL1500_.jpg"},
  {id:25,title:"The Art of War",author:"Sun Tzu",price:290,isbn:"9781599869773",img:"https://m.media-amazon.com/images/I/71+6zLGx+NL._SL1500_.jpg"},
  {id:26,title:"The Subtle Art of Not Giving a F*ck",author:"Mark Manson",price:399,isbn:"9780062457714",img:"https://m.media-amazon.com/images/I/71mGpD+qQ7L._SL1500_.jpg"},
  {id:27,title:"Outliers",author:"Malcolm Gladwell",price:430,isbn:"9780316017930",img:"https://m.media-amazon.com/images/I/71xYt+k+G6L._SL1500_.jpg"},
  {id:28,title:"Thinking, Fast and Slow",author:"Daniel Kahneman",price:450,isbn:"9780374533557",img:"https://m.media-amazon.com/images/I/71Gz0g34UHL._SL1500_.jpg"},
  {id:29,title:"Man’s Search for Meaning",author:"Viktor E. Frankl",price:320,isbn:"9780807014295",img:"https://m.media-amazon.com/images/I/71pHk+ywD0L._SL1500_.jpg"},
  {id:30,title:"Meditations",author:"Marcus Aurelius",price:310,isbn:"9780140449334",img:"https://m.media-amazon.com/images/I/71f8pz3pJiL._SL1500_.jpg"}
  
];


let cart = JSON.parse(localStorage.getItem("cart")) || [];
const booksGrid = document.getElementById("booksGrid");

function renderBooks() {
  booksGrid.innerHTML = '';
  books.forEach((b,i)=>{
    booksGrid.innerHTML += `
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="book-card">
          <img src="${b.img}" alt="${b.title}">
          <div class="book-body">
            <div>
              <div class="book-title">${b.title}</div>
              <div class="book-author">By ${b.author}</div>
              <div class="book-price">₹${b.price}</div>
            </div>
            <div class="book-buttons">
              <a href="book_detail.php?id=${b.id}" class="btn btn-view"><i class="bi bi-eye"></i> View</a>
              <button class="btn btn-add" onclick="addToCart(${i})"><i class="bi bi-cart-plus"></i> Add</button>
            </div>
          </div>
        </div>
      </div>
    `;
  });
}
renderBooks();

function addToCart(i){
  const book = {...books[i], qty:1};
 
  cart.push({
    id: book.id,        // ✅ REAL books.id
    title: book.title,
    price: book.price,
    qty: 1
  });

  localStorage.setItem("cart", JSON.stringify(cart));

  let toastEl = document.getElementById('cartToast');
  let toast = new bootstrap.Toast(toastEl);
  toast.show();
}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'footer.php'?>
</body>
</html>
