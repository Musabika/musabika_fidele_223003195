<?php
session_start();
// $name;$email;$phone;$menu;$address;$date = "";

$conn = mysqli_connect("localhost","root","","hotel_db") or die("error to connect database");

$page = 'order';
$loggedIn = !empty($_SESSION['customer_email']);
$customerEmail = $_SESSION['customer_email'] ?? '';

$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
 

if (isset($_POST["order"])) {
    
$name = $_POST["fullname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$menu = $_POST["menu"];
$address = $_POST["address"];
$date = $_POST["dates"];


$insert_order = mysqli_query($conn,"INSERT INTO ordered VALUES('','$name','$email','$phone','$menu','$address','$date')");
if ($insert_order) {
    $message = "your order is recorded well see in your account";
}
else{
    $error = "there is error occured in recording of your order";
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order - Royal Hotel</title>
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
            <?php if ($loggedIn): ?>
                <li><a href="customer_dashboard.php" class="<?php echo ($page == 'dashboard') ? 'active' : ''; ?>">Dashboard</a></li>
                <li><a href="logout.php" class="nav-button">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php" class="nav-button">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="hero">
        <h1>Place Your Order</h1>
        <p>Quick, Easy & Delicious</p>
        <?php if ($loggedIn): ?>
            <p class="hero-subtext">Logged in as <?php echo htmlspecialchars($customerEmail); ?>. <a href="customer_dashboard.php" style="color: white; text-decoration: underline;">View your dashboard</a>.</p>
        <?php endif; ?>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="content">
            <h2> Order Form</h2>

            <?php if ($message): ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert alert-error">
                    ✗ <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <div class="form-container">
                <form method="POST"  onsubmit="return validateForm()">
                    
                    <div class="form-group">
                        <label for="fullname">Full Name *</label>
                        <input type="text" id="fullname" name="fullname" required placeholder="Enter your full name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email" value="<?php echo htmlspecialchars($customerEmail); ?>">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number">
                    </div>

                    <div class="form-group">
                        <label for="menu">Select Menu *</label>
                        <select id="menu" name="menu" required onchange="updatePrice()">
                            <option value="">-- Select a Menu Item --</option>
                            <optgroup label=" Fish Dishes">
                                <option value="Grilled Salmon Fillet - $28.99">Grilled Salmon Fillet - $28.99</option>
                            </optgroup>
                            <optgroup label=" Fresh Juices">
                                <option value="Fresh Orange Juice - $4.99">Fresh Orange Juice - $4.99</option>
                            <optgroup label=" Drinks">
                                <option value="Iced Coffee - $4.49">Iced Coffee - $4.49</option>
                            </optgroup>
                            <optgroup label=" Other Items">
                                <option value="Grilled Chicken Breast - $22.99">Grilled Chicken Breast - $22.99</option>
                            </optgroup>
                        </select>
                    </div>

                  
                    <div class="form-group">
                        <label for="address"> Address *</label>
                        <input type="text" id="address" name="address" required placeholder="Enter your full delivery address">
                    </div>

                    <div class="form-group">
                        <label for="date">Date *</label>
                        <input type="date" id="date" name="dates" required>
                    </div>


                    <button type="submit" name = "order"> Place Order</button>
                </form>

                <p style="text-align: center; margin-top: 1.5rem; color: #666; font-size: 0.95rem;">
                    * Required fields. Your order will be confirmed via email.
                </p>
            </div>

            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 2rem; 
            border-radius: 10px; margin-top: 2rem; text-align: center;">
                <h3 style="color: white; border: none; margin-top: 0;">Need to Browse More?</h3>
                <p>Explore our full menu and gallery for more options.</p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="menu.php" style="background: white; color: #667eea; padding: 0.8rem 1.5rem; 
                    border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block;">
                        View Menu
                    </a>
                    <a href="gallery.php" style="background: white; color: #667eea; padding: 0.8rem 1.5rem; 
                    border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block;">
                        View Gallery
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Royal Hotel. All rights reserved. </p>
    </footer>

    
</body>
</html>
