<?php
session_start();

// Replace these with your actual database credentials
$host = 'localhost';
$dbname = 'ticketingsystem';
$username = 'root'; // or your DB username
$password = ''; // or your DB password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['name'];
        $pass = $_POST['password'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE name = :name AND password = :password");
        $stmt->bindParam(':name', $user);
        $stmt->bindParam(':password', $pass); // For demonstration. Use hashed passwords for security.
        $stmt->execute();

        // Check if user exists
        if ($stmt->rowCount() > 0) {
            $_SESSION['user'] = $user;
            echo "<script>alert('Login successful!'); window.location.href='dashboard.php';</script>";
        } else {
            echo "<div class='error'>Invalid username or password.</div>";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
