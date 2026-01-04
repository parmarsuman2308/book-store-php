<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviews — Admin Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { background:#eef1f7; font-family: 'Poppins', sans-serif; }

    .content { padding: 40px; }

    .review-card {
      border-radius: 18px;
      padding: 25px;
      background: #fff;
      box-shadow: 0 8px 25px rgba(0,0,0,0.08);
      transition: 0.25s;
      border: none;
      position: relative;
    }

    .review-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    }

    .user-avatar {
      width: 58px;
      height: 58px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #6c63ff;
    }

    .username { font-size: 17px; font-weight: 600; margin-bottom: 3px; }
    .book-name { color:#6c63ff; font-weight: 500; font-size: 15px; }

    .rating i {
      color: #febe10;
      font-size: 18px;
      margin-right: 2px;
      transition: 0.2s;
    }

    .review-card:hover .rating i {
      transform: scale(1.15);
    }

    .delete-btn {
      position: absolute;
      right: 15px;
      top: 15px;
      border-radius: 50%;
    }

    .review-text { font-size: 15px; margin-top: 10px; color: #555; line-height: 1.5; }
    .review-date { color: #777; font-size: 13px; margin-top: 6px; }

     body { background: #f2f6fc; font-family: 'Segoe UI'; }
    .content { margin-left: 250px; padding: 30px; }
    .card { border: none; border-radius: 12px; }
    .sidebar { width:250px; height:100vh; position:fixed; left:0; top:0; background:#1e293b; padding-top:20px; }
    .sidebar a { color:#cbd5e1; padding:12px 20px; display:block; text-decoration:none; }
    .sidebar a:hover { background:#334155; color:#fff; }
    .topbar { background:#fff; padding:15px 25px; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.05); }
    .badge { padding: 6px 10px; font-size: 12px; }
  </style>
</head>

<body>

<?php include 'dash_nav.php' ?>

<div class="content">
  <h2 class="fw-bold mb-4">Customer Reviews</h2>

  <div class="row g-4">

    <!-- 1 -->
    <div class="col-md-6 col-lg-4">
      <div class="review-card">
        <button class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>
        <div class="d-flex align-items-center">
          <img src="https://i.pravatar.cc/150?img=12" class="user-avatar me-3">
          <div>
            <div class="username">Rahul Sharma</div>
            <div class="book-name">The Last Kingdom</div>
          </div>
        </div>

        <div class="rating mt-2">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
        </div>

        <p class="review-text">Absolutely loved the storytelling. A masterpiece of historical fiction.</p>
        <div class="review-date">Reviewed on: 2025-02-01</div>
      </div>
    </div>

    <!-- 2 -->
    <div class="col-md-6 col-lg-4">
      <div class="review-card">
        <button class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>
        <div class="d-flex align-items-center">
          <img src="https://i.pravatar.cc/150?img=32" class="user-avatar me-3">
          <div>
            <div class="username">Aisha Khan</div>
            <div class="book-name">Deep Work</div>
          </div>
        </div>

        <div class="rating mt-2">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
        </div>

        <p class="review-text">Great insights for productivity. A few chapters felt repetitive.</p>
        <div class="review-date">Reviewed on: 2025-01-28</div>
      </div>
    </div>

    <!-- 3 -->
    <div class="col-md-6 col-lg-4">
      <div class="review-card">
        <button class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>
        <div class="d-flex align-items-center">
          <img src="https://i.pravatar.cc/150?img=14" class="user-avatar me-3">
          <div>
            <div class="username">Vikas Verma</div>
            <div class="book-name">Atomic Habits</div>
          </div>
        </div>

        <div class="rating mt-2">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
        </div>

        <p class="review-text">A truly life-changing book. Practical and effective techniques.</p>
        <div class="review-date">Reviewed on: 2025-01-20</div>
      </div>
    </div>

    <!-- 4 -->
    <div class="col-md-6 col-lg-4">
      <div class="review-card">
        <button class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>
        <div class="d-flex align-items-center">
          <img src="https://i.pravatar.cc/150?img=45" class="user-avatar me-3">
          <div>
            <div class="username">Neha Patel</div>
            <div class="book-name">Wings of Fire</div>
          </div>
        </div>

        <div class="rating mt-2">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
        </div>

        <p class="review-text">Inspirational and emotional. Must-read for students.</p>
        <div class="review-date">Reviewed on: 2025-01-15</div>
      </div>
    </div>

    <!-- 5 -->
    <div class="col-md-6 col-lg-4">
      <div class="review-card">
        <button class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>
        <div class="d-flex align-items-center">
          <img src="https://i.pravatar.cc/150?img=28" class="user-avatar me-3">
          <div>
            <div class="username">Amit Verma</div>
            <div class="book-name">Rich Dad Poor Dad</div>
          </div>
        </div>

        <div class="rating mt-2">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
        </div>

        <p class="review-text">Good financial concepts. Simple yet powerful lessons.</p>
        <div class="review-date">Reviewed on: 2025-01-10</div>
      </div>
    </div>

    <!-- 6 -->
    <div class="col-md-6 col-lg-4">
      <div class="review-card">
        <button class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>
        <div class="d-flex align-items-center">
          <img src="https://i.pravatar.cc/150?img=50" class="user-avatar me-3">
          <div>
            <div class="username">Simran Kaur</div>
            <div class="book-name">Alchemist</div>
          </div>
        </div>

        <div class="rating mt-2">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
        </div>

        <p class="review-text">Beautiful storytelling! A spiritual journey worth taking.</p>
        <div class="review-date">Reviewed on: 2025-01-08</div>
      </div>
    </div>

    <!-- 7 -->
    <div class="col-md-6 col-lg-4">
      <div class="review-card">
        <button class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>
        <div class="d-flex align-items-center">
          <img src="https://i.pravatar.cc/150?img=35" class="user-avatar me-3">
          <div>
            <div class="username">Rohan Dixit</div>
            <div class="book-name">Harry Potter</div>
          </div>
        </div>

        <div class="rating mt-2">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
        </div>

        <p class="review-text">Magical and adventurous. Perfect for all ages.</p>
        <div class="review-date">Reviewed on: 2025-01-05</div>
      </div>
    </div>

    <!-- 8 -->
    <div class="col-md-6 col-lg-4">
      <div class="review-card">
        <button class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>
        <div class="d-flex align-items-center">
          <img src="https://i.pravatar.cc/150?img=60" class="user-avatar me-3">
          <div>
            <div class="username">Yash Mehta</div>
            <div class="book-name">Think & Grow Rich</div>
          </div>
        </div>

        <div class="rating mt-2">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
        </div>

        <p class="review-text">Good but a bit outdated. Still helpful for self-improvement.</p>
        <div class="review-date">Reviewed on: 2025-01-04</div>
      </div>
    </div>

    <!-- 9 -->
    <div class="col-md-6 col-lg-4">
      <div class="review-card">
        <button class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>
        <div class="d-flex align-items-center">
          <img src="https://i.pravatar.cc/150?img=22" class="user-avatar me-3">
          <div>
            <div class="username">Priya Soni</div>
            <div class="book-name">Do It Today</div>
          </div>
        </div>

        <div class="rating mt-2">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
        </div>

        <p class="review-text">Practical steps that helped me improve my routine.</p>
        <div class="review-date">Reviewed on: 2025-01-02</div>
      </div>
    </div>

    <!-- 10 -->
    <div class="col-md-6 col-lg-4">
      <div class="review-card">
        <button class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>
        <div class="d-flex align-items-center">
          <img src="https://i.pravatar.cc/150?img=17" class="user-avatar me-3">
          <div>
            <div class="username">Manish Gupta</div>
            <div class="book-name">The Psychology of Money</div>
          </div>
        </div>

        <div class="rating mt-2">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
        </div>

        <p class="review-text">Amazing financial wisdom explained in simple language.</p>
        <div class="review-date">Reviewed on: 2025-01-01</div>
      </div>
    </div>

  </div>
</div>

</body>
</html>
