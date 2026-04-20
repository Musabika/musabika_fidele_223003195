<?php
session_start();
$page = 'home';
$loggedIn = !empty($_SESSION['customer_email']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Hotel - Welcome</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="../index.php" class="<?php echo ($page == 'home') ? 'active' : ''; ?>">Home</a></li>
            <li><a href="../about.php" class="<?php echo ($page == 'about') ? 'active' : ''; ?>">About Us</a></li>
            <li><a href="../menu.php" class="<?php echo ($page == 'menu') ? 'active' : ''; ?>">Menu</a></li>
            <li><a href="../gallery.php" class="<?php echo ($page == 'gallery') ? 'active' : ''; ?>">Gallery</a></li>
            <li><a href="../order.php" class="<?php echo ($page == 'order') ? 'active' : ''; ?>">Order</a></li>
            <li><a href="../contactus.php" class="<?php echo ($page == 'contact') ? 'active' : ''; ?>">Contact Us</a></li>
            <?php if ($loggedIn): ?>
                <li><a href="../customer_dashboard.php" class="<?php echo ($page == 'dashboard') ? 'active' : ''; ?>">Dashboard</a></li>
                <li><a href="../logout.php" class="nav-button">Logout</a></li>
            <?php else: ?>
                <li><a href="../login.php" class="nav-button">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-inner">
            <div class="hero-copy">
                <p class="hero-label">Royal Hotel Collection</p>
                <h1>Exclusive dining and effortless online service</h1>
                <p class="hero-text">Enjoy seasonal menus crafted by expert chefs, elegant ambiance, and a seamless ordering experience for every visit.</p>
                <div class="hero-actions">
                    <a href="../menu.php" class="btn btn-primary">Explore Menu</a>
                    <a href="../order.php" class="btn btn-secondary">Order Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Homepage Highlights -->
    <div class="container">
        <div class="feature-cards">
            <div class="feature-card">
                <h3>Seasonal Ingredients</h3>
                <p>Every dish is made with fresh, locally sourced ingredients selected for superior flavor and quality.</p>
            </div>
            <div class="feature-card">
                <h3>Chef-Crafted Menus</h3>
                <p>Our culinary team designs elegant plates that balance tradition, innovation, and unforgettable taste.</p>
            </div>
            <div class="feature-card">
                <h3>Fast Reservations</h3>
                <p>Browse our menu, choose your favorites, and complete your order or reservation quickly online.</p>
            </div>
        </div>

        <section class="split-section">
            <div class="split-text">
                <h2>What makes Royal Hotel different?</h2>
                <p>We combine warm hospitality with refined dining, so every meal becomes a special occasion. Our dining spaces are designed for comfort, our service is attentive, and our culinary experience is crafted for modern guests.</p>
                <ul>
                    <li><strong>Creative menus</strong> tuned to the season</li>
                    <li><strong>Thoughtful presentation</strong> that delights every guest</li>
                    <li><strong>Trusted reliability</strong> for dine-in and online ordering</li>
                </ul>
            </div>
            <div class="split-image">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600&h=400&fit=crop" alt="Elegant dining experience at Royal Hotel">    
                
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Royal Hotel. All rights reserved. 
    </footer>
</body>
</html>