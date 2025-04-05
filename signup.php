<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Database configuration (moved from config.php)
$host = 'localhost';
$dbname = 'event_ticketing';
$username = 'root'; // Default XAMPP/WAMP username
$password = '';     // Default XAMPP/WAMP password (empty)

$conn = new mysqli($host, $username, $password, $dbname);

// Test database connection
//if ($conn->connect_error) {
//    die("Database connection failed: " . $conn->connect_error);
//} else {
//    echo "Database connected successfully.<br>";
//}

// Initialize variables
$success_message = '';
$submitted_data = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
   //echo "Form submitted!<br>"; // Debug: Confirm form submission

    // Sanitize and retrieve form data
    $email = $conn->real_escape_string($_POST['email']);
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Debug: Show received data
    //echo "Received data: Email: $email, First Name: $firstName, Last Name: $lastName, Username: $username<br>";

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO users (email, firstName, lastName, username, password) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        echo "Prepare failed: " . $conn->error . "<br>";
    } else {
        $stmt->bind_param('sssss', $email, $firstName, $lastName, $username, $password);
        if ($stmt->execute()) {
            $success_message = "Your account has been created successfully!";
            $submitted_data = "Email: $email<br>First Name: $firstName<br>Last Name: $lastName<br>Username: $username";
        } else {
            $success_message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close();
} else {
   // echo "No form submission detected.<br>"; // Debug: Check if POST condition fails
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
        <!-- Display success or error message -->
        <!-- Display success message and submitted data at the top -->
        <?php if (!empty($success_message)): ?>
            <div style="text-align: center; padding: 20px; background-color: <?php echo strpos($success_message, 'Error') === false ? '#e6ffe6' : '#ffe6e6'; ?>;">
                <p style="color: <?php echo strpos($success_message, 'Error') === false ? 'green' : 'red'; ?>;">
                    <?php echo $success_message; ?>
                </p>
               <!-- <?php if (!empty($submitted_data)): ?>
                    <p style="color: black;">
                        <?php echo $submitted_data; ?>
                    </p>
                <?php endif; ?> -->
            </div>
        <?php endif; ?>
        <div class="signup" id="signup">
            <h2>Create an Account Below!</h2>
            <div class="signup-container">
                <form action="signup.php" method="POST" class="form-grid" autocomplete="off">
                    <div class="form-group" id="area1">
                        <label for="email">Email Address</label> 
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group" id="area2">
                        <label for="firstName">First Name</label> 
                        <input type="text" id="firstName" name="firstName" required> 
                    </div>
                    <div class="form-group" id="area3">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>
                    <div class="form-group" id="area4">
                        <label for="username">Username</label> 
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group" id="area5">
                        <label for="password">Password</label> 
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="btn-container">
                        <button type="submit" class="submit-btn" name="submit">Create Account</button>
                    </div>
                </form>
                <p>Already have an account? <span><a href="login.php">Sign in</a></span></p>
            </div> 
        </div>
    </div>
    <footer>
        <p>&copy; Richyy @ 2025</p>
    </footer>
</body>
</html>