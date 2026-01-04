<nav class="navbar navbar-expand-lg fixed-top custom-navbar" id="mainNavbar">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
      <div class="brand-icon">
        <svg width="34" height="34" viewBox="0 0 24 24" fill="none">
          <rect width="24" height="24" rx="6" fill="#2595c9"/>
          <path d="M7 12h10M7 8h10M7 16h6"
                stroke="#fff" stroke-width="1.4" stroke-linecap="round"/>
        </svg>
      </div>
      <div class="d-none d-md-block">
        <div class="brand-title">Heaven Book Store</div>
        <div class="brand-tagline">Read. Collect. Love.</div>
      </div>
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navMenu">

      <!-- Links -->
      <ul class="navbar-nav ms-auto align-items-center me-3">
        <li class="nav-item"><a class="nav-link custom-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link custom-link" href="books.php">Books</a></li>
        <li class="nav-item"><a class="nav-link custom-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link custom-link" href="contact.php">Contact</a></li>

       

      <!-- Search -->
      <form class="search-area me-3" onsubmit="event.preventDefault(); doSearch();">
        <input id="globalSearch" class="search-input" placeholder="Search books, author, ISBN">
        <button class="search-btn" type="button" onclick="doSearch()">🔍</button>
      </form>

      <!-- Cart -->
      <a href="cart.php" class="cart-btn position-relative">
        🛒
        <span id="cartCount" class="cart-badge">2</span>
      </a>

    </div>
  </div>
</nav>
<style>
/* Navbar Base */
.custom-navbar {
  background: rgba(255,255,255,0.85);
  backdrop-filter: blur(14px);
  border-bottom: 1px solid rgba(0,0,0,0.05);
  transition: all 0.3s ease;
  padding: 12px 0;
  z-index: 999;
}

/* On Scroll */
.custom-navbar.scrolled {
  padding: 6px 0;
  box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

/* Brand */
.brand-icon {
  background: linear-gradient(135deg,#2595c9,#6fd3ff);
  padding: 4px;
  border-radius: 10px;
}
.brand-title {
  font-weight: 700;
  font-size: 18px;
}
.brand-tagline {
  font-size: 12px;
  color: #6c757d;
}

/* Nav Links */
.custom-link {
  font-weight: 500;
  margin: 0 8px;
  position: relative;
  color: #333;
}
.custom-link::after {
  content: "";
  position: absolute;
  width: 0;
  height: 2px;
  background: linear-gradient(90deg,#2595c9,#6fd3ff);
  left: 50%;
  bottom: -6px;
  transition: 0.3s;
}
.custom-link:hover,
.custom-link.active {
  color: #2595c9;
}
.custom-link:hover::after,
.custom-link.active::after {
  width: 100%;
  left: 0;
}

/* Dropdown */
.premium-dropdown {
  border-radius: 14px;
  border: none;
  padding: 10px;
  box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}
.premium-dropdown .dropdown-item {
  border-radius: 8px;
  padding: 8px 12px;
}
.premium-dropdown .dropdown-item:hover {
  background: #f1f8ff;
}

/* Search */
.search-area {
  display: flex;
  align-items: center;
  background: #f1f3f6;
  border-radius: 30px;
  padding: 4px;
}
.search-input {
  border: none;
  outline: none;
  background: transparent;
  padding: 6px 14px;
  width: 180px;
}
.search-btn {
  border-radius: 50%;
  background: #2595c9;
  color: #fff;
  border: none;
  padding: 6px 12px;
}

/* Cart */
.cart-btn {
  font-size: 22px;
  margin-left: 12px;
  color: #333;
}
.cart-btn:hover {
  color: #2595c9;
}
.cart-badge {
  position: absolute;
  top: -6px;
  right: -10px;
  background: linear-gradient(135deg,#28a745,#6aff9f);
  color: #fff;
  font-size: 11px;
  padding: 3px 7px;
  border-radius: 50%;
  animation: pulse 1.5s infinite;
}

@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.15); }
  100% { transform: scale(1); }
}

/* Account Avatar */
.user-avatar {
  position: relative;
}
.user-avatar img {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #2595c9;
}

/* Online Dot */
.status-dot {
  position: absolute;
  bottom: 2px;
  right: 2px;
  width: 9px;
  height: 9px;
  background: #28a745;
  border: 2px solid #fff;
  border-radius: 50%;
}

/* Name */
.user-name {
  font-size: 14px;
  font-weight: 600;
  line-height: 1;
}
.user-role {
  font-size: 11px;
  color: #6c757d;
}

/* Dropdown */
.account-menu {
  width: 260px;
  border-radius: 16px;
  border: none;
  padding: 8px;
  box-shadow: 0 20px 45px rgba(0,0,0,0.18);
}

/* Header */
.account-header {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px;
}
.account-header img {
  width: 44px;
  height: 44px;
  border-radius: 50%;
}
.account-header small {
  display: block;
  color: #6c757d;
  font-size: 12px;
}

/* Dropdown Items */
.account-menu .dropdown-item {
  border-radius: 10px;
  padding: 10px 12px;
  font-size: 14px;
}
.account-menu .dropdown-item:hover {
  background: #f1f8ff;
}

</style>