<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us | Heaven Book Store</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
:root{
  --blue-dark:#0d47a1;
  --blue:#1565c0;
  --blue-light:#e3f2fd;
}

body{
  font-family: 'Segoe UI', sans-serif;
  background:#f7faff;
}

/* HERO */
.contact-hero{
  background:linear-gradient(135deg,var(--blue-dark),var(--blue));
  color:white;
   margin-top: 80px; 
  padding-top: 100px;
}

/* FORM GLASS */
.glass-form{
  background:rgba(255,255,255,0.92);
  backdrop-filter:blur(12px);
  border-radius:22px;
  box-shadow:0 18px 50px rgba(13,71,161,0.2);
}

/* INPUT */
.form-control{
  border-radius:14px;
  padding:13px;
  border:1px solid #d0e2ff;
}
.form-control:focus{
  border-color:var(--blue);
  box-shadow:0 0 0 0.2rem rgba(21,101,192,0.15);
}

/* INFO CARD */
.info-card{
  background:white;
  border-radius:20px;
  padding:28px;
  box-shadow:0 15px 35px rgba(13,71,161,0.12);
  transition:0.3s;
}
.info-card:hover{
  transform:translateY(-8px);
}

/* ICON */
.icon-circle{
  width:48px;
  height:48px;
  border-radius:50%;
  background:linear-gradient(135deg,var(--blue),#1e88e5);
  color:white;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:20px;
}
</style>
</head>

<body>

<?php include 'nav.php'; ?>

<!-- HERO -->
<section class="contact-hero text-center">
  <div class="container">
    <h1 class="fw-bold">Contact Heaven Book Store</h1>
    <p class="mt-2 fs-5">
      Books, orders ya suggestions — humse directly baat karein 📘
    </p>
  </div>
</section>

<!-- ALERTS -->
<div class="container mt-4">
<?php if(isset($_GET['success'])): ?>
  <div class="alert alert-success">✅ Message sent successfully. We’ll get back to you soon.</div>
<?php endif; ?>

<?php if(isset($_GET['error'])): ?>
  <div class="alert alert-danger">❌ Unable to send message. Please try again.</div>
<?php endif; ?>
</div>

<!-- CONTACT SECTION -->
<section class="py-5">
  <div class="container">
    <div class="row g-5 align-items-center">

      <!-- FORM -->
      <div class="col-lg-6">
        <div class="glass-form p-4 p-md-5">
          <h4 class="fw-bold text-primary mb-3">
            <i class="bi bi-chat-left-text"></i> Send Us a Message
          </h4>

          <form action="dashboards/save_contact.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" placeholder="Your full name" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" placeholder="Your email address" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea name="message" rows="5" class="form-control" placeholder="Type your message here..." required></textarea>
            </div>

            <button class="btn btn-primary px-4 py-2">
              <i class="bi bi-send"></i> Submit Message
            </button>
          </form>
        </div>
      </div>

      <!-- INFO -->
      <div class="col-lg-6">
        <div class="row g-4">

          <div class="col-12">
            <div class="info-card d-flex gap-3">
              <div class="icon-circle"><i class="bi bi-geo-alt"></i></div>
              <div>
                <h6 class="fw-bold">Store Address</h6>
                <p class="mb-0">Demo Street 12, Your City, India</p>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="info-card d-flex gap-3">
              <div class="icon-circle"><i class="bi bi-telephone"></i></div>
              <div>
                <h6 class="fw-bold">Phone Number</h6>
                <p class="mb-0">+91 98765 43210</p>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="info-card d-flex gap-3">
              <div class="icon-circle"><i class="bi bi-envelope"></i></div>
              <div>
                <h6 class="fw-bold">Email Support</h6>
                <p class="mb-0">support@heavenbooks.example</p>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- MAP -->
<section class="container mb-5">
  <iframe
    src="https://maps.google.com/maps?q=india&t=&z=5&ie=UTF8&iwloc=&output=embed"
    width="100%" height="320"
    style="border-radius:22px;border:0;box-shadow:0 15px 35px rgba(13,71,161,0.2);">
  </iframe>
</section>

<?php include 'footer.php'; ?>

</body>
</html>
