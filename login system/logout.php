<?php
session_start();
session_destroy();
echo "<script>alert('You have logged out!'); window.location.href='login.html';</script>";
?>
