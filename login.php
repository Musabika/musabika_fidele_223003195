<?php
session_start();
$page = 'login';

$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    if ($email === '') {
        $error = 'Please enter your email address to continue.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $_SESSION['customer_email'] = strtolower($email);
        header('Location: customer_dashboard.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login - Royal Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php" class="<?php echo ($page == 'home') ? 'active' : ''; ?>">Home</a></li>
            <li><a href="about.php" class="<?php echo ($page == 'about') ? 'active' : ''; ?>">About Us</a></li>
            <li><a href="menu.php" class="<?php echo ($page == 'menu') ? 'active' : ''; ?>">Menu</a></li>
            <li><a href="gallery.php" class="<?php echo ($page == 'gallery') ? 'active' : ''; ?>">Gallery</a></li>
            <li><a href="order.php" class="<?php echo ($page == 'order') ? 'active' : ''; ?>">Order</a></li>
            <li><a href="contactus.php" class="<?php echo ($page == 'contact') ? 'active' : ''; ?>">Contact Us</a></li>
            <li><a href="login.php" class="nav-button">Login</a></li>
        </ul>
    </nav>

    <div class="hero">
        <h1>Customer Login</h1>
        <p>Access your dashboard to review orders, track delivery, and place new requests.</p>
    </div>

    <div class="container">
        <div class="content auth-panel">
            <?php if ($message): ?>
                <div class="alert alert-success"><?php echo $message; ?></div>
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="auth-card">
                <h2>Continue with your email</h2>
                <p>Enter the email address you used for your order so we can show your customer panel.</p>
                <form method="POST" class="auth-form">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Go to Dashboard</button>
                </form>
                <p class="auth-note">If you have not placed an order yet, you can still login and place a new order from your dashboard.</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Royal Hotel. All rights reserved.</p>
    </footer>
</body>
</html>
