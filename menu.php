<?php
$page = 'menu';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Royal Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="index.php" class="<?php echo ($page == 'home') ? 'active' : ''; ?>">Home</a></li>
            <li><a href="about.php" class="<?php echo ($page == 'about') ? 'active' : ''; ?>">About Us</a></li>
            <li><a href="menu.php" class="<?php echo ($page == 'menu') ? 'active' : ''; ?>">Menu</a></li>
            <li><a href="gallery.php" class="<?php echo ($page == 'gallery') ? 'active' : ''; ?>">Gallery</a></li>
            <li><a href="order.php" class="<?php echo ($page == 'order') ? 'active' : ''; ?>">Order</a></li>
            <li><a href="contactus.php" class="<?php echo ($page == 'contact') ? 'active' : ''; ?>">Contact Us</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Our Exclusive Menu</h1>
        <p>Featuring Premium Dishes & Beverages</p>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="content">
            <h2> Menu Items</h2>
            
            <table class="menu-table">
                <thead>
                    <tr>
                        <th>Item #</th>
                        <th>Dish Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th class="price">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fish Dishes -->
                    <tr>
                        <td>1</td>
                        <td>Grilled Salmon Fillet</td>
                        <td> Fish</td>
                        <td>Fresh Atlantic salmon with lemon butter sauce and seasonal vegetables</td>
                        <td class="price">$28.99</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Fried Crispy Fish</td>
                        <td> Fish</td>
                        <td>Golden-fried fish served with tartar sauce and french fries</td>
                        <td class="price">$18.99</td>
                    </tr>
                   
                   
        
                    
                </tbody>
            </table>

            <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 10px; text-align: center;">
                <h3 style="color: #667eea;">Ready to Order?</h3>
                <p>Explore our gallery for mouthwatering photos or proceed directly to place your order!</p>
                <a href="order.php" style="display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
                color: white; padding: 0.8rem 2rem; border-radius: 5px; text-decoration: none; font-weight: bold; margin-top: 1rem;">
                    Order Now
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Royal Hotel. All rights reserved. | Contact: info@royalhotel.com | Phone: +1-234-567-8900</p>
    </footer>
</body>
</html>
