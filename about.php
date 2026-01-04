<!DOCTYPE html>
<html lang="hi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | Heaven Book Store</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body{
      background:#f8f9fa;
    }

    /* Hero */
    .hero{
      background:linear-gradient(135deg,#0d1b2a,#1b263b);
      color:#fff;
      padding:90px 0;
      text-align:center;
    }

    .section-title{
      font-weight:800;
      letter-spacing:.5px;
    }

    .section-sub{
      max-width:720px;
      margin:auto;
      color:#6c757d;
    }

    /* Cards */
    .feature-card{
      border-radius:16px;
      border:none;
      transition:.3s;
    }
    .feature-card:hover{
      transform:translateY(-6px);
      box-shadow:0 20px 40px rgba(0,0,0,.12);
    }

    /* Stats */
    .stats{
      background:#0d1b2a;
      color:#fff;
    }
    .stats h1{
      font-weight:800;
      color:#ffc107;
    }

    /* Testimonials */
    .testimonial{
      border-left:5px solid #2595c9;
      background:#fff;
    }

    /* Timeline */
    .timeline li{
      position:relative;
      padding-left:25px;
    }
    .timeline li::before{
      content:"";
      width:10px;
      height:10px;
      background:#2595c9;
      border-radius:50%;
      position:absolute;
      left:0;
      top:6px;
    }
  </style>
</head>
<body>

<?php include 'nav.php'; ?>

<!-- HERO -->
<section class="hero">
  <div class="container">
    <h1 class="display-5 fw-bold">
      About <span class="text-warning">Heaven Book Store</span>
    </h1>
    <p class="lead mt-3 opacity-75">
      A modern online bookstore crafted for passionate readers.
    </p>
  </div>
</section>

<!-- ABOUT -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="section-title mb-3">
      Who <span class="text-primary">We Are</span>
    </h2>
    <p class="section-sub">
      Heaven Book Store is a digital bookstore designed to deliver a smooth,
      reliable and enjoyable reading & shopping experience.
      We bring books, technology and simplicity together.
    </p>

    <div class="row g-4 mt-4">
      <div class="col-md-4">
        <div class="card feature-card p-4 h-100">
          <i class="bi bi-bullseye display-5 text-primary"></i>
          <h5 class="fw-bold mt-3">Our Mission</h5>
          <p class="text-muted small">
            To make reading accessible, affordable and enjoyable for everyone.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card feature-card p-4 h-100">
          <i class="bi bi-stars display-5 text-success"></i>
          <h5 class="fw-bold mt-3">What We Offer</h5>
          <p class="text-muted small">
            Smart search, clean UI, detailed books & easy checkout.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card feature-card p-4 h-100">
          <i class="bi bi-rocket-takeoff display-5 text-warning"></i>
          <h5 class="fw-bold mt-3">Future Vision</h5>
          <p class="text-muted small">
            Payments, reviews, wishlists & mobile app coming soon.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- WHY CHOOSE US -->
<section class="py-5">
  <div class="container text-center">
    <h2 class="section-title mb-2">
      Why <span class="text-primary">Choose Us</span>
    </h2>
    <p class="section-sub mb-4">
      Trusted by readers who love quality & simplicity.
    </p>

    <div class="row g-4">
      <div class="col-md-3">
        <div class="card feature-card p-4">
          <i class="bi bi-book display-6 text-danger"></i>
          <h6 class="fw-bold mt-2">Wide Collection</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card feature-card p-4">
          <i class="bi bi-search display-6 text-primary"></i>
          <h6 class="fw-bold mt-2">Smart Search</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card feature-card p-4">
          <i class="bi bi-cart-check display-6 text-success"></i>
          <h6 class="fw-bold mt-2">Easy Checkout</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card feature-card p-4">
          <i class="bi bi-shield-lock display-6 text-warning"></i>
          <h6 class="fw-bold mt-2">Secure Platform</h6>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="stats py-5">
  <div class="container text-center">
    <div class="row g-4">
      <div class="col-md-3">
        <h1>10K+</h1><p>Books</p>
      </div>
      <div class="col-md-3">
        <h1>5K+</h1><p>Readers</p>
      </div>
      <div class="col-md-3">
        <h1>200+</h1><p>Daily Orders</p>
      </div>
      <div class="col-md-3">
        <h1>24/7</h1><p>Support</p>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title text-center mb-4">
      Reader <span class="text-primary">Testimonials</span>
    </h2>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card testimonial p-4 h-100 shadow-sm">
          <p class="fst-italic text-muted">
            "Super clean UI & smooth book browsing experience."
          </p>
          <strong>— Rohan Mehta</strong>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card testimonial p-4 h-100 shadow-sm">
          <p class="fst-italic text-muted">
            "Feels like a premium online bookstore."
          </p>
          <strong>— Priya Sharma</strong>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card testimonial p-4 h-100 shadow-sm">
          <p class="fst-italic text-muted">
            "Perfect for book lovers & learners."
          </p>
          <strong>— Aditya Verma</strong>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- JOURNEY -->
<section class="py-5">
  <div class="container">
    <h2 class="section-title text-center mb-4">
      Our <span class="text-primary">Journey</span>
    </h2>

    <ul class="timeline list-unstyled mx-auto" style="max-width:600px;">
      <li class="mb-4">
        <h6 class="fw-bold">2021 – Idea Born</h6>
        <p class="text-muted small">Concept of a modern bookstore created.</p>
      </li>
      <li class="mb-4">
        <h6 class="fw-bold">2022 – Platform Developed</h6>
        <p class="text-muted small">UI & book management system built.</p>
      </li>
      <li class="mb-4">
        <h6 class="fw-bold">2024 – Live Store</h6>
        <p class="text-muted small">Cart, checkout & filters added.</p>
      </li>
      <li>
        <h6 class="fw-bold">2025 – Expansion</h6>
        <p class="text-muted small">Payments, app & admin tools planned.</p>
      </li>
    </ul>
  </div>
</section>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
