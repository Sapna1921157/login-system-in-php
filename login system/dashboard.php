<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>alert('Please login first!'); window.location.href='login.html';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
