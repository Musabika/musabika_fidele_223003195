<?php
session_start();
$page = 'dashboard';

if (empty($_SESSION['customer_email'])) {
    header('Location: login.php?message=' . urlencode('Please login first to access your customer dashboard.'));
    exit;
}

$email = $_SESSION['customer_email'];
$conn = mysqli_connect('localhost', 'root', '', 'hotel_db') or die('error to connect database');
$conn->set_charset('utf8');

$query = "SELECT * FROM ordered WHERE email = '" . mysqli_real_escape_string($conn, $email) . "' ORDER BY id DESC";
$result = mysqli_query($conn, $query);
$orders = [];
while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}
$orderCount = count($orders);
$recentOrder = $orderCount ? $orders[0] : null;
$customerName = $recentOrder['full_name'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - Royal Hotel</title>
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
            <li><a href="customer_dashboard.php" class="active">Dashboard</a></li>
            <li><a href="logout.php" class="nav-button">Logout</a></li>
        </ul>
    </nav>

    <div class="hero">
        <h1>Customer Dashboard</h1>
        <p>Welcome back<?php echo $customerName ? ', ' . htmlspecialchars($customerName) : ''; ?>. Here is your latest order information.</p>
    </div>

    <div class="container dashboard-container">
        <div class="dashboard-grid">
            <div class="card-grid">
                <div class="card">
                    <h3>Total Orders</h3>
                    <p><?php echo $orderCount; ?></p>
                </div>
                <div class="card">
                    <h3>Latest Order</h3>
                    <p><?php echo $recentOrder ? htmlspecialchars($recentOrder['menu']) : 'No orders yet'; ?></p>
                </div>
                <div class="card">
                    <h3>Account Email</h3>
                    <p><?php echo htmlspecialchars($email); ?></p>
                </div>
            </div>

            <div class="dashboard-panel">
                <div class="dashboard-panel-header">
                    <div>
                        <h2>Order History</h2>
                        <p>All orders placed with <?php echo htmlspecialchars($email); ?> are listed here.</p>
                    </div>
                    <a href="order.php" class="btn btn-secondary">Place New Order</a>
                </div>

                <?php if ($orderCount > 0): ?>
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Item</th>
                                <th>Delivery Address</th>
                                <th>Date</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $index => $order): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo htmlspecialchars($order['menu']); ?></td>
                                    <td><?php echo htmlspecialchars($order['address']); ?></td>
                                    <td><?php echo htmlspecialchars($order['dates']); ?></td>
                                    <td><?php echo htmlspecialchars($order['phone']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-state">
                        <h3>No orders found yet.</h3>
                        <p>Once you place an order, it will appear here immediately.</p>
                        <a href="order.php" class="btn btn-primary">Start Your First Order</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Royal Hotel. All rights reserved.</p>
    </footer>
</body>
</html>
