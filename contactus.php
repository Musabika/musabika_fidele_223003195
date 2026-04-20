<?php
session_start();

$conn = mysqli_connect("localhost","root","","hotel_db") or die("error to connect database");

$page = 'contact';
$loggedIn = !empty($_SESSION['customer_email']);

$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';


if (isset($_POST["contact"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

$contact_message = mysqli_query($conn,"INSERT INTO contact VALUES('','$name','$email','$phone','$subject','$message')");
if ($contact_message) {
    $message = "your message received well!!";
}
else{
    $error = "there is error occured. please try again".mysqli_error($conn);
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Royal Hotel</title>
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
            <?php if ($loggedIn): ?>
                <li><a href="customer_dashboard.php" class="<?php echo ($page == 'dashboard') ? 'active' : ''; ?>">Dashboard</a></li>
                <li><a href="logout.php" class="nav-button">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php" class="nav-button">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Contact Royal Hotel</h1>
        <p>Get in Touch with Us</p>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="content">
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
            <h2>Contact Information</h2>

            <div class="contact-grid">
                <div class="contact-item">
                    <h3>Phone</h3>
                    <h3>+25 0788 236 249>
                    <p>Mon-Fri: 9:00 AM - 10:00 PM</p>
                    <p>Sat-Sun: 10:00 AM - 11:00 PM</p>
                </div>

                <div class="contact-item">
                    <h3>Address</h3>
                    <p>ss1 butare</p>
                    <p>huye District</p>
                    <p>mukoni center</p>
                </div>

                <div class="contact-item">
                    <h3>Hours</h3>
                    <p><strong>Dining Room:</strong></p>
                    <p>Breakfast: 7:00 AM - 11:00 AM</p>
                    <p>Lunch: 11:00 AM - 3:00 PM</p>
                    <p>Dinner: 5:00 PM - 10:00 PM</p>
                </div>

                <div class="contact-item">
                    <h3>Email</h3>
                    <p>info@royalhotel.com</p>
                    <p>reservations@royalhotel.com</p>
                    <p>catering@royalhotel.com</p>
                </div>

                <div class="contact-item">
                    <h3>Website</h3>
                    <p>www.royalhotel.com</p>
                    <p>Follow us on social media</p>
                    <p>@RoyalHotelNY</p>
                </div>

                <div class="contact-item">
                    <h3>Reservations</h3>
                    <p>Call for reservations</p>
                    <p>Walk-ins welcome</p>
                    <p>Private dining available</p>
                </div>
            </div>

            <div class="contact-form-section">
                <h2>Send us a Message</h2>
                <form id="contactForm" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <select id="subject" name="subject" required>
                            <option value="">Select a subject</option>
                            <option value="reservation">Table Reservation</option>
                            <option value="catering">Catering Inquiry</option>
                            <option value="feedback">Feedback</option>
                            <option value="complaint">Complaint</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="submit-btn" name = "contact">Send Message</button>
                </form>
            </div>

            
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Royal Hotel. All rights reserved.</p>
    </footer>

    <script>
        function validateContactForm() {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();

            if (name === '') {
                alert('Please enter your name.');
                return false;
            }

            if (email === '') {
                alert('Please enter your email address.');
                return false;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }

            if (message === '') {
                alert('Please enter your message.');
                return false;
            }

        

        }
    </script>
</body>
</html></content>
<parameter name="filePath">c:\xampp\htdocs\individual\contactus.php