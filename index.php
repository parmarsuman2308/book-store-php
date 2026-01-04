<!DOCTYPE html>
<html lang="hi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Heaven Book Store - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background: #f8f9fc; font-family: 'Segoe UI', sans-serif; }
    h1,h2,h3 { letter-spacing: -0.5px; }

    .text-gradient { background: linear-gradient(90deg,#4f46e5,#06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }

    /* HERO */
    .hero-section { background: linear-gradient(180deg,#ffffff,#f3f4ff); border-radius: 28px; padding: 60px 30px; }
    .hero-img { transition: 0.4s ease; }
    .hero-img:hover { transform: scale(1.03); }
    .search-box { border-radius: 40px; overflow: hidden; }

    .glow-btn { box-shadow: 0 10px 25px rgba(79,70,229,.25); transition: 0.3s; }
    .glow-btn:hover { transform: translateY(-2px); }

    /* STATS */
    .stats-box { background: #fff; border-radius: 18px; padding: 22px; transition: .3s; text-align:center; }
    .stats-box:hover { transform: translateY(-6px); box-shadow: 0 16px 30px rgba(0,0,0,.12); }

    /* FEATURED COLLECTIONS */
    .enhanced-collection { transition: 0.4s; border-radius: 18px; padding: 30px; color: #fff; }
    .enhanced-collection:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,0.15); }

    /* FEATURES */
    .pro-feature { background: #fff; transition: 0.35s; padding: 30px; border-radius: 20px; }
    .pro-feature:hover { transform: translateY(-6px); box-shadow: 0 18px 35px rgba(0,0,0,.12); }
    .feature-icon { width: 70px; height: 70px; margin:auto; border-radius:50%; background:#eef2ff; display:flex; align-items:center; justify-content:center; font-size:28px; }

    /* CATEGORIES */
    .category-pill { background: #eef2ff; padding: 10px 16px; border-radius: 50px; font-size: 14px; cursor:pointer; transition: .3s; text-align:center; }
    .category-pill:hover { background: #4f46e5; color: #fff; }

    /* TOP PICKS CARDS */
    .top-card { border-radius: 16px; transition: 0.3s; }
    .top-card:hover { transform: translateY(-6px); box-shadow: 0 15px 30px rgba(0,0,0,.12); }

    /* TESTIMONIALS */
    .testimonial-card { background:#fff; border-radius:18px; padding:22px; transition:.3s; }
    .testimonial-card:hover { transform: translateY(-6px); }

    /* EVENTS */
    .event-card { border-radius:18px; transition:.3s; }
    .event-card img { border-radius:12px; transition:.3s; }
    .event-card:hover img { transform: scale(1.05); }

    /* NEWSLETTER */
    .newsletter { background: linear-gradient(135deg,#eef2ff,#f0fdfa); border-radius:20px; padding:40px 30px; text-align:center; }
    .newsletter input { border-radius: 30px 0 0 30px; border:none; padding:12px; flex:1; outline:none; }
    .newsletter button { border-radius:0 30px 30px 0; }

    /* ANIMATIONS */
    * { scroll-behavior: smooth; }
    section { animation: fadeUp .7s ease both; }
    @keyframes fadeUp { from { opacity:0; transform: translateY(25px);} to { opacity:1; transform: translateY(0); } }

  </style>
</head>
<body>

<?php include 'nav.php'; ?>

<div class="container py-5">

  <!-- HERO -->
  <section class="hero-section mb-5">
    <div class="row align-items-center">
      <div class="col-md-7">
        <h1 class="display-4 fw-bold mb-3">Discover Your Next <br> <span class="text-gradient">Favorite Book</span></h1>
        <p class="lead text-muted mb-4">Heaven Book Store mein aapko milti hain hazaaro books — fiction, study, motivation, novels & more. Fast delivery, real checkout system aur smooth shopping experience ek hi jagah.</p>
        <div class="input-group mb-4 search-box shadow-sm">
          <input type="text" class="form-control form-control-lg border-0" placeholder="Search books, authors, ISBN...">
          <button class="btn btn-primary btn-lg"><i class="bi bi-search"></i></button>
        </div>
        <div class="d-flex gap-3 mt-2">
          <a href="books.php" class="btn btn-lg btn-primary glow-btn">Shop Now</a>
          <a href="about.php" class="btn btn-lg btn-outline-dark">About Us</a>
        </div>
      </div>
      <div class="col-md-5 d-none d-md-block text-center">
        <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=800&auto=format&fit=crop" alt="books" class="img-fluid hero-img shadow-lg rounded-4">
      </div>
    </div>
  </section>

  <!-- STATS -->
  <div class="row text-center mb-5 g-3">
    <div class="col-md-4"><div class="stats-box"><h2 class="fw-bold text-gradient">20K+</h2><p class="text-muted small mb-0">Books Available</p></div></div>
    <div class="col-md-4"><div class="stats-box"><h2 class="fw-bold text-gradient">5K+</h2><p class="text-muted small mb-0">Happy Readers</p></div></div>
    <div class="col-md-4"><div class="stats-box"><h2 class="fw-bold text-gradient">1.2K+</h2><p class="text-muted small mb-0">Top Authors Listed</p></div></div>
  </div>

  <!-- FEATURED COLLECTIONS -->
  <div class="mb-5">
    <h2 class="fw-bold mb-4 text-gradient">Featured Collections ✨</h2>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="enhanced-collection" style="background:linear-gradient(135deg, #4a00e0, #8e2de2);">
          <h3 class="fw-bold">🔥 Bestsellers</h3>
          <p>Most loved, most purchased & highly rated collection curated for readers like you.</p>
          <a href="books.php" class="btn btn-light btn-sm rounded-pill px-3">Explore</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="enhanced-collection" style="background:linear-gradient(135deg, #ff6a00, #ee0979);">
          <h3 class="fw-bold">🌟 New Arrivals</h3>
          <p>Fresh releases from trending authors — grab them before they’re sold out!</p>
          <a href="books.php" class="btn btn-light btn-sm rounded-pill px-3">Explore</a>
        </div>
      </div>
    </div>
  </div>

  <!-- FEATURES -->
  <div class="row g-4 mb-5">
    <div class="col-md-4">
      <div class="pro-feature text-center">
        <div class="feature-icon"><i class="bi bi-truck"></i></div>
        <h5 class="fw-bold mt-3">Fast Delivery</h5>
        <p class="small text-muted">Get your books delivered at lightning speed with live tracking.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="pro-feature text-center">
        <div class="feature-icon"><i class="bi bi-shield-check"></i></div>
        <h5 class="fw-bold mt-3">Secure Checkout</h5>
        <p class="small text-muted">End-to-end encrypted checkout for hassle-free payments.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="pro-feature text-center">
        <div class="feature-icon"><i class="bi bi-book-half"></i></div>
        <h5 class="fw-bold mt-3">Premium Books</h5>
        <p class="small text-muted">Handpicked & verified best-quality books for true readers.</p>
      </div>
    </div>
  </div>

  <!-- CATEGORIES + TOP PICKS -->
  <div class="row mb-5">
    <div class="col-md-3">
      <h5 class="fw-bold mb-3">Browse Categories</h5>
      <div id="categoryList" class="d-flex flex-column gap-3">
        <div class="category-pill">Fiction</div>
        <div class="category-pill">Motivation</div>
        <div class="category-pill">Study</div>
        <div class="category-pill">Novels</div>
      </div>
    </div>
    <div class="col-md-9">
      <h5 class="fw-bold mb-3">⭐ Top Picks</h5>
      <div class="row g-3">
        <div class="col-md-4"><div class="top-card card p-3 shadow-sm rounded"><img src="https://picsum.photos/200/250?book1" class="rounded mb-2 w-100"><h6 class="fw-bold">Book 1</h6></div></div>
        <div class="col-md-4"><div class="top-card card p-3 shadow-sm rounded"><img src="https://picsum.photos/200/250?book2" class="rounded mb-2 w-100"><h6 class="fw-bold">Book 2</h6></div></div>
        <div class="col-md-4"><div class="top-card card p-3 shadow-sm rounded"><img src="https://picsum.photos/200/250?book3" class="rounded mb-2 w-100"><h6 class="fw-bold">Book 3</h6></div></div>
      </div>
    </div>
  </div>

  <!-- TESTIMONIALS -->
  <div class="mb-5">
    <h3 class="fw-bold mb-4 text-center">💬 What Readers Say</h3>
    <div class="row g-4">
      <div class="col-md-4"><div class="testimonial-card"><p class="text-muted">"Amazing book quality and super fast delivery!"</p><h6 class="fw-bold text-primary mt-3">— Riya Sharma</h6></div></div>
      <div class="col-md-4"><div class="testimonial-card"><p class="text-muted">"Best bookstore experience! Beautiful UI and easy checkout."</p><h6 class="fw-bold text-primary mt-3">— Amit Verma</h6></div></div>
      <div class="col-md-4"><div class="testimonial-card"><p class="text-muted">"Great collection and helpful categories!"</p><h6 class="fw-bold text-primary mt-3">— Neha Gupta</h6></div></div>
    </div>
  </div>

  <!-- NEWSLETTER -->
  <div class="newsletter mb-5">
    <h3 class="fw-bold">📬 Join Our Newsletter</h3>
    <p class="small text-muted">Get updates on new books & offers weekly.</p>
    <div class="d-flex justify-content-center mt-3" style="max-width:500px;margin:auto;">
      <input type="email" placeholder="Enter your email">
      <button class="btn btn-primary">Subscribe</button>
    </div>
  </div>

</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
