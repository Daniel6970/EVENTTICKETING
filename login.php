<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Database configuration
$host = 'localhost';
$dbname = 'event_ticketing';
$username = 'root'; // Default XAMPP/WAMP username
$password = '';     // Default XAMPP/WAMP password (empty)

$conn = new mysqli($host, $username, $password, $dbname);

// Test database connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Initialize error message
$error_message = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password']; // Don’t escape password; we’ll verify it hashed

    // Query to find the user by username and fetch firstName
    $stmt = $conn->prepare("SELECT firstName, password FROM users WHERE username = ?");
    if ($stmt === false) {
        $error_message = "Prepare failed: " . $conn->error;
    } else {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, verify password
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            $firstName = $row['firstName'];

            if (password_verify($password, $hashed_password)) {
                // Login successful
                $_SESSION['username'] = $username; // Store username in session
                $_SESSION['firstName'] = $firstName; // Store first name in session
                $stmt->close();
                $conn->close();
                header('Location: ./login/indexl.php'); // Redirect to index.php in same directory
                exit();
            } else {
                $error_message = "Incorrect password.";
            }
        } else {
            $error_message = "Username not found.";
        }
        $stmt->close();
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Ticketing System</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Manrope:wght@200..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo"><h2>ETS</h2></div>
        <div class="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="user">
            <button class="user-btn"><a href="signup.php">Sign Up</a></button>
            <button class="user-btn" id="login-btn"><a href="login.php">Login</a></button>
        </div>
    </header>
    <div class="parnt">
        
        <div class="signup" id="signup">
            <h2>Login to your Account Below!</h2>
           <div class="signup-container">
           <form action="login.php" method="POST" class="form-grid" autocomplete="off">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="btn-container">
                        <button type="submit" class="submit-btn" name="login">Login</button>
                    </div>
                </form>
                <p>Don’t have an account? <span><a href="signup.php">Sign up</a></span></p>
            </div>
            
        </div>
    
    </div>
    <footer>
        <p>&copy; Richyy @ 2025</p>
    </footer>
</body>
</html>